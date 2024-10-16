<?php
/**
 * Custom template tags for this theme.
 *
 * @package Troma
 */

/**
 * Header layout
 **/
function troma_page_loading()
{
    $page_loading = troma_get_opt( 'show_page_loading', false );
    $loading_type = troma_get_opt( 'loading_type', 'style1');
    if($page_loading) { ?>
        <div id="ct-loadding" class="ct-loader <?php echo esc_attr($loading_type); ?>">
            <?php switch ( $loading_type )
            {
                case 'style2': ?>
                    <div class="ct-spinner2"></div>
                    <?php break;

                case 'style3': ?>
                    <div class="ct-spinner3">
                      <div class="double-bounce1"></div>
                      <div class="double-bounce2"></div>
                    </div>
                    <?php break;

                case 'style4': ?>
                    <div class="ct-spinner4">
                      <div class="rect1"></div>
                      <div class="rect2"></div>
                      <div class="rect3"></div>
                      <div class="rect4"></div>
                      <div class="rect5"></div>
                    </div>
                    <?php break;

                case 'style5': ?>
                    <div class="ct-spinner5">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                    <?php break;

                case 'style6': ?>
                    <div class="ct-cube-grid">
                      <div class="ct-cube ct-cube1"></div>
                      <div class="ct-cube ct-cube2"></div>
                      <div class="ct-cube ct-cube3"></div>
                      <div class="ct-cube ct-cube4"></div>
                      <div class="ct-cube ct-cube5"></div>
                      <div class="ct-cube ct-cube6"></div>
                      <div class="ct-cube ct-cube7"></div>
                      <div class="ct-cube ct-cube8"></div>
                      <div class="ct-cube ct-cube9"></div>
                    </div>
                    <?php break;

                case 'style7': ?>
                    <div class="ct-folding-cube">
                      <div class="ct-cube1 ct-cube"></div>
                      <div class="ct-cube2 ct-cube"></div>
                      <div class="ct-cube4 ct-cube"></div>
                      <div class="ct-cube3 ct-cube"></div>
                    </div>
                    <?php break;

                case 'style8': ?>
                    <div class="ct-loading-stairs">
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-ball"></div>
                    </div>
                    <?php break;

                default: ?>
                    <div class="loading-spin">
                        <div class="spinner">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                        <div class="spinner color-2" style="">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                    </div>
                    <?php break;
            } ?>
        </div>
    <?php }
}

/**
 * Header layout
 **/
function troma_header_layout()
{
    $header_layout = troma_get_opt( 'header_layout', '1' );
    $custom_header = troma_get_page_opt( 'custom_header', '0' );

    if ( is_page() && $custom_header == '1' )
    {
        $page_header_layout = troma_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
        if($header_layout == '0') {
            return;
        }
    }

    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Page title layout
 **/
function troma_footer()
{
    $footer_layout = troma_get_opt( 'footer_layout', '1' );
    $custom_footer = troma_get_page_opt('custom_footer', 'false');
    $footer_layout_page = troma_get_page_opt('footer_layout');
    if($custom_footer) {
        $footer_layout = $footer_layout_page;
    }
    get_template_part( 'template-parts/footer-layout', $footer_layout );
}

/**
 * Set primary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function troma_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-8 col-lg-8 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-8 col-lg-8 col-md-12 col-sm-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}

/**
 * Set secondary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function troma_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12 col-sm-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function troma_breadcrumb()
{
    if ( ! class_exists( 'CMS_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CMS_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="ct-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function troma_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'troma_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function troma_entry_excerpt( $length = 55 )
    {
        $cms_the_excerpt = get_the_excerpt();
        if(!empty($cms_the_excerpt)) {
            echo esc_html($cms_the_excerpt);
        } else {
            echo wp_kses_post(troma_get_the_excerpt( $length ));
        }
    }
endif;

/**
 * Prints post edit link when applicable
 */
function troma_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                esc_attr__( 'Edit', 'troma' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="entry-edit-link"><i class="fa fa-edit"></i>',
        '</div>'
    );
}


