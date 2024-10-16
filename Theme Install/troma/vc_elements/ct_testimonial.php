<?php
vc_map(
    array(
        'name'     => esc_html__('Testimonial', 'troma'),
        'base'     => 'ct_testimonial',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Testimonial Displayed', 'troma' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
        'params'   => array(
            
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_testimonial',
                'heading' => esc_html__('Shortcode Template', 'troma'),
                'admin_label' => true,
                'std' => 'ct_testimonial.php',
                'group' => esc_html__('Template', 'troma'),
            ),

            /* Source Settings */
            array(
                'type' => 'textfield',
                'heading' =>esc_html__('Title', 'troma'),
                'param_name' => 'title',
                'admin_label' => true,
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'textfield',
                'heading' =>esc_html__('Position', 'troma'),
                'param_name' => 'position',
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'troma' ),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'troma' ),
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'textarea',
                'heading' =>esc_html__('Description Heading', 'troma'),
                'param_name' => 'description_heading',
                'group' => esc_html__('Source Settings', 'troma'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_testimonial.php',
                    )
                ),
            ),
            array(
                'type' => 'textarea',
                'heading' =>esc_html__('Description Text', 'troma'),
                'param_name' => 'description_text',
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'troma' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'troma' ),
                'group'            => esc_html__('Extra', 'troma')
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation Style', 'troma' ),
                'param_name' => 'animation',
                'description' => esc_html__( 'Choose your animation style', 'troma' ),
                'admin_label' => false,
                'weight' => 0,
                "group" => esc_html__("Extra", 'troma'),
            ),
        )
    )
);

class WPBakeryShortCode_ct_testimonial extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>