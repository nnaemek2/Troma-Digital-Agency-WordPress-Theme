<?php
extract(shortcode_atts(array(
    'title'             => '',
    'position'             => '',
    'description_heading'             => '',
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

<div id="<?php echo esc_attr($html_id) ?>" class="ct-testimonial-default <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="ct-testimonial-holder">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
            <g>
                <path d="M224.001,74.328c5.891,0,10.667-4.776,10.667-10.667s-4.776-10.667-10.667-10.667
                    c-123.653,0.141-223.859,100.347-224,224v64c-0.185,64.99,52.349,117.825,117.338,118.01
                    c64.99,0.185,117.825-52.349,118.01-117.338c0.185-64.99-52.349-117.825-117.338-118.01c-38.374-0.109-74.392,18.499-96.506,49.861
                    C23.48,163.049,113.514,74.485,224.001,74.328z"/>
                <path d="M394.667,223.662c-38.154,0.03-73.905,18.63-95.829,49.856
                    c1.976-110.469,92.01-199.033,202.496-199.189c5.891,0,10.667-4.776,10.667-10.667s-4.776-10.667-10.667-10.667
                    c-123.653,0.141-223.859,100.347-224,224v64c0,64.801,52.532,117.333,117.333,117.333S512,405.796,512,340.995
                    S459.469,223.662,394.667,223.662z"/>
            </g>
        </svg>
        <h3><?php echo esc_attr( $description_heading ); ?></h3>
        <p><?php echo esc_attr( $description_text ); ?></p>
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