/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function troma_posts_pagination( $query = null )
{
    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = get_query_var( 'paged' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = get_query_var( 'page' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<i class="fa fa-angle-double-left"></i>';
    $html_next = '<i class="fa fa-angle-double-right"></i>';
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    ) );

    $template = '
    <nav class="navigation posts-pagination">
        <div class="posts-page-links">%2$s</div>
    </nav>';

    if ( $links )
    {
        printf(
            wp_kses_post($template),
            esc_attr__( 'Navigation', 'troma' ),
            wp_kses_post($links)
        );
    }
}

/**
 * Prints archive meta on blog
 */
if ( ! function_exists( 'troma_archive_meta' ) ) :
    function troma_archive_meta() {
        $archive_author_on = troma_get_opt( 'archive_author_on', false );
        $archive_categories_on = troma_get_opt( 'archive_categories_on', false );
        $archive_comments_on = troma_get_opt( 'archive_comments_on', false );
        $archive_date_on = troma_get_opt( 'archive_date_on', true );
        $archive_tags_on = troma_get_opt( 'archive_tags_on', true );
        if($archive_author_on || $archive_comments_on || $archive_categories_on || $archive_date_on) : ?>
            <ul class="entry-meta">
                <?php if($archive_date_on) : ?>
                    <li><i class="fa fa-calendar"></i><span><?php echo get_the_date(); ?></span></li>
                <?php endif; ?>
                <?php if($archive_author_on) : ?>
                    <li class="item-author">
                        <?php echo esc_html__( 'By', 'troma' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($archive_comments_on) : ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo comments_number(esc_html__('No Comments', 'troma'),esc_html__('1 Comment', 'troma'),esc_html__('% Comments', 'troma')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if($archive_categories_on) : ?>
                    <li class="item-category">
                        <?php
                            $list_category = '';
                            $terms = get_the_terms(get_the_ID(), 'category');
                            if (is_wp_error($terms)) {
                                $list_category = '';
                            } else {
                                $links = array();
                                $t_id = array();
                                foreach ($terms as $term) {
                                    if(!in_array($term->term_id,$t_id)){
                                        $t_id[] = $term->term_id;
                                        $link = get_term_link($term->term_id, 'category');
                                        $links[] = '<a href="' . esc_url($link) . '" rel="tag">' . $term->name . '</a>';
                                    }
                                }
                                $list_category = join(',', $links);
                            }
                        ?>
                        <?php echo wp_kses_post($list_category); ?>
                    </li>
                <?php endif; ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints post meta on blog
 */
if ( ! function_exists( 'troma_post_meta' ) ) :
    function troma_post_meta() {
        $post_author_on = troma_get_opt( 'post_author_on', false );
        $post_categories_on = troma_get_opt( 'post_categories_on', false );
        $post_comments_on = troma_get_opt( 'post_comments_on', false );
        $post_date_on = troma_get_opt( 'post_date_on', true );
        if($post_author_on || $post_categories_on || $post_comments_on || $post_date_on) : ?>
            <ul class="entry-meta">
                <?php if($post_date_on) : ?>
                    <li><i class="fa fa-calendar"></i><span><?php echo get_the_date(); ?></span></li>
                <?php endif; ?>
                <?php if($post_author_on) : ?>
                    <li class="item-author">
                        <?php echo esc_html__( 'by', 'troma' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($post_comments_on) : ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo comments_number(esc_html__('No Comments', 'troma'),esc_html__('1 Comment', 'troma'),esc_html__('% Comments', 'troma')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if($post_categories_on) : ?>
                    <li class="item-category">
                        <?php
                            $list_category = '';
                            $terms = get_the_terms(get_the_ID(), 'category');
                            if (is_wp_error($terms)) {
                                $list_category = '';
                            } else {
                                $links = array();
                                $t_id = array();
                                foreach ($terms as $term) {
                                    if(!in_array($term->term_id,$t_id)){
                                        $t_id[] = $term->term_id;
                                        $link = get_term_link($term->term_id, 'category');
                                        $links[] = '<a href="' . esc_url($link) . '" rel="tag">' . $term->name . '</a>';
                                    }
                                }
                                $list_category = join(',', $links);
                            }
                        ?>
                        <?php echo wp_kses_post($list_category); ?>
                    </li>
                <?php endif; ?>
                <?php if(is_sticky()) { ?>
                    <li><?php echo esc_html__('Sticky', 'troma'); ?></li>
                <?php } ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'troma_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function troma_entry_tagged_in()
    {
        $tags_list = get_the_tag_list();
        if ( $tags_list ) {
            $list_tag = '';
            $terms = get_the_terms(get_the_ID(), 'post_tag');
            if (is_wp_error($terms)) {
                $list_tag = '';
            } else {
                $links = array();
                $t_id = array();
                foreach ($terms as $term) {
                    if(!in_array($term->term_id,$t_id)){
                        $t_id[] = $term->term_id;
                        $link = get_term_link($term->term_id, 'post_tag');
                        $links[] = '<a href="' . esc_url($link) . '" rel="tag">' . $term->name . '</a>';
                    }
                }
                $list_tag = join('', $links);
            }
            if(!empty($list_tag)) {
                echo '<div class="entry-tags">';
                    echo '<label class="label">'.esc_attr__('Releted Tags', 'troma').'</label>';
                    echo wp_kses_post($list_tag);
                echo '</div>';
            }
        }
    }
endif;

/**
 * List socials share for post.
 */
function troma_socials_share_default() { ?>
    <div class="entry-social">
        <label class="label"><?php echo esc_html__('Social Share', 'troma'); ?></label>
        <a class="fb-social" title="<?php echo esc_html__('Facebook', 'troma'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social" title="<?php echo esc_html__('Twitter', 'troma'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social" title="<?php echo esc_html__('Google Plus', 'troma'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social" title="<?php echo esc_html__('Pinterest', 'troma'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
        <a class="email-social" title="<?php echo esc_html__('Email', 'troma'); ?>" href="mailto:contact@example.com?subject=<?php the_title(); ?>&body=Check out this site <?php the_permalink(); ?>"><i class="zmdi zmdi-email"></i></a>
    </div>
    <?php
}

function troma_socials_share_portfolio() { ?>
    <div class="entry-social">
        <a class="fb-social" title="<?php echo esc_html__('Facebook', 'troma'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social" title="<?php echo esc_html__('Twitter', 'troma'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social" title="<?php echo esc_html__('Google Plus', 'troma'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social" title="<?php echo esc_html__('Pinterest', 'troma'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
    </div>
    <?php
}

/**
 * Footer Top
 */
function troma_footer_top() {
    $footer_top_column = troma_get_opt( 'footer_top_column' );
    $_class = "";

    switch ($footer_top_column){
        case '2':
            $_class = 'col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6';
            break;
        case '3':
            $_class = 'col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6';
            break;
        case '4':
            $_class = 'col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6';
            break;
    }

    for($i = 1 ; $i <= $footer_top_column ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-' . $i ) ){
            echo '<div class="ct-footer-item ' . esc_html($_class) . '">'; ?>
                <?php dynamic_sidebar( 'sidebar-footer-' . $i );
            echo "</div>";
        }
    }
}

/**
 * Footer Gallery
 */
function troma_footer_gallery() {
    if (is_rtl()) {
        $carousel_rtl = 'true';
    } else {
        $carousel_rtl = 'false';
    }
    $footer_gallery = troma_get_opt( 'footer_gallery', 'no' );
    $footer_gallery_images = troma_get_opt( 'footer_gallery_images' );
    $footer_gallery_list = explode(',', $footer_gallery_images);
    if(!empty($footer_gallery_images)) {
        wp_enqueue_script( 'owl-carousel' );
        wp_enqueue_script( 'troma-carousel' ); ?>
        <div class="ct-carousel owl-carousel images-light-box-carousel" data-item-xs="4" data-item-sm="6" data-item-md="8" data-item-lg="10" data-margin="0" data-loop="true" data-autoplay="true" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="<?php echo esc_attr( $carousel_rtl ); ?>">
            <?php foreach ($footer_gallery_list as $img_id):
                ?>
                <div class="ct-carousel-item">
                    <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'troma-gallery'));?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?>"></a>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    <?php }
}

/**
* Display navigation to next/previous post when applicable.
*/
function troma_post_nav_default() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="post-previous-next style-default">
            <div class="nav-links row clearfix">
                <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                    <div class="nav-link-prev col-md-6 col-sm-12">
                        <?php $url_prev = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'troma-medium', false); ?>
                        <div class="nav-item-inner">
                            <span><?php echo esc_html_e('Previous Story', 'troma') ?></span>
                            <?php if(!empty($url_prev)) : ?>
                                <div class="nav-item-image bg-image" style="background-image: url(<?php echo esc_url($url_prev[0]); ?>);">
                                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"></a>
                                </div>
                            <?php endif; ?>
                            <h3><a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a></h3>
                            <div class="nav-item-date"><?php echo get_the_date(); ?></div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                    <div class="nav-link-next col-md-6 col-sm-12">
                        <?php $url_next = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'troma-medium', false); ?>
                        <div class="nav-item-inner">
                            <span><?php echo esc_html_e('Next Story', 'troma') ?></span>
                            <?php if(!empty($url_next)) : ?>
                                <div class="nav-item-image bg-image" style="background-image: url(<?php echo esc_url($url_next[0]); ?>);">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"></a>
                                </div>
                            <?php endif; ?>
                            <h3><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a></h3>
                            <div class="nav-item-date"><?php echo get_the_date(); ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div><!-- .nav-links -->
        </div>
    <?php }
}

