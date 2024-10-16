<?php
/**
 * Template part for displaying site branding
 */

$logo = troma_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
$logo_url = $logo['url'];

$logo_light = troma_get_opt( 'logo_light', array( 'url' => '', 'id' => '' ) );
$logo_light_url = $logo_light['url'];

$custom_header = troma_get_page_opt( 'custom_header', false );
$header_layout = troma_get_opt( 'header_layout', '1' );
$logo_dark_page = troma_get_page_opt( 'logo_dark_page' );
if($custom_header && $header_layout == '1' && !empty($logo_dark_page['url']) ) {
    $logo_url = $logo_dark_page['url'];
}

if ($logo_url || $logo_light_url)
{
    printf(
        '<a class="logo-dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo Dark', 'troma').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_url )
    );
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo Light', 'troma').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_light_url )
    );
}
else
{
    printf(
        '<a class="logo" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'troma').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( get_template_directory_uri().'/assets/images/logo.png' )
    );
}