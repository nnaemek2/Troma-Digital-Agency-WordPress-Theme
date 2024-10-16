<?php
$footer_top_column = troma_get_opt( 'footer_top_column', '4' );
$footer_custom_width = troma_get_opt( 'footer_custom_width', 'no' );
$footer_copyright = troma_get_opt( 'footer_copyright' );
$back_totop_on = troma_get_opt('back_totop_on', true);
$footer_copyright_on = troma_get_opt('footer_copyright_on', true);
?>
<footer id="colophon" class="site-footer footer-layout1 bg-image">
    <?php if (isset($back_totop_on) && $back_totop_on) : ?>
        <a href="#" class="ct-scroll-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </a>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <?php if (class_exists('ReduxFramework')) { ?>
            <div class="top-footer <?php if($footer_top_column == '4' && $footer_custom_width == 'yes' ) { echo 'column-width'; } ?>">
                <div class="container">
                    <div class="row">
                        <?php troma_footer_top(); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
    
    <?php if($footer_copyright_on == 'show') : ?>
        <div class="bottom-footer">
            <div class="container">
                <div class="bf-gap"></div>
                <div class="row">
                    <div class="bottom-col col-12 bottom-copyrigh">
                        <?php
                        if ($footer_copyright) {
                            echo apply_filters('the_content', $footer_copyright);
                        } else {
                            echo wp_kses_post('Copyright &copy; '.esc_attr(date("Y")).'. Made With Love Troma by <a target="_blank" href="https://themeforest.net/user/case-themes/portfolio/portfolio">CaseThemes</a>');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>