function troma_post_nav_portfolio() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="nav-links">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="nav-link-prev">
                    <?php $url_prev = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'troma-medium', false); ?>
                    <div class="nav-inner">
                        <div class="nav-icon"><a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="flaticon-next-page text-gradient"></i></a></div>
                        <div class="nav-holder">
                            <span class="subtitle"><?php echo esc_html_e('prev project', 'troma') ?></span>
                            <h3><a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a></h3>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="nav-portfolios"><a href="<?php echo esc_url(home_url('/')); ?>?post_type=portfolio"><i class="flaticon-menu-1 text-gradient"></i></a></div>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="nav-link-next">
                    <?php $url_next = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'troma-medium', false); ?>
                    <div class="nav-inner">
                        <div class="nav-holder">
                            <span class="subtitle"><?php echo esc_html_e('next project', 'troma') ?></span>
                            <h3><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a></h3>
                        </div>
                        <div class="nav-icon"><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><i class="flaticon-next-page text-gradient"></i></a></div>
                    </div>
                </div>
            <?php } ?>
        </div><!-- .nav-links -->
    <?php }
}

/**
 * Related Post
 */
function troma_related_post()
{
    global $post;
    $current_id = $post->ID;
    $posttags = get_the_category($post->ID);
    if (empty($posttags)) return;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }
    $post_number = '4';
    $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
    $post_related_post = troma_get_opt( 'post_related_post', false );
    if ($post_related_post && count($query_similar->posts) > 1) {
        ?>
        <div class="ct-related-post-wrap">
            <div class="container">
                <div class="ct-related-post">
                    <h3 class="section-title"><?php echo esc_html__('Similar Blog Posts', 'troma'); ?></h3>
                    <div class="ct-related-post-inner row">
                        <?php foreach ($query_similar->posts as $post):
                            $thumbnail_url = '';
                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'troma-medium', false);
                            endif;
                            if ($post->ID !== $current_id) : ?>
                                <div class="grid-item col-xl-4 col-lg-4 col-md-4">
                                    <div class="grid-item-inner">
                                        <?php if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                                            <div class="item-featured">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php the_title_attribute(); ?>" /></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="item-holder">
                                            <h3 class="item-title">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                            </h3>
                                            <div class="item-content">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words = 15, $more = null ); ?>
                                            </div>
                                            <div class="item-readmore">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><?php echo esc_html__( 'Read more', 'troma' ) ?><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    wp_reset_postdata();
}

