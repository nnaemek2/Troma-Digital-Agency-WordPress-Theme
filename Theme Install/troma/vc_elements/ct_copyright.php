<?php
vc_map(array(
    'name' => 'Copyright',
    'base' => 'ct_copyright',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Copyright Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'troma'),
            'param_name' => 'text_copyright',
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'troma'),
            'param_name' => 'text_color',
            'value' => '',
        ),
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content Align', 'troma'),
            'param_name' => 'content_align',
            'value' => array(
                'Content Center' => 'text-center',
                'Content Left' => 'text-left',
                'Content Right' => 'text-right',
            ),
        ),

        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'troma' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'troma' ),
            'group'            => esc_html__('Extra', 'troma')
        ),
    )
));

class WPBakeryShortCode_ct_copyright extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>