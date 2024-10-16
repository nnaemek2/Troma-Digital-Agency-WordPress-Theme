<?php
extract(shortcode_atts(array(
    'video_layout' => 'layout1',
    'l2_title' => '',
    'l2_desc' => '',
    'video_bg_image' => '',
    'video_link' => '',
    'video_intro' => '',
    'intro_style' => 'style1',
    'button_style' => 'style1',
    'video_description' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-video');
$image_url = '';
if (!empty($atts['video_intro'])) {
    $attachment_image = wp_get_attachment_image_src($atts['video_intro'], 'full');
    $image_url = $attachment_image[0];
}
$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); ?>

<?php if($video_layout == 'layout1') : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-video-wrapper ct-video-layout1 video-intro-<?php echo esc_attr( $intro_style ); ?> <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
        <div class="ct-video-inner">
            <?php if(!empty($image_url)) : ?>
                <div class="ct-video-intro intro-<?php echo esc_attr( $intro_style ); ?>" <?php if($intro_style == 'style3') : ?>style="background-image: url(<?php echo esc_url($image_url); ?>); "<?php endif; ?>><img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html__( 'Intro Video', 'troma' ); ?>" /></div>
            <?php endif; ?>
            <a class="ct-video-button <?php echo esc_attr($button_style); ?>" href="<?php echo esc_url($a_href);?>">
                <i class="fa fa-play"></i>
            </a>
        </div>
        <?php if($intro_style == 'style3' && !empty($video_description)) : ?>
            <div class="ct-video-description"><?php echo wp_kses_post( $video_description ); ?></div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if($video_layout == 'layout2') : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-video-wrapper ct-video-layout2 <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
        <div class="ct-video-inner">
            <span class="subtitle"><?php echo esc_attr($l2_title); ?></span>
            <div class="video-desc"><?php echo esc_attr($l2_desc); ?></div>
            <a class="ct-video-button" href="<?php echo esc_url($a_href);?>">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
<?php endif; ?>