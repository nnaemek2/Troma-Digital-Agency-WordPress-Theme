<?php
extract(shortcode_atts(array(
    'el_class' => '',
), $atts));
?>
<div class="row-divider <?php echo esc_attr($el_class); ?>">
    <div class="row-divider-top"></div>
    <div class="row-divider-bottom"></div>
</div>