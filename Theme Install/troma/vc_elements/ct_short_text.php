<?php
vc_map(array(
    'name' => 'Short Text',
    'base' => 'ct_short_text',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Short Text Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'troma'),
            'param_name' => 'layout',
            'value' => array(
                'Layout 1' => 'layout1',
                'Layout 2' => 'layout2',
                'Layout 3' => 'layout3',
            ),
        ),

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'troma'),
            'param_name' => 'title',
            'description' => 'Enter title.',
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'troma'),
            'param_name' => 'description',
            'description' => 'Enter description.',
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Button Text', 'troma' ),
            'param_name' => 'button_text',
            'value' => '',
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout2',
                    'layout3',
                )
            ),
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Button Link', 'troma'),
            'param_name' => 'button_link',
            'value' => '',
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout3',
                )
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
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'troma' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'troma' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extra', 'troma'),
        ),
    )
));

class WPBakeryShortCode_ct_short_text extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>