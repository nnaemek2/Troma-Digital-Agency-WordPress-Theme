<?php
extract(shortcode_atts(array(
    'title'             => '',
    'position'             => '',
    'image'             => '',
    'social'             => '',
    'animation'             => '',
    'el_class'             => '',
    'img_size' => 'full',
), $atts));
$html_id = cmsHtmlID('ct-team-member');

$img = wpb_getImageBySize( array(
    'attach_id'  => $image,
    'thumb_size' => $img_size,
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$el_social = (array) vc_param_group_parse_atts($social);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-team-member-layout3 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="ct-team-member-inner">
        <?php if (!empty($image)) : ?>
            <div class="ct-team-image">
                <?php echo wp_kses_post($thumbnail); ?>
                <div class="ct-team-social">
                    <?php foreach ($el_social as $key => $value) {
                        $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                        $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                        <a href="<?php echo esc_url($social_link); ?>"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="ct-team-holder">
            <?php if(!empty($position)) : ?>
                <div class="ct-team-position text-gradient2 subtitle"><?php echo esc_attr( $position ); ?></div>
            <?php endif; ?>
            <h3 class="ct-team-title"><?php echo esc_attr( $title ); ?></h3>
        </div>
    </div>
</div>