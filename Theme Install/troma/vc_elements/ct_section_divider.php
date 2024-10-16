<?php
vc_map(array(
    'name' => 'Section Divider',
    'base' => 'ct_section_divider',
    'class' => 'ct-icon-element',
    'description' => esc_html__( 'Section Divider Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'troma' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'troma' ),
        ),
    )
));

class WPBakeryShortCode_ct_section_divider extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>