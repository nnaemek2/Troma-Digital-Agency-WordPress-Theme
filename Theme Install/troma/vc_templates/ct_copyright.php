<?php
extract(shortcode_atts(array(
    'text_copyright' => '',
    'content_align' => 'text-center',
    'text_color' => '',
    'el_class' => '',
), $atts));
?>
<div class="ct-copyright <?php echo esc_attr($content_align.' '.$el_class); ?>" style="<?php if(!empty($text_color)) { echo 'color:'.esc_attr($text_color).';'; } ?>">
    <?php if(!empty($text_copyright)) {
        echo apply_filters('the_content', $text_copyright);
    } else {
        echo wp_kses_post('Copyright &copy; '.esc_attr(date("Y")).'. Made With Love Troma by <a target="_blank" href="https://themeforest.net/user/case-themes/portfolio/portfolio">CaseThemes</a>');
    } ?>
</div>