<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'el_class'             => '',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('post', $atts));
extract(troma_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'troma-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-blog-carousel default owl-carousel <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php
    if (is_array($posts)):
        foreach ($posts as $key => $post) {
        the_post(); ?>
            <div class="ct-carousel-item">
                <div class="grid-item-inner">
                    <div class="item-body">
                        <div class="item-category subtitle">
                            <?php
                                $list_category = '';
                                $terms = get_the_terms($post->ID, 'category');
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
                                echo wp_kses_post($list_category);
                            ?>
                        </div>
                        <h3 class="item-title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        </h3>
                        <div class="item-content">
                            <?php echo wp_trim_words( $post->post_excerpt, $num_words = 28, $more = null ); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    endif; ?>
    
</div>