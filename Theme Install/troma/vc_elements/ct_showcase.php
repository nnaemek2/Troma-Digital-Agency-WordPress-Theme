<?php
vc_map(array(
    'name' => 'Showcase',
    'base' => 'ct_showcase',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Showcase Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'troma'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sub Title', 'troma'),
            'param_name' => 'sub_title',
            'description' => 'Enter sub title.',
            'admin_label' => true,
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'troma'),
            'param_name' => 'title_link',
            'value' => '',
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'troma' ),
            'param_name' => 'banner_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'troma' ),
        ),
    )
));

class WPBakeryShortCode_ct_showcase extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>