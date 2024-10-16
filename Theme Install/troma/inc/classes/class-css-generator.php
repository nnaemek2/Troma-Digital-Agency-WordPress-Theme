<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) )
{
    return;
}

/*
 * Convert HEX to GRBA
 */
if(!function_exists('troma_rgba')){
    function troma_rgba($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}

/*
 * Convert HEX to Dark & Lighten
 */
function troma_lighten( $hex, $percent ) {
    
    // validate hex string
    
    $hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
    $new_hex = '#';
    
    if ( strlen( $hex ) < 6 ) {
        $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
    }
    
    // convert to decimal and change luminosity
    for ($i = 0; $i < 3; $i++) {
        $dec = hexdec( substr( $hex, $i*2, 2 ) );
        $dec = min( max( 0, $dec + $dec * $percent ), 255 ); 
        $new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
    }       
    
    return $new_hex;
}

class CSS_Generator
{
    /**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';


    /**
     * Constructor
     */
    function __construct() {
        $this->opt_name = troma_get_opt_name();

        if ( empty( $this->opt_name ) ) {
            return;
        }
        $this->dev_mode = troma_get_opt( 'dev_mode', '0' ) === '1' ? true : false;
        add_filter( 'cms_scssc_on', '__return_true' );
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
    }

    /**
     * init hook - 10
     */
    function init() {
        if ( ! class_exists( 'scssc' ) ) {
            return;
        }

        $this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

        if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
            return;
        }
        add_action( 'wp', array( $this, 'generate_with_dev_mode' ) );
        add_action( "redux/options/{$this->opt_name}/saved", function () {
            $this->generate_file();
        } );
    }

    function generate_with_dev_mode() {
        if ( $this->dev_mode === true ) {
            $this->generate_file();
        }
    }

    /**
     * Generate options and css files
     */
    function generate_file() {
        $scss_dir = get_template_directory() . '/assets/scss/';
        $css_dir  = get_template_directory() . '/assets/css/';

        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );

        $_options = $scss_dir . 'variables.scss';

        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->options_output() )
        ) );
        $css_file = $css_dir . 'theme.css';

        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $css_file, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "theme.scss"' ) )
        ) );
    }

    /**
     * Output options to _variables.scss
     *
     * @access protected
     * @return string
     */
    protected function options_output()
    {
        ob_start();

        $primary_color = troma_get_opt( 'primary_color', '#005ec7' );
        if ( ! troma_is_valid_color( $primary_color ) )
        {
            $primary_color = '#005ec7';
        }
        printf( '$primary_color: %s;', esc_attr( $primary_color ) );

        $secondary_color = troma_get_opt( 'secondary_color', '#a100ff' );
        if ( ! troma_is_valid_color( $secondary_color ) )
        {
            $secondary_color = '#a100ff';
        }
        printf( '$secondary_color: %s;', esc_attr( $secondary_color ) );

        $third_color = troma_get_opt( 'third_color', '#12a9ff' );
        if ( ! troma_is_valid_color( $third_color ) )
        {
            $third_color = '#12a9ff';
        }
        printf( '$third_color: %s;', esc_attr( $third_color ) );
        
        $link_color = troma_get_opt( 'link_color', '#005ec7' );
        if ( !empty($link_color['regular']) && isset($link_color['regular']) )
        {
            printf( '$link_color: %s;', esc_attr( $link_color['regular'] ) );
        } else {
            echo '$link_color: #005ec7;';
        }

        $link_color_hover = troma_get_opt( 'link_color', '#6747ee' );
        if ( !empty($link_color['hover']) && isset($link_color['hover']) )
        {
            printf( '$link_color_hover: %s;', esc_attr( $link_color['hover'] ) );
        } else {
            echo '$link_color_hover: #6747ee;';
        }

        $link_color_active = troma_get_opt( 'link_color', '#6747ee' );
        if ( !empty($link_color['active']) && isset($link_color['active']) )
        {
            printf( '$link_color_active: %s;', esc_attr( $link_color['active'] ) );
        } else {
            echo '$link_color_active: #6747ee;';
        }

        /* Gradient Color */
        $primary_color_gradient = troma_get_opt( 'primary_color_gradient' );
        if ( !empty($primary_color_gradient['from']) && isset($primary_color_gradient['from']) )
        {
            printf( '$primary_color_from: %s;', esc_attr( $primary_color_gradient['from'] ) );
        } else {
            echo '$primary_color_from: '.$primary_color.';';
        }
        if ( !empty($primary_color_gradient['to']) && isset($primary_color_gradient['to']) )
        {
            printf( '$primary_color_to: %s;', esc_attr( $primary_color_gradient['to'] ) );
        } else {
            echo '$primary_color_to: '.$secondary_color.';';
        }

        /* Preset */
        $primary_color_two = troma_get_opt( 'primary_color_two', '#005ec7' );
        if ( ! troma_is_valid_color( $primary_color_two ) )
        {
            $primary_color_two = '#005ec7';
        }
        printf( '$primary_color_two: %s;', esc_attr( $primary_color_two ) );

        /* Font */
        $body_default_font = troma_get_opt( 'body_default_font', 'Rubik' );
        if (isset($body_default_font)) {
            echo '
                $body_default_font: '.esc_attr( $body_default_font ).';
            ';
        }

        $heading_default_font = troma_get_opt( 'heading_default_font', 'Poppins' );
        if (isset($heading_default_font)) {
            echo '
                $heading_default_font: '.esc_attr( $heading_default_font ).';
            ';
        }

        return ob_get_clean();
    }

    /**
     * Hooked wp_enqueue_scripts - 20
     * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
     */
    function enqueue()
    {
        $css = $this->inline_css();
        $this->dev_mode = true;
        if ( !empty($css) )
        {
            wp_add_inline_style( 'troma-theme', $this->dev_mode ? $css : troma_css_minifier( $css ) );
        }
    }

    /**
     * Generate inline css based on theme options
     */
    protected function inline_css()
    {
        ob_start();
        /* BG Body */
        $body_background = troma_get_opt( 'body_background' );
        $layout_boxed = troma_get_opt( 'layout_boxed', false );
        $layout_boxed_page = troma_get_page_opt( 'layout_boxed', false );
        if($layout_boxed_page) {
            $layout_boxed = $layout_boxed_page;
        }
        if($layout_boxed && isset($body_background)) {
            echo 'body {
                background-color: '.esc_attr( $body_background['background-color'] ).';
                background-size: '.esc_attr( $body_background['background-size'] ).';
                background-attachment: '.esc_attr( $body_background['background-attachment'] ).';
                background-repeat: '.esc_attr( $body_background['background-repeat'] ).';
                background-position: '.esc_attr( $body_background['background-position'] ).';
                background-image: url('.esc_attr( $body_background['background-image'] ).');
            }';
        }

        /* Header */
        $h_bg_color = troma_get_opt( 'h_bg_color' );
        $h_bg_top_color = troma_get_opt( 'h_bg_top_color' );
        $h_text_top_color = troma_get_opt( 'h_text_top_color' );
        $h_link_top_color = troma_get_opt( 'h_link_top_color' );
        if(!empty($h_bg_top_color)) {
            echo '#header-wrap #header-topbar {
                background-color: '.esc_attr( $h_bg_top_color ).' !important;
            }';
        }
        if(!empty($h_text_top_color)) {
            echo '#header-wrap #header-topbar, #header-wrap #header-topbar .header-contact i, #header-wrap #header-topbar .header-contact label {
                color: '.esc_attr( $h_text_top_color ).' !important;
            }';
        }
        if(!empty($h_link_top_color)) {
            echo '#header-wrap #header-topbar a {
                color: '.esc_attr( $h_link_top_color ).' !important;
            }';
        }
        if(!empty($h_bg_color)) {
            echo '#header-wrap #header-main.header-main {
                background-color: '.esc_attr( $h_bg_color ).';
            }';
        }

        /* Logo */
        $logo_maxh = troma_get_opt( 'logo_maxh' );

        if (!empty($logo_maxh['height']) && $logo_maxh['height'] != 'px')
        {
            printf( '#header-wrap .header-branding a img { max-height: %s; }', esc_attr($logo_maxh['height']) );
        } ?>

        @media screen and (max-width: 991px) {
            <?php
                $logo_maxh_sm = troma_get_opt( 'logo_maxh_sm' );
                if ( ! empty( $logo_maxh_sm['height'] ) && $logo_maxh_sm['height'] != 'px' ) {
                    printf( '#header-wrap .header-branding a img { max-height: %s !important; }', esc_attr( $logo_maxh_sm['height'] ) );
                }
                ?>
            }
        <?php /* End Logo */

        /* Menu */
        $menu_text_transform = troma_get_opt( 'menu_text_transform' );
        if ( !empty( $menu_text_transform ) ) {
            printf( '.primary-menu > li > a { text-transform: %s !important; }', esc_attr($menu_text_transform) );
        }
        $menu_font_size = troma_get_opt( 'menu_font_size' );
        if ( !empty( $menu_font_size ) ) {
            printf( '.primary-menu > li > a { font-size: %s'.'px !important; }', esc_attr($menu_font_size) );
        }
        $menu_letter_spacing = troma_get_opt( 'menu_letter_spacing' );
        if ( !empty( $menu_letter_spacing ) || $menu_letter_spacing == '0' ) {
            printf( '.primary-menu > li > a { letter-spacing: %s'.'px !important; }', esc_attr($menu_letter_spacing) );
        }
        $main_menu_color = troma_get_opt( 'main_menu_color' );
        if ( !empty( $main_menu_color['regular'] ) ) {
            printf( '.primary-menu > li > a, #header-wrap .site-menu-right .menu-right-item, #header-wrap .site-menu-right .header-social a { color: %s !important; }', esc_attr($main_menu_color['regular']) );
        }
        if ( !empty( $main_menu_color['hover'] ) ) {
            printf( '.primary-menu > li > a:hover, #header-wrap .site-menu-right .menu-right-item:hover, #header-wrap .site-menu-right .header-social a:hover { color: %s !important; }', esc_attr($main_menu_color['hover']) );
        }
        if ( !empty( $main_menu_color['active'] ) ) {
            printf( '.primary-menu > li > a.current, .primary-menu > li.current_page_item > a, .primary-menu > li.current-menu-item > a, .primary-menu > li.current_page_ancestor > a, .primary-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr($main_menu_color['active']) );
        }
        $main_menu_color_sub = troma_get_opt( 'main_menu_color_sub' );
        if ( !empty( $main_menu_color_sub['regular'] ) ) {
            printf( '.primary-menu .sub-menu li a { color: %s !important; }', esc_attr($main_menu_color_sub['regular']) );
        }
        if ( !empty( $main_menu_color_sub['hover'] ) ) {
            printf( '.primary-menu .sub-menu li > a:hover { color: %s !important; }', esc_attr($main_menu_color_sub['hover']) );
        }
        if ( !empty( $main_menu_color_sub['active'] ) ) {
            printf( '.primary-menu .sub-menu li.current_page_item > a, .primary-menu .sub-menu li.current-menu-item > a, .primary-menu .sub-menu li.current_page_ancestor > a, .primary-menu .sub-menu li.current-menu-ancestor > a, .primary-menu .sub-menu li.current-menu-parent > a { color: %s !important; }', esc_attr($main_menu_color_sub['active']) );
        }

        /* Header Sticky */
        $header_bgcolor_sticky = troma_get_opt( 'header_bgcolor_sticky' );
        $main_menu_color_sticky = troma_get_opt( 'main_menu_color_sticky' );
        if ( !empty( $header_bgcolor_sticky ) ) {
            printf( '#header-wrap.is-sticky #header-main.h-fixed, #header-wrap.is-sticky-offset #header-main.h-fixed { background-color: %s !important; background-image: none !important; }', esc_attr($header_bgcolor_sticky) );
        }
        if ( !empty( $main_menu_color_sticky['regular'] ) ) {
            printf( '#header-main.h-fixed .primary-menu > li > a, #header-main.h-fixed .site-menu-right .menu-right-item, #header-main.h-fixed .site-menu-right .header-social a { color: %s !important; }', esc_attr($main_menu_color_sticky['regular']) );
        }
        if ( !empty( $main_menu_color_sticky['hover'] ) ) {
            printf( '#header-main.h-fixed .primary-menu > li > a:hover, #header-main.h-fixed .hidden-sidebar-icon:hover, #header-main.h-fixed .site-menu-right .menu-right-item:hover, #header-main.h-fixed .site-menu-right .header-social a:hover { color: %s !important; }', esc_attr($main_menu_color_sticky['hover']) );
        }
        if ( !empty( $main_menu_color_sticky['active'] ) ) {
            printf( '#header-main.h-fixed .primary-menu > li > a.current, #header-main.h-fixed .primary-menu > li.current_page_item > a, #header-main.h-fixed .primary-menu > li.current-menu-item > a, #header-main.h-fixed .primary-menu > li.current_page_ancestor > a, #header-main.h-fixed .primary-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr($main_menu_color_sticky['active']) );
        }

        $pagetitle_bg_color = troma_get_opt( 'pagetitle_bg_color' );
        if(!empty($pagetitle_bg_color['rgba'])) {
            echo '#pagetitle.bg-overlay::before {
                background-image: none !important;
            }';
        }
        /* Footer */
        $footer_bg = troma_get_opt( 'footer_bg' );
        $footer_bg_color_top = troma_get_opt( 'footer_bg_color_top' );
        $footer_top_heading_color = troma_get_opt( 'footer_top_heading_color' );
        $footer_top_heading_fs = troma_get_opt( 'footer_top_heading_fs' );
        $footer_top_paddings = troma_get_opt( 'footer_top_paddings' );
        if(!empty($footer_bg['background-color'])) {
            echo '.site-layout-default .site-footer {
                margin-top: 0px;
            }';
            echo '.site-layout-default .site-footer:before {
                display: none;
            }';
        }
        if(!empty($footer_bg_color_top)) {
            echo '.site-footer:before {
                background-color: '.esc_attr( $footer_bg_color_top['rgba'] ).' !important;
            }';
        }
        if(!empty($footer_top_heading_color)) {
            echo '.top-footer .footer-widget-title {
                color: '.esc_attr( $footer_top_heading_color ).' !important;
            }';
        }
        if(!empty($footer_top_heading_fs)) {
            echo '.top-footer .footer-widget-title {
                font-size: '.esc_attr( $footer_top_heading_fs ).'px !important;
            }';
        }
        if ( isset($footer_top_paddings) && !empty($footer_top_paddings) ) {
            if(!empty($footer_top_paddings['padding-top'])) {
                echo ".site-footer {
                    padding-top:" .esc_attr($footer_top_paddings['padding-top']). " !important;
                }";
            }
            if(!empty($footer_top_paddings['padding-bottom'])) {
                echo ".site-footer .top-footer {
                    padding-bottom:" .esc_attr($footer_top_paddings['padding-bottom']). " !important;
                }";
            }
        }

        /* Content */
        $post_text_align = troma_get_opt( 'post_text_align', 'inherit' );
        if($post_text_align == 'justify') {
            echo '.single-post .content-area .entry-content p {
                text-align: justify;
            }';
        }
        $single_content_max_width = troma_get_opt( 'single_content_max_width' );
        $single_content_max_width_page = troma_get_page_opt( 'single_content_max_width' );
        if(!empty($single_content_max_width_page)) {
            $single_content_max_width = $single_content_max_width_page;
        }
        if(!empty($single_content_max_width)) {
            echo '.single-post #primary.content-full-width {
                max-width: '.esc_attr( $single_content_max_width ).'px;
                margin: auto;
            }';
            echo '.single-post #primary.content-has-sidebar {
                max-width: '.esc_attr( $single_content_max_width ).'px;
            }';
            echo '.single-post .row.content-row {
                justify-content: center;
                -webkit-justify-content: center;
                -ms-justify-content: center;
                -o-justify-content: center;
            }';
        }

        /* Footer */
        $footer_top_link_color = troma_get_page_opt( 'footer_top_link_color' );
        if(!empty($footer_top_link_color['hover'])) {

            echo '.contact-info ul li i, .site-footer .top-footer ul.menu li a::before,
            .site-footer .bottom-footer .footer-social a:hover,
            .site-footer .top-footer #ctf.ctf .ctf-author-name::before,
            .site-footer .top-footer #ctf.ctf .ctf-author-name:hover {
                color: '.esc_attr( $footer_top_link_color['hover'] ).';
            }';
        }

        /* Custom Css */
        $custom_css = troma_get_opt( 'site_css' );
        if(!empty($custom_css)) { echo esc_attr($custom_css); }

        return ob_get_clean();
    }
}

new CSS_Generator();