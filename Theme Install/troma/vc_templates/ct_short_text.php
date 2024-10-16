<?php
extract(shortcode_atts(array(
    'title' => '',
    'description' => '',
    'layout' => 'layout1',
    'button_text' => '',
    'button_link' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$link = vc_build_link($button_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<div class="ct-short-text <?php echo esc_attr($layout.' '.$el_class.' '.$animation_classes); ?>">
	<?php if(!empty($title)) : ?>
        <h3 class="short-text-title">
            <?php echo wp_kses_post( $title ); ?>
        </h3>
    <?php endif;?>
    <?php if(!empty($description)) : ?>
        <div class="short-text-description">
            <?php echo wp_kses_post( $description ); ?>
        </div>
    <?php endif;?>
    
    <?php if($layout == 'layout2' && !empty($button_text) || $layout == 'layout3' && !empty($button_text)) : ?>
        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>" class="btn btn-text-arrow">
            <span><?php echo esc_attr($button_text); ?></span>
        </a>
    <?php endif; ?>
</div>