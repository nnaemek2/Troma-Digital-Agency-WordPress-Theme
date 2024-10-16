<?php
extract(shortcode_atts(array(

    'content_list' => '',
    'img_size' => '400x400',
    'el_class' => '',
    'animation' => '',

), $atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'troma-carousel' );
$html_id = cmsHtmlID('ct-team-carousel');
extract(troma_get_param_carousel($atts));
$el_content_list = array();
$el_content_list = (array) vc_param_group_parse_atts( $content_list );
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

if(!empty($el_content_list)) : ?>
<div class="ct-team-carousel-wrap">
    <div id="<?php echo esc_attr($html_id);?>" class="ct-team-carousel-layout1 owl-carousel nav-middle <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($el_content_list as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $item_link = isset($value['item_link']) ? $value['item_link'] : '';
            $link = vc_build_link($item_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $social = isset($value['social']) ? $value['social'] : '';
            $el_social = (array) vc_param_group_parse_atts( $social );
            $image = isset($value['image']) ? $value['image'] : '';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-team-item">
                <div class="ct-team-item-inner">
                    <?php if(!empty($image)) { ?>
                        <div class="team-featured">
                            <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <div class="team-social">
                                <?php foreach ($el_social as $key => $value) {
                                    $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                                    $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                                    <a href="<?php echo esc_url($social_link); ?>" target="_blank"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="team-holder">
                            <h3 class="team-title">
                                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($title); ?></a>
                            </h3>
                            <span class="team-position">
                                <?php echo esc_attr($position); ?>
                            </span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php endif;?>