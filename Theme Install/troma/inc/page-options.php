<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  troma_Post_Metabox $metabox
 */

/**
 * Get list menu.
 * @return array
 */
function troma_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'troma')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

function troma_page_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'troma' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => troma_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'troma' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_audio' ) ) {
		$metabox->set_args( 'cms_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'troma' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_link' ) ) {
		$metabox->set_args( 'cms_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'troma' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_quote' ) ) {
		$metabox->set_args( 'cms_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'troma' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_video' ) ) {
		$metabox->set_args( 'cms_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'troma' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_gallery' ) ) {
		$metabox->set_args( 'cms_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'troma' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post blog meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'General', 'troma' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'ptitle_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Displayed', 'troma'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'troma'),
	                'show'  => esc_html__('Show', 'troma'),
	                'hidden'  => esc_html__('Hidden', 'troma'),
	            ),
	            'default'  => 'themeoption'
	        ),
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'troma' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'troma' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'troma'),
	                'right' => esc_html__('Right', 'troma'),
	                'none'  => esc_html__('Disabled', 'troma')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
			array(
	            'id'=>'custom_sub_title',
	            'type' => 'textarea',
	            'title' => esc_html__('Sub Title', 'troma'),
	            'validate' => 'html_custom',
	            'default' => '',
	            'subtitle' => esc_html__('Custom HTML Allowed: a,br,em,strong,span,p,div,h1->h6', 'troma'),
	            'allowed_html' => array(
	                'a' => array(
	                    'href' => array(),
	                    'title' => array(),
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'br' => array(),
	                'em' => array(),
	                'strong' => array(),
	                'span' => array(),
	                'p' => array(
	                	'style' => array(),
	                ),
	                'div' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h1' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h2' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h3' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h4' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h5' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h6' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'ul' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'li' => array(),
	            ),
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
	) );


    /* Extra Post Type */
	if ( ! $metabox->isset_args( 'portfolio' ) ) {
		$metabox->set_args( 'portfolio', array(
			'opt_name'            => 'portfolio_option',
			'display_name'        => esc_html__( 'Portfolio Settings', 'troma' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config portfolio meta options
	 *
	 */

	$metabox->add_section( 'portfolio', array(
		'title'  => esc_html__( 'General', 'troma' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'    => 'portfolio_date',
				'type'  => 'text',
				'title' => esc_html__( 'Date', 'troma' ),
			),
			array(
				'id'    => 'portfolio_client',
				'type'  => 'text',
				'title' => esc_html__( 'Client', 'troma' ),
			),
			array(
				'id'    => 'portfolio_scope',
				'type'  => 'text',
				'title' => esc_html__( 'Scope:', 'troma' ),
			),
			array(
				'id'    => 'portfolio_btn_text',
				'type'  => 'text',
				'title' => esc_html__( 'Button Text', 'troma' ),
			),
			array(
				'id'    => 'portfolio_btn_link',
				'type'  => 'text',
				'title' => esc_html__( 'Button Link', 'troma' ),
			),
			array(
	            'id'       => 'portfolio_btn_target',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Button Target', 'troma'),
	            'options'  => array(
	                '_self'  => esc_html__('Same Windown', 'troma'),
	                '_blank' => esc_html__('New Windown', 'troma'),
	            ),
	            'default'  => '_self'
	        ),
			array(
				'id'    => 'portfolio_gallery',
				'type'  => 'gallery',
				'title' => esc_html__( 'Add/Edit Gallery', 'troma' ),
			),
			array(
				'id'    => 'portfolio_video_url',
				'type'  => 'text',
				'title' => esc_html__( 'Video Url', 'troma' ),
			),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'troma' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'troma' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'troma' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'troma' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'troma' ),
				'options'      => array(
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
				),
				'default'      => troma_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
			array(
				'id'      => 'header_transparent',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Transparent', 'troma' ),
				'default' => false,
				'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
			array(
				'id'      => 'header_color_preset',
				'type'    => 'button_set',
				'title'   => esc_html__( 'Header Color Preset', 'troma' ),
				'options'  => array(
	                'preset1'  => esc_html__('Color Preset 1', 'troma'),
	                'preset2'  => esc_html__('Color Preset 2', 'troma'),
	            ),
	            'default'  => 'preset1',
				'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
			array(
	            'id'       => 'logo_dark_page',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Dark', 'troma'),
	            'default' => '',
	            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
                'id'       => 'h_custom_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Menu', 'troma' ),
                'subtitle' => esc_html__( 'Custom menu for current page.', 'troma' ),
                'options'  => troma_get_nav_menu(),
                'default' => '',
                'required' => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
                'force_output' => true
            ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'troma' ),
		'icon'   => 'el-icon-map-marker',
		'fields' => array(
			array(
	            'id'       => 'ptitle_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Displayed', 'troma'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'troma'),
	                'show'  => esc_html__('Show', 'troma'),
	                'hidden'  => esc_html__('Hidden', 'troma'),
	            ),
	            'default'  => 'themeoption'
	        ),
			array(
	            'id'=>'custom_sub_title',
	            'type' => 'textarea',
	            'title' => esc_html__('Sub Title', 'troma'),
	            'validate' => 'html_custom',
	            'default' => '',
	            'subtitle' => esc_html__('Custom HTML Allowed: a,br,em,strong,span,p,div,h1->h6', 'troma'),
	            'allowed_html' => array(
	                'a' => array(
	                    'href' => array(),
	                    'title' => array(),
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'br' => array(),
	                'em' => array(),
	                'strong' => array(),
	                'span' => array(),
	                'p' => array(),
	                'div' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h1' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h2' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h3' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h4' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h5' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'h6' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'ul' => array(
	                    'class' => array(),
	                    'style' => array(),
	                ),
	                'li' => array(),
	            ),
	        ),
	        array(
				'id'           => 'custom_title',
				'type'         => 'text',
				'title'        => esc_html__( 'Title', 'troma' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'troma' ),
			),
			array(
            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'title'    => esc_html__('Background', 'troma'),
	            'subtitle' => esc_html__('Page title background.', 'troma'),
	            'output'   => array('body #pagetitle'),
	            'background-color' => false
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'troma' ),
		'desc'   => esc_html__( 'Settings for content area.', 'troma' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'troma' ),
				'subtitle' => esc_html__( 'Content background color.', 'troma' ),
				'output'   => array( 'background-color' => '#content, .site-layout-default .site-footer:before' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'troma' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'troma' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'troma' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'troma' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'troma' ),
					'right' => esc_html__( 'Right', 'troma' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
	        array(
	            'id'       => 'layout_boxed',
	            'type'     => 'switch',
	            'title'    => esc_html__('Layout Boxed', 'troma'),
	            'default'  => false
	        ),
	        array(
				'id'           => 'body_custom_class',
				'type'         => 'text',
				'title'        => esc_html__( 'Body Custom Class', 'troma' ),
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'troma' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'troma' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'      => 'custom_footer',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Footer', 'troma' ),
				'default' => false,
				'indent'  => true
			),
			array(
	            'id'       => 'footer_layout',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Layout', 'troma'),
	            'subtitle' => esc_html__('Select a layout for upper footer area.', 'troma'),
	            'options'  => array(
	                '1'  => esc_html__('Default', 'troma'),
	                'custom'  => esc_html__('Custom', 'troma'),
	            ),
	            'default'  => '1',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
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
	    )
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'cms_pf_video', array(
		'title'  => esc_html__( 'Video', 'troma' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'troma' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'troma' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'troma' ),
				'desc'  => esc_html__( 'Upload video file', 'troma' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'troma' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'troma' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'troma' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'troma' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'troma' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'troma' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'troma' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'troma' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'troma' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'troma' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_link', array(
		'title'  => esc_html__( 'Link', 'troma' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'troma' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'troma' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'troma' )
			)
		)
	) );

}


add_action( 'cms_post_metabox_register', 'troma_page_options_register' );

function troma_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( troma_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}