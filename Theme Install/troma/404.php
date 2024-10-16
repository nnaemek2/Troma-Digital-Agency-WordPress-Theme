<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Troma
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404">
                <div class="container">
                    <div class="row">
                        <div class="error-404-content col-12 text-center">
                            <h2><?php echo esc_html__( '404', 'troma' ); ?></h2>
                            <h3><?php echo esc_html__( 'OOPS!', 'troma' ); ?></h3>
                            <h4><?php echo esc_html__( 'Page Not Found', 'troma' ); ?></h4>
                            <a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Back To Home', 'troma'); ?></a>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
