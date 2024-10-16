<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'troma' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[ $key ] = sprintf( esc_html__( 'Form %s', 'troma' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = troma_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('CaseThemeCore') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'troma'),
    'page_title'           => esc_html__('Theme Options', 'troma'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('CaseThemeCore') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => class_exists('CaseThemeCore') ? casethemescore()->path('APP_DIR') . '/templates/redux/' : '',
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'troma'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'troma'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'troma'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'troma'),
            'options'  => array(
                'style1'  => esc_html__('Style 1', 'troma'),
                'style2'  => esc_html__('Style 2', 'troma'),
                'style3'  => esc_html__('Style 3', 'troma'),
                'style4'  => esc_html__('Style 4', 'troma'),
                'style5'  => esc_html__('Style 5', 'troma'),
                'style6'  => esc_html__('Style 6', 'troma'),
                'style7'  => esc_html__('Style 7', 'troma'),
                'style8'  => esc_html__('Style 8', 'troma'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'troma'),
            'default'  => false
        ),
        array(
            'id'       => 'layout_boxed',
            'type'     => 'switch',
            'title'    => esc_html__('Layout Boxed', 'troma'),
            'default'  => false
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__('Body Boxed Background', 'troma'),
            'required' => array( 0 => 'layout_boxed', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'troma'),
            'description' => 'no minimize , generate css over time...',
            'default'  => false
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'troma'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/favicon.png'
            )
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'troma'),
    'icon'   => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'troma'),
            'subtitle' => esc_html__('Select a layout for header.', 'troma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'           => 'h_bg_color',
            'type'         => 'color',
            'title'        => esc_html__( 'Main Background Color', 'troma' ),
        ),
        array(
            'id'       => 'search_on',
            'type'     => 'switch',
            'title'    => esc_html__('Search Icon', 'troma'),
            'default'  => false
        ),
        array(
            'id'       => 'cart_on',
            'type'     => 'switch',
            'title'    => esc_html__('Cart Icon', 'troma'),
            'default'  => false
        ),
        array(
            'id'       => 'hidden_sidebar_on',
            'type'     => 'switch',
            'title'    => esc_html__('Hidden Sidebar Icon', 'troma'),
            'default'  => false
        ),
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'troma'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'troma'),
            'default'  => false
        ),
        array(
            'title' => esc_html__('Social Link', 'troma'),
            'type'  => 'section',
            'id' => 'social_link',
            'indent' => true
        ),
        array(
            'id'      => 'social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_inkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_google_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'troma'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'troma'),
            'default' => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'troma'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'troma'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'troma'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height', 'troma'),
            'subtitle' => esc_html__('Enter number.', 'troma'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height for Tablet & Mobile', 'troma'),
            'subtitle' => esc_html__('Enter number.', 'troma'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'troma'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('.primary-menu li a'),
            'units'       => 'px',
        ),
        array(
            'id'       => 'menu_font_size',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'troma'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_letter_spacing',
            'type'     => 'text',
            'title'    => esc_html__('Letter Spacing', 'troma'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_text_transform',
            'type'     => 'select',
            'title'    => esc_html__('Text Transform', 'troma'),
            'options'  => array(
                ''  => esc_html__('Capitalize', 'troma'),
                'uppercase' => esc_html__('Uppercase', 'troma'),
                'lowercase'  => esc_html__('Lowercase', 'troma'),
                'initial'  => esc_html__('Initial', 'troma'),
                'inherit'  => esc_html__('Inherit', 'troma'),
                'none'  => esc_html__('None', 'troma'),
            ),
            'default'  => ''
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color - First Level', 'troma'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'id'      => 'main_menu_color_sub',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color - Sub Level', 'troma'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Button Navigation', 'troma'),
            'type'  => 'section',
            'id' => 'button_navigation',
            'indent' => true,
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'troma'),
            'default' => '',
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'troma'),
            'options'  => array(
                'page'  => esc_html__('Page', 'troma'),
                'custom'  => esc_html__('Custom', 'troma')
            ),
            'default'  => 'page',
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'troma' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'troma'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'troma'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'troma'),
                '_blank'  => esc_html__('Blank', 'troma')
            ),
            'default'  => '_self',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Sticky', 'troma'),
    'icon'       => 'el el-circle-arrow-down',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'header_bgcolor_sticky',
            'type'        => 'color',
            'title'       => esc_html__('Background Color', 'troma'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'main_menu_color_sticky',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color', 'troma'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Search', 'troma'),
    'icon'       => 'el el-search',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'search_background_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'troma'),
            'output' => array('background-color' => '.ct-modal.ct-search-popup'),
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'button_set',
            'title'    => esc_html__('Search Mobile', 'troma'),
            'options'  => array(
                'show'  => esc_html__('Show', 'troma'),
                'hide' => esc_html__('Hide', 'troma'),
            ),
            'default'  => 'show'
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'troma'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'       => 'ptitle_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Displayed', 'troma'),
            'options'  => array(
                'show'  => esc_html__('Show', 'troma'),
                'hidden'  => esc_html__('Hidden', 'troma'),
            ),
            'default'  => 'show'
        ),
        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'troma'),
            'subtitle' => esc_html__('Page title background.', 'troma'),
            'output'   => array('#pagetitle'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'pagetitle_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'troma'),
            'output' => array('background-color' => '#pagetitle.bg-overlay:before'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'troma'),
            'subtitle' => esc_html__('Page title color.', 'troma'),
            'output'   => array('#pagetitle h1.page-title, #pagetitle h6.page-subtitle'),
            'default'  => '',
            'transparent' => false,
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'             => 'ptitle_padding',
            'type'           => 'spacing',
            'output'         => array('#pagetitle'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'troma'),
            'desc'           => esc_html__('Default: Top-190px, Bottom-182px', 'troma'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'troma'),
            'options'  => array(
                'show'  => esc_html__('Show', 'troma'),
                'hidden'  => esc_html__('Hidden', 'troma'),
            ),
            'default'  => 'show',
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'troma'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'troma'),
            'subtitle' => esc_html__('Content background color.', 'troma'),
            'output' => array('background-color' => '#content, .site-layout-default .site-footer:before')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'troma'),
            'desc'           => esc_html__('Default: Top-120px, Bottom-150px', 'troma'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'troma'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'troma'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Archive', 'troma'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'troma'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'troma'),
            'options'  => array(
                'left'  => esc_html__('Left', 'troma'),
                'right' => esc_html__('Right', 'troma'),
                'none'  => esc_html__('Disabled', 'troma')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'troma'),
            'subtitle' => esc_html__('Show author name on each post.', 'troma'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'troma'),
            'subtitle' => esc_html__('Show date posted on each post.', 'troma'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'troma'),
            'subtitle' => esc_html__('Show category names on each post.', 'troma'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'troma'),
            'subtitle' => esc_html__('Show comments count on each post.', 'troma'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_tags_on',
            'title'    => esc_html__('Tags', 'troma'),
            'subtitle' => esc_html__('Show tags count on each post.', 'troma'),
            'type'     => 'switch',
            'default'  => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'troma'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Layout', 'troma'),
            'subtitle' => esc_html__('Select a sidebar position', 'troma'),
            'options'  => array(
                'layout1'  => esc_html__('Layout 1', 'troma'),
                'layout2'  => esc_html__('Layout 2', 'troma'),
            ),
            'default'  => 'layout1'
        ),
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'troma'),
            'subtitle' => esc_html__('Select a sidebar position', 'troma'),
            'options'  => array(
                'left'  => esc_html__('Left', 'troma'),
                'right' => esc_html__('Right', 'troma'),
                'none'  => esc_html__('Disabled', 'troma')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_text_align',
            'type'     => 'button_set',
            'title'    => esc_html__('Text Align', 'troma'),
            'options'  => array(
                'inherit'  => esc_html__('Inherit', 'troma'),
                'justify'  => esc_html__('Justify', 'troma'),
            ),
            'default'  => 'inherit'
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'troma'),
            'subtitle' => esc_html__('Show author name on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'troma'),
            'subtitle' => esc_html__('Show date on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'troma'),
            'subtitle' => esc_html__('Show category names on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'troma'),
            'subtitle' => esc_html__('Show tags count on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'troma'),
            'subtitle' => esc_html__('Show comments count on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'troma'),
            'subtitle' => esc_html__('Show social share on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'troma'),
            'subtitle' => esc_html__('Show comments form on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'troma'),
            'subtitle' => esc_html__('Show feature image on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_related_post',
            'title'    => esc_html__('Related', 'troma'),
            'subtitle' => esc_html__('Show related on single post.', 'troma'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'single_content_max_width',
            'type'     => 'text',
            'title'    => esc_html__('Content Max Width', 'troma'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Portfolio', 'troma'),
    'icon'       => 'el el-briefcase',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'troma'),
            'default' => '',
            'desc'     => 'Default: portfolio',
        ),
        array(
            'id'      => 'tax_portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Categories Slug', 'troma'),
            'default' => '',
            'desc'     => 'Default: portfolio-category',
        ),
        array(
            'id'      => 'tag_portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Tag Slug', 'troma'),
            'default' => '',
            'desc'     => 'Default: portfolio-tag',
        ),
        array(
            'id'       => 'portfolio_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Portfolio Layout', 'troma'),
            'options'  => array(
                'default'  => esc_html__('Default', 'troma'),
                'custom'  => esc_html__('Custom', 'troma'),
            ),
            'default'  => 'default'
        ),
        array(
            'id'       => 'portfolio_date',
            'title'    => esc_html__('Show Date', 'troma'),
            'type'     => 'switch',
            'default'  => true,
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
        array(
            'id'       => 'portfolio_show_social',
            'title'    => esc_html__('Show Social Share', 'troma'),
            'type'     => 'switch',
            'default'  => true,
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
        array(
            'id'       => 'portfolio_show_navigation',
            'title'    => esc_html__('Show Navigation', 'troma'),
            'type'     => 'switch',
            'default'  => true,
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_label_date',
            'type'    => 'text',
            'title'   => esc_html__('Label Date', 'troma'),
            'default' => '',
            'desc'     => 'Enter label date.',
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_label_client',
            'type'    => 'text',
            'title'   => esc_html__('Label Client', 'troma'),
            'default' => '',
            'desc'     => 'Enter label client.',
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_label_scope',
            'type'    => 'text',
            'title'   => esc_html__('Label Scope', 'troma'),
            'default' => '',
            'desc'     => 'Enter label scope.',
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_label_tag',
            'type'    => 'text',
            'title'   => esc_html__('Label Tags', 'troma'),
            'default' => '',
            'desc'     => 'Enter label tags.',
            'required' => array( 0 => 'portfolio_layout', 1 => 'equals', 2 => 'default' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'troma'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Layout', 'troma'),
            'subtitle' => esc_html__('Select a layout for upper footer area.', 'troma'),
            'options'  => array(
                '1'  => esc_html__('Default', 'troma'),
                'custom'  => esc_html__('Custom', 'troma'),
            ),
            'default'  => '1'
        ),
        array(
            'id'          => 'footer_layout_custom',
            'type'        => 'select',
            'title'       => esc_html__('Custom Layout', 'troma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','troma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     => troma_list_post('footer'),
            'default'     => '',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_top_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background Color', 'troma'),
            'subtitle' => esc_html__('Footer top background color.', 'troma'),
            'default'  => '',
            'output'   => array('.site-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'troma'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'troma'),
            'default'  => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Top', 'troma'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_top_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Columns', 'troma'),
            'options'  => array(
                '2'  => esc_html__('2 Column', 'troma'),
                '3'  => esc_html__('3 Column', 'troma'),
                '4'  => esc_html__('4 Column', 'troma'),
            ),
            'default'  => '4',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_custom_width',
            'type'     => 'button_set',
            'title'    => esc_html__('Width Column Custom', 'troma'),
            'options'  => array(
                'yes'  => esc_html__('Yes', 'troma'),
                'no'  => esc_html__('No', 'troma'),
            ),
            'default'  => 'no',
            'required' => array( 0 => 'footer_top_column', 1 => 'equals', 2 => '4' ),
            'force_output' => true,
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_top_paddings',
            'type'     => 'spacing',
            'title'    => esc_html__('Paddings', 'troma'),
            'subtitle' => esc_html__('Footer top paddings.', 'troma'),
            'mode'     => 'padding',
            'units'    => array('px'),
            'right'    => false,
            'left'     => false,
            'default'  => array(
                'padding-top'    => '',
                'padding-bottom' => ''
            ),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'    => 'footer_top_color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'troma'),
            'output'   => array('body .site-footer .top-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'      => 'footer_top_link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Links Color', 'troma'),
            'regular' => true,
            'hover'   => true,
            'active'  => false,
            'visited' => false,
            'output'  => array('body .site-footer .top-footer  a'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Widget Title', 'troma'),
            'type'  => 'section',
            'id' => 'footer_wg_title',
            'indent' => true,
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'    => 'footer_top_heading_color',
            'type'  => 'color',
            'title' => esc_html__('Title Color', 'troma'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_top_heading_fs',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'troma'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => '',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Bottom', 'troma'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'    => 'footer_bottom_color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'troma'),
            'output'   => array('body .site-footer .bottom-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'      => 'footer_bottom_link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Links Color', 'troma'),
            'regular' => true,
            'hover'   => true,
            'active'  => false,
            'visited' => false,
            'output'  => array('body .site-footer .bottom-footer  a'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_copyright_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Copyright Displayed', 'troma'),
            'options'  => array(
                'show'  => esc_html__('Show', 'troma'),
                'hidden' => esc_html__('Hidden', 'troma'),
            ),
            'default'  => 'show',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'=>'footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'troma'),
            'validate' => 'html_custom',
            'default' => '',
            'subtitle' => esc_html__('Custom HTML Allowed: a,br,em,strong,span,p,div,h1->h6', 'troma'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'cite' => array(),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            ),
            'required' => array( 0 => 'footer_copyright_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));


/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'troma'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'title' => esc_html__('Preset Color 1', 'troma'),
            'type'  => 'section',
            'id' => 'preset1',
            'indent' => true
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'troma'),
            'transparent' => false,
            'default'     => '#005ec7'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'troma'),
            'transparent' => false,
            'default'     => '#a100ff'
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'troma'),
            'transparent' => false,
            'default'     => '#12a9ff'
        ),
        array(
            'id'          => 'primary_color_gradient',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Primary Color Gradient', 'troma'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'troma'),
            'default' => array(
                'regular' => '#005ec7',
                'hover'   => '#6747ee',
                'active'  => '#6747ee'
            ),
            'output'  => array('a')
        ),
        array(
            'title' => esc_html__('Preset Color 2', 'troma'),
            'type'  => 'section',
            'id' => 'preset2',
            'indent' => true
        ),
        array(
            'id'          => 'primary_color_two',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'troma'),
            'transparent' => false,
            'default'     => '#005ec7'
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::getOption($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'troma'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'troma'),
            'options'  => array(
                'Rubik'  => esc_html__('Default', 'troma'),
                'Google-Font'  => esc_html__('Google Font', 'troma'),
            ),
            'default'  => 'Rubik',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'troma'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'body_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Color', 'troma'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true,
            'output'      => array('body, .single-hentry.archive .entry-content, .single-post .content-area, .ct-related-post .item-holder .item-content'),
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'troma'),
            'options'  => array(
                'Poppins'  => esc_html__('Default', 'troma'),
                'Google-Font'  => esc_html__('Google Font', 'troma'),
            ),
            'default'  => 'Poppins',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'troma'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'troma'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'troma'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'troma'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'troma'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'troma'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'troma'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'troma'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'troma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'troma'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'troma'),
            'validate' => 'no_html'
        )
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'troma'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'troma'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'troma'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'troma'),
                    'right' => esc_html__('Right', 'troma'),
                    'none'  => esc_html__('Disabled', 'troma')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'troma'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'troma'),
                'default' => 8,
                'min'  => 6,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'shop_content_padding',
                'type'     => 'spacing',
                'title'    => esc_html__('Content Paddings', 'troma'),
                'subtitle' => esc_html__('Content paddings.', 'troma'),
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
                'left'     => false,
                'output'   => array('.woocommerce #content, .woocommerce-page #content'),
                'default'  => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                    'units'  => 'px',
                )
            ),
        )
    ));
}

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'troma'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'troma'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'troma'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'troma'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'troma'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'troma'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'troma')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'troma'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'troma'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));