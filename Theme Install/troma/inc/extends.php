<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Troma
 */

/*
 * Get page ID by Slug
*/
function troma_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Get content by slug
**/
function troma_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else 
        return;
}

/**
 * Show content by slug
**/
if(!function_exists('troma_content_by_slug')){
    function troma_content_by_slug($slug, $post_type){
        $content = troma_get_content_by_slug($slug, $post_type);

        $id = troma_get_id_by_slug($slug, $post_type);
        $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
        if ( ! empty( $shortcodes_custom_css ) ) {
            $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
            echo '<style data-type="vc_shortcodes-custom-css">';
            echo esc_html($shortcodes_custom_css);
            echo '</style>';
        }
        
        echo apply_filters('the_content',  $content);
    }
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function troma_body_classes( $classes )
{   

    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (class_exists('ReduxFramework')) {
        $classes[] = ' reduxon';
    }

    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    $layout_boxed = troma_get_opt( 'layout_boxed', false );
    $layout_boxed_page = troma_get_page_opt( 'layout_boxed', false );
    if($layout_boxed_page) {
        $layout_boxed = $layout_boxed_page;
    }
    if ($layout_boxed) {
        $classes[] = ' layout-boxed';
    }

    $body_default_font = troma_get_opt( 'body_default_font', 'Rubik' );
    $heading_default_font = troma_get_opt( 'heading_default_font', 'Poppins' );

    if($body_default_font == 'Rubik') {
        $classes[] = 'body-default-font';
    }

    if($heading_default_font == 'Poppins') {
        $classes[] = 'heading-default-font';
    }

    if ( class_exists('WPBakeryVisualComposerAbstract') ) {
        $classes[] = 'visual-composer';
    }

    $sticky_on = troma_get_opt( 'sticky_on', false );
    if(isset($sticky_on) && $sticky_on == 1) {
        $classes[] = 'header-sticky';
    }

    $body_custom_class = troma_get_page_opt( 'body_custom_class' );
    if(isset($body_custom_class) && !empty($body_custom_class)) {
        $classes[] = $body_custom_class;
    }

    return $classes;
}
add_filter( 'body_class', 'troma_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function troma_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'troma_pingback_header' );
