<?php
/**
 * The template for displaying all single posts
 *
 * @package Troma
 */
get_header();
$sidebar_pos = troma_get_opt( 'post_sidebar_pos', 'right' );
$show_sidebar_post = troma_get_page_opt( 'show_sidebar_post', false );
if ($show_sidebar_post){
    $sidebar_pos = troma_get_page_opt( 'sidebar_post_pos' );
}
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" <?php troma_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
                <?php

                    while ( have_posts() )
                    {
                        the_post();
                        get_template_part( 'template-parts/content-single/content', get_post_format() );
                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }

                ?>
            </main><!-- #main -->
        </div><!-- #primary -->

        <?php if ( 'left' == $sidebar_pos || 'right' == $sidebar_pos ) : ?>
        <aside id="secondary" <?php troma_secondary_class( $sidebar_pos, 'sidebar-fixed widget-area' ); ?>>
            <div class="sidebar-fixed-inner">
                <?php get_sidebar(); ?>
            </div>
        </aside>
        <?php endif; ?>
    </div>
</div>
<?php
troma_related_post();
troma_set_post_views(get_the_ID());
get_footer();