/**
 * Header Search Mobile
 */
function troma_header_mobile_search()
{
    $search_field_placeholder = troma_get_opt( 'search_field_placeholder' );
    $search_mobile = troma_get_opt( 'search_mobile', 'show' );
    if($search_mobile == 'show') : ?>
        <div class="header-mobile-search">
            <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search Keywords...', 'troma'); } ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
<?php endif; }

/**
 * Header Search Popup
 */
function troma_popup_search()
{ 
    $search_on = troma_get_opt( 'search_on', false );
    $search_field_placeholder = troma_get_opt( 'search_field_placeholder' );
    if($search_on) : ?>
        <div class="ct-modal ct-search-popup">
            <div class="ct-close"></div>
            <div class="ct-modal-content">
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search Keywords...', 'troma'); } ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                </form>
                <div class="esc-search"><?php echo esc_html__( 'Press ESC key to close search', 'troma' ) ?></div>
            </div>
        </div>
    <?php endif; ?>
<?php }

/**
 * Header Hidden Sidebar
 */
function troma_hidden_sidebar()
{ 
    $hidden_sidebar_on = troma_get_opt( 'hidden_sidebar_on', false );
    if($hidden_sidebar_on && is_active_sidebar( 'sidebar-hidden' )) : ?>
        <div class="ct-hidden-sidebar">
            <div class="ct-close"></div>
            <div class="ct-hidden-sidebar-inner">
                <?php dynamic_sidebar('sidebar-hidden'); ?>
            </div>
        </div>
    <?php endif; ?>
<?php }
/**
 * Page title layout
 **/
