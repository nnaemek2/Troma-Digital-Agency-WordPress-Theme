<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Troma
 */

if ( class_exists( 'WooCommerce' ) && (is_shop() || is_product()) ) {
    dynamic_sidebar( 'sidebar-shop' );
} else {
    dynamic_sidebar( 'sidebar-blog' );
}