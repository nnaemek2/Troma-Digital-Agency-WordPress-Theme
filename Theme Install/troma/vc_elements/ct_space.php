<?php
vc_map(array(
    'name' => 'Empty Space',
    'base' => 'ct_space',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Blank space width custom height', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Space Large (Devices > 1200px)', 'troma'),
            'param_name' => 'space_lg',
            'description' => 'Enter number.',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Space Medium (1199px > Devices > 992px)', 'troma'),
            'param_name' => 'space_md',
            'description' => 'Enter number.',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Space Small (991px > Devices > 768px)', 'troma'),
            'param_name' => 'space_sm',
            'description' => 'Enter number.',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Space Mini (Devices < 767px)', 'troma'),
            'param_name' => 'space_xs',
            'description' => 'Enter number.',
            'admin_label' => true,
        ),

    )
));

class WPBakeryShortCode_ct_space extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>