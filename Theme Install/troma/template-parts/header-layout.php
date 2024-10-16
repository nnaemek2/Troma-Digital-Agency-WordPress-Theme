<?php
/**
 * Template part for displaying default header layout
 */
$custom_header = troma_get_page_opt( 'custom_header', false );
$header_transparent = troma_get_page_opt( 'header_transparent', false );
$sticky_on = troma_get_opt( 'sticky_on', false );
$search_on = troma_get_opt( 'search_on', false );
$cart_on = troma_get_opt( 'cart_on', false );
$hidden_sidebar_on = troma_get_opt( 'hidden_sidebar_on', false );
$header_color_preset = troma_get_page_opt( 'header_color_preset', 'preset1' );

$h_btn_text = troma_get_opt( 'h_btn_text' );
$h_btn_link_type = troma_get_opt( 'h_btn_link_type', 'page' );
$h_btn_link = troma_get_opt( 'h_btn_link' );
$h_btn_link_custom = troma_get_opt( 'h_btn_link_custom' );
$h_btn_target = troma_get_opt( 'h_btn_target', '_self' );
if($h_btn_link_type == 'page') {
    $h_btn_url = get_permalink($h_btn_link);
} else {
    $h_btn_url = $h_btn_link_custom;
}
?>
<header id="masthead" class="header-main">
    <div id="header-wrap" class="header-layout1 fixed-height <?php echo esc_attr($header_color_preset); ?> <?php if($custom_header && $header_transparent) { echo 'header-transparent'; } ?> <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>" site-data-offset="80">
        <div id="header-main" class="header-main">
            <div class="container">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <nav class="main-navigation">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php troma_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                                <?php if(!empty($h_btn_text)) : ?>
                                    <a class="btn btn-mobile" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr( $h_btn_text ); ?><i></i></a>
                                <?php endif; ?>
                            </div>
                        </nav>
                        <div class="site-menu-right">
                            <div class="menu-right-item header-social">
                                <?php troma_topbar_social_icon(); ?>
                            </div>
                            <?php if($search_on) : ?>
                                <span class="menu-right-item h-btn-search"><i class="fa fa-search"></i></span>
                            <?php endif; ?>
                            <?php if(class_exists('Woocommerce') && $cart_on) : ?>
                                <div class="menu-right-item menu-cart">
                                    <span class="h-btn-cart"><i class="fa fa-shopping-cart"></i></span>
                                    <div class="widget_shopping_cart">
                                        <div class="widget_shopping_title">
                                            <?php echo esc_html__( 'Shopping Cart', 'troma' ); ?> <span class="cart-couter-items">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'troma' ), WC()->cart->cart_contents_count ); ?>)</span>
                                        </div>
                                        <div class="widget_shopping_cart_content">
                                            <?php woocommerce_mini_cart(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($hidden_sidebar_on) : ?>
                                <span class="menu-right-item h-btn-sidebar"><i class="fa fa-bars"></i></span>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($h_btn_text)) : ?>
                            <div class="site-header-button">
                                <a class="btn" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr( $h_btn_text ); ?><i></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="menu-mobile-overlay"></div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <?php if (class_exists('Woocommerce') && $cart_on) : ?>
                    <div class="mobile-menu-cart">
                        <span class="h-btn-cart"><i class="fa fa-shopping-cart"></i></span>
                        <div class="widget_shopping_cart">
                            <div class="widget_shopping_title">
                                <?php echo esc_html__( 'Shopping Cart', 'troma' ); ?> <span class="cart-couter-items">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'troma' ), WC()->cart->cart_contents_count ); ?>)</span>
                            </div>
                            <div class="widget_shopping_cart_content">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>