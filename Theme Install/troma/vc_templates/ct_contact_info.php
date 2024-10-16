<?php
extract(shortcode_atts(array(
    'subtitle' => '',
    'title' => '',
    'icon_list' => 'fontawesome',
    'icon_fontawesome' => '',
    'icon_material_design' => '',
    'icon_flaticon' => '',
    'icon_etline' => '',
    'animation' => '',
    'el_class' => '',
    'info_style' => 'style-light',
    'title_type' => 'text',
    'subtitle_color' => '',
    'title_color' => '',
), $atts));
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<div class="ct-contact-info <?php echo esc_attr($info_style.' '.$el_class.' '.$animation_classes); ?>">
	<div class="contact-info-inner">
        <?php if($icon_class):?>
            <div class="ct-contact-info-icon">
                <i class="text-gradient <?php echo esc_attr($icon_class); ?>"></i>
            </div>
        <?php endif;?>
        <div class="ct-contact-info-meta">
            <span class="subtitle" <?php if(!empty($subtitle_color)) : ?>style="color:<?php echo esc_attr($subtitle_color); ?>;"<?php endif; ?>><?php echo esc_attr( $subtitle ); ?></span>
            <h3 <?php if(!empty($title_color)) : ?>style="color:<?php echo esc_attr($title_color); ?>;"<?php endif; ?>>
                <?php if($title_type == 'text') : ?>
                    <?php echo esc_attr( $title ); ?>
                <?php endif; ?>
                <?php if($title_type == 'tel') : ?>
                    <a href="tel:<?php echo esc_attr( $title ); ?>"><?php echo esc_attr( $title ); ?></a>
                <?php endif; ?>
                <?php if($title_type == 'email') : ?>
                    <a href="mailto:<?php echo esc_attr( $title ); ?>"><?php echo esc_attr( $title ); ?></a>
                <?php endif; ?>
            </h3>
        </div>
	</div>
</div>