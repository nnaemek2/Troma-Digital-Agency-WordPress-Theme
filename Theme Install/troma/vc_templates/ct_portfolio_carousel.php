<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'el_class'             => '',
    'img_size'             => '570x460',
    'featured_images'             => '',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('portfolio', $atts));
extract(troma_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'troma-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
$featured_images = (array) vc_param_group_parse_atts($featured_images);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-direction direction-fade ct-grid-portfolio-layout2 owl-carousel <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php
    if (is_array($posts)):
        foreach ($posts as $key => $post) {
            the_post(); 
            $featured_image = isset($featured_images[$key]['featured_image']) ? $featured_images[$key]['featured_image'] : '';
            $img_id = get_post_thumbnail_id($post->ID);
            if(!empty($featured_image)) {
                $img_id = $featured_image;
            }
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                <div class="ct-carousel-item">
                    <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                        <div class="item-direction">
                            <?php $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); ?>
                            <?php echo wp_kses_post($thumbnail); ?>
                            <div class="item-holder">
                                <a class="item-more" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php }
    endif; ?>
    
</div>