function troma_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Social Top Bar
 */
function troma_topbar_social_icon() {
    $social_facebook_url = troma_get_opt( 'social_facebook_url' );
    $social_twitter_url = troma_get_opt( 'social_twitter_url' );
    $social_inkedin_url = troma_get_opt( 'social_inkedin_url' );
    $social_instagram_url = troma_get_opt( 'social_instagram_url' );
    $social_google_url = troma_get_opt( 'social_google_url' );
    $social_skype_url = troma_get_opt( 'social_skype_url' );
    $social_pinterest_url = troma_get_opt( 'social_pinterest_url' );
    $social_vimeo_url = troma_get_opt( 'social_vimeo_url' );
    $social_youtube_url = troma_get_opt( 'social_youtube_url' );
    $social_yelp_url = troma_get_opt( 'social_yelp_url' );
    $social_tumblr_url = troma_get_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = troma_get_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fa fa-facebook"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fa fa-twitter"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fa fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fa fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fa fa-vimeo"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fa fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fa fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fa fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fa fa-tripadvisor"></i></a>';
    endif;
}

/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'troma_user_fields' );
add_action( 'edit_user_profile', 'troma_user_fields' );
function troma_user_fields($user){

    $customer_position = get_user_meta($user->ID, 'customer_position', true);

    ?>
    <h3><?php esc_html_e('Customer Position', 'troma'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="customer_position"><?php esc_html_e('Position', 'troma'); ?></label></th>
            <td>
                <input id="customer_position" name="customer_position" type="text" value="<?php echo esc_attr(isset($customer_position) ? $customer_position : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'troma_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'troma_save_user_custom_fields' );
function troma_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['customer_position']))
        update_user_meta( $user_id, 'customer_position', $_POST['customer_position'] );
}
/* Author Social */
function troma_get_user_position() {

    $customer_position = get_user_meta(get_the_author_meta( 'ID' ), 'customer_position', true);

    if(!empty($customer_position)) { ?>
    <span class="user-position">
        <?php echo esc_attr(', '.$customer_position); ?>
    </span> 
<?php  }
}

/**
 * Demo Bar
 */
function troma_demo_bar() { ?>
    <div class="ct-demo-bar">
        <div class="ct-demo-option">
            <a class="choose-demo" href="javascript:;">
                <span>Choose Theme Styling</span>
                <i class="fa fa-cog"></i>
            </a>
            <a href="https://casethemes.ticksy.com/" target="_blank">
                <span>Submit a Ticket</span>
                <i class="fa fa-life-ring"></i>
            </a>
            <a href="https://themeforest.net/item/troma-creative-digital-agency-wordpress-theme/22823313?ref=casethemes" target="_blank">
                <span>Purchase Theme</span>
                <i class="fa fa-shopping-cart"></i>
            </a>
        </div>
        <div class="ct-demo-bar-inner">
            <div class="ct-demo-bar-meta">
                <h4>Pre-Built Demos Collection</h4>
                <p>Troma comes with a beautiful collection of modern, easily importable, and highly customizable demo layouts. Any of which can be installed via one click.</p>
            </div>
            <div class="ct-demo-bar-list">
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo1.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Homepage 1</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/troma/home" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo2.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Homepage 2</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/troma/homepage-2/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo3.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Homepage 3</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/troma/homepage-3/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo4.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Homepage 4</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/troma/homepage-4/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo5.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Homepage 5</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/troma/homepage-5/" target="_blank">View Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }