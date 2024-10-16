<?php
extract(shortcode_atts(array(
    'title'             => '',
    'position'             => '',
    'description_text'             => '',
    'image'             => '',
    'animation'             => '',
    'el_class'             => '',
    'img_size' => '100x100',
), $atts));
$html_id = cmsHtmlID('ct-testimonial');

$img = wpb_getImageBySize( array(
    'attach_id'  => $image,
    'thumb_size' => $img_size,
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-testimonial-layout2 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="ct-testimonial-holder">
        <svg class="testimonial-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.5 512.5" style="enable-background:new 0 0 512.5 512.5;" xml:space="preserve">
        <g>
            <path d="M112.5,208.25c61.856,0,112,50.145,112,112s-50.144,112-112,112s-112-50.145-112-112l-0.5-16
                c0-123.712,100.288-224,224-224v64c-42.737,0-82.917,16.643-113.137,46.863c-5.817,5.818-11.126,12.008-15.915,18.51
                C100.667,208.723,106.528,208.25,112.5,208.25z M400.5,208.25c61.855,0,112,50.145,112,112s-50.145,112-112,112
                s-112-50.145-112-112l-0.5-16c0-123.712,100.287-224,224-224v64c-42.736,0-82.918,16.643-113.137,46.863
                c-5.818,5.818-11.127,12.008-15.916,18.51C388.666,208.723,394.527,208.25,400.5,208.25z"/>
        </g>
        </svg>
        <h3><?php echo esc_attr( $description_text ); ?></h3>
        <svg class="testimonial-arrow" xmlns="http://www.w3.org/2000/svg" width="107.688" height="22" viewBox="0 0 107.688 22">
            <path d="M846.553,2435.83m7.29-153.83c-5.374-1.5-11.811-3.3-11.811-3.3a93.218,93.218,0,0,1-16.538-6.95l-17.618-9.92c-4.332-2.44-11.419-2.44-15.751,0l-17.619,9.92a93.924,93.924,0,0,1-16.537,6.95s-6.431,1.8-11.8,3.3" transform="translate(-746.156 -2260)"/>
        </svg>
    </div>  
    <div class="ct-testimonial-content">
        <?php if (!empty($image)) : ?>
            <div class="ct-testimonial-image">
                <?php echo wp_kses_post($thumbnail); ?>
            </div>
        <?php endif; ?>
        <div class="ct-testimonial-meta">
            <h3 class="ct-testimonial-title"><?php echo esc_attr( $title ); ?></h3>
            <?php if(!empty($position)) : ?>
                <div class="ct-testimonial-position text-gradient2 subtitle"><?php echo esc_attr( $position ); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>