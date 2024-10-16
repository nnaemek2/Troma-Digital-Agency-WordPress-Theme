<?php
if (!function_exists('troma_font_flaticon')) :

    add_filter( 'vc_iconpicker-type-flaticon', 'troma_font_flaticon' );
    /**
    * awesome class.
    * 
    * @return string[]
    * @author CaseThemes
    */
    function troma_font_flaticon( $icons ) {
        $flaticon = array (
            array( 'flaticon-facebook-logo'                   => esc_html( 'flaticon-facebook-logo' ) ),
            array( 'flaticon-whatsapp'                   => esc_html( 'flaticon-whatsapp' ) ),
            array( 'flaticon-twitter-logo-silhouette'                   => esc_html( 'flaticon-twitter-logo-silhouette' ) ),
            array( 'flaticon-google-plus'                   => esc_html( 'flaticon-google-plus' ) ),
            array( 'flaticon-magnifying-glass'                   => esc_html( 'flaticon-magnifying-glass' ) ),
            array( 'flaticon-menu'                   => esc_html( 'flaticon-menu' ) ),
            array( 'flaticon-play-arrow'                   => esc_html( 'flaticon-play-arrow' ) ),
            array( 'flaticon-layers'                   => esc_html( 'flaticon-layers' ) ),
            array( 'flaticon-web-design'                   => esc_html( 'flaticon-web-design' ) ),
            array( 'flaticon-notepad'                   => esc_html( 'flaticon-notepad' ) ),
            array( 'flaticon-tick'                   => esc_html( 'flaticon-tick' ) ),
            array( 'flaticon-graphic-design'                   => esc_html( 'flaticon-graphic-design' ) ),
            array( 'flaticon-vector'                   => esc_html( 'flaticon-vector' ) ),
            array( 'flaticon-pantone'                   => esc_html( 'flaticon-pantone' ) ),
            array( 'flaticon-idea'                   => esc_html( 'flaticon-idea' ) ),
            array( 'flaticon-ideas'                   => esc_html( 'flaticon-ideas' ) ),
            array( 'flaticon-idea-1'                   => esc_html( 'flaticon-idea-1' ) ),
            array( 'flaticon-idea-2'                   => esc_html( 'flaticon-idea-2' ) ),
            array( 'flaticon-branding'                   => esc_html( 'flaticon-branding' ) ),
            array( 'flaticon-light-bulb'                   => esc_html( 'flaticon-light-bulb' ) ),
            array( 'flaticon-link-symbol'                   => esc_html( 'flaticon-link-symbol' ) ),
            array( 'flaticon-users'                   => esc_html( 'flaticon-users' ) ),
            array( 'flaticon-application-form'                   => esc_html( 'flaticon-application-form' ) ),
            array( 'flaticon-form'                   => esc_html( 'flaticon-form' ) ),
            array( 'flaticon-file'                   => esc_html( 'flaticon-file' ) ),
            array( 'flaticon-document'                   => esc_html( 'flaticon-document' ) ),
            array( 'flaticon-medal'                   => esc_html( 'flaticon-medal' ) ),
            array( 'flaticon-coffee-cup'                   => esc_html( 'flaticon-coffee-cup' ) ),
            array( 'flaticon-coffee-cup-1'                   => esc_html( 'flaticon-coffee-cup-1' ) ),
            array( 'flaticon-tea'                   => esc_html( 'flaticon-tea' ) ),
            array( 'flaticon-man-user'                   => esc_html( 'flaticon-man-user' ) ),
            array( 'flaticon-mail-black-envelope-symbol'                   => esc_html( 'flaticon-mail-black-envelope-symbol' ) ),
            array( 'flaticon-next'                   => esc_html( 'flaticon-next' ) ),
            array( 'flaticon-back'                   => esc_html( 'flaticon-back' ) ),
            array( 'flaticon-right-arrow'                   => esc_html( 'flaticon-right-arrow' ) ),
            array( 'flaticon-edit'                   => esc_html( 'flaticon-edit' ) ),
            array( 'flaticon-pencil-edit-button'                   => esc_html( 'flaticon-pencil-edit-button' ) ),
            array( 'flaticon-paper-plane'                   => esc_html( 'flaticon-paper-plane' ) ),
            array( 'flaticon-up-arrow'                   => esc_html( 'flaticon-up-arrow' ) ),
            array( 'flaticon-up-arrow-1'                   => esc_html( 'flaticon-up-arrow-1' ) ),
            array( 'flaticon-long-arrow-pointing-to-the-right'                   => esc_html( 'flaticon-long-arrow-pointing-to-the-right' ) ),
            array( 'flaticon-customer-service'                   => esc_html( 'flaticon-customer-service' ) ),
            array( 'flaticon-best-seller'                   => esc_html( 'flaticon-best-seller' ) ),
            array( 'flaticon-gift'                   => esc_html( 'flaticon-gift' ) ),
            array( 'flaticon-discount'                   => esc_html( 'flaticon-discount' ) ),
            array( 'flaticon-shopping-cart'                   => esc_html( 'flaticon-shopping-cart' ) ),
            array( 'flaticon-premium'                   => esc_html( 'flaticon-premium' ) ),
            array( 'flaticon-checkout'                   => esc_html( 'flaticon-checkout' ) ),
            array( 'flaticon-plant'                   => esc_html( 'flaticon-plant' ) ),
            array( 'flaticon-online-store'                   => esc_html( 'flaticon-online-store' ) ),
            array( 'flaticon-telephone-handle-silhouette'                   => esc_html( 'flaticon-telephone-handle-silhouette' ) ),
            array( 'flaticon-mountains'                   => esc_html( 'flaticon-mountains' ) ),
            array( 'flaticon-edit-1'                   => esc_html( 'flaticon-edit-1' ) ),
            array( 'flaticon-group'                   => esc_html( 'flaticon-group' ) ),
            array( 'flaticon-double-angle-pointing-to-right'                   => esc_html( 'flaticon-double-angle-pointing-to-right' ) ),
            array( 'flaticon-double-left-chevron'                   => esc_html( 'flaticon-double-left-chevron' ) ),
            array( 'flaticon-menu-1'                   => esc_html( 'flaticon-menu-1' ) ),
            array( 'flaticon-next-page'                   => esc_html( 'flaticon-next-page' ) ),
            array( 'flaticon-small-calendar'                   => esc_html( 'flaticon-small-calendar' ) ),
            array( 'flaticon-time'                   => esc_html( 'flaticon-time' ) ),
            array( 'flaticon-internet'                   => esc_html( 'flaticon-internet' ) ),
        );
        return array_merge( $icons, $flaticon );
    }
endif;