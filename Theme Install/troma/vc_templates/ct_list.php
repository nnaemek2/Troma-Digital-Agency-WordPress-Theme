<?php
extract(shortcode_atts(array(
    'layout' => 'layout1',
    'lists' => '',
    'l2_lists' => '',
    'l3_lists' => '',
    'l4_lists' => '',
    'animation' => '',
    'el_class' => '',
    'color' => 'color-dark',
), $atts));

$lists = (array) vc_param_group_parse_atts($lists);
$lists2 = (array) vc_param_group_parse_atts($l2_lists);
$lists3 = (array) vc_param_group_parse_atts($l3_lists);
$lists4 = (array) vc_param_group_parse_atts($l4_lists);
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<ul class="ct-list <?php echo esc_attr($layout.' '.$el_class.' '.$color); ?>">
    <?php if($layout == 'layout1') { ?>
        <?php foreach ($lists as $key => $value) { 
            $content = isset($value['content']) ? $value['content'] : ''; 
            $key_number = $key + 1;
            ?>
            <li class="<?php echo esc_attr($animation_classes); ?>">
                <i class="fa fa-check"></i><?php echo wp_kses_post( $content ); ?>
            </li>
        <?php } ?>
    <?php } ?>

    <?php if($layout == 'layout2') { ?>
        <?php foreach ($lists2 as $key => $value) { 
            $title = isset($value['title']) ? $value['title'] : ''; 
            $content = isset($value['content']) ? $value['content'] : ''; 
            $key_number = $key + 1;
            ?>
            <li>
                <label><?php echo wp_kses_post( $title ); ?></label>
                <span><?php echo wp_kses_post( $content ); ?></span>
            </li>
        <?php } ?>
    <?php } ?>

    <?php if($layout == 'layout3') { ?>
        <?php foreach ($lists3 as $key => $value) { 
            $content = isset($value['content']) ? $value['content'] : '';
            $icon_list = isset($value['icon_list']) ? $value['icon_list'] : 'fontawesome';
            $icon_fontawesome = isset($value['icon_fontawesome']) ? $value['icon_fontawesome'] : '';
            $icon_flaticon = isset($value['icon_flaticon']) ? $value['icon_flaticon'] : '';
            $icon_etline = isset($value['icon_etline']) ? $value['icon_etline'] : '';
            $icon_name = "icon_" . $icon_list;
            $icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
            ?>
            <li>
                <?php if($icon_class):?>
                    <i class="<?php echo esc_attr($icon_class); ?> text-gradient"></i>
                <?php endif;?>
                <span><?php echo wp_kses_post( $content ); ?></span>
            </li>
        <?php } ?>
    <?php } ?>

    <?php if($layout == 'layout4') { ?>
        <?php foreach ($lists4 as $key => $value) { 
            $label = isset($value['label']) ? $value['label'] : ''; 
            $content = isset($value['content']) ? $value['content'] : ''; 
            $key_number = $key + 1;
            ?>
            <li>
                <label><?php echo wp_kses_post( $label ); ?></label>
                <span><?php echo wp_kses_post( $content ); ?></span>
            </li>
        <?php } ?>
    <?php } ?>

</ul>