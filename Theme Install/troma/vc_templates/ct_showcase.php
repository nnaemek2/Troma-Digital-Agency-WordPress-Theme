<?php
extract(shortcode_atts(array(
    'title' => '',
    'sub_title' => '',
    'title_link' => '',
    'banner_image' => '',
), $atts));
$img = wpb_getImageBySize( array(
    'attach_id'  => $banner_image,
    'thumb_size' => 'full',
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
$link = vc_build_link($title_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
?>
<div class="ct-showcase">
	<div class="ct-showcase-inner">
		<?php if(!empty($banner_image)) { ?>
            <div class="ct-showcase-image">
                <a href="<?php echo esc_url($a_href);?>" target="_blank">
                    <?php echo wp_kses_post($thumbnail); ?>
                </a>
            </div>
        <?php } ?>
        <h3 class="ct-showcase-title">
            <a href="<?php echo esc_url($a_href);?>" target="_blank">
                <?php echo wp_kses_post( $title ); ?>
                <?php if(!empty($sub_title)) : ?>
                    <span><?php echo esc_attr($sub_title); ?></span>
                <?php endif; ?>
            </a>
        </h3>
	</div>
</div>