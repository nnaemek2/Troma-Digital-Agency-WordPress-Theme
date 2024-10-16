<?php
$args = array(
    'name' => 'Social',
    'base' => 'ct_social',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Social Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(
        
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Social', 'troma' ),
            'param_name' => 'social',
            'description' => esc_html__( 'Enter values for team item', 'troma' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'troma' ),
                    'param_name' => 'icon',
                    'value' => '',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'fontawesome',
                        'iconsPerPage' => 200,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'troma' ),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Link', 'troma'),
                    'param_name' => 'social_link',
                    'admin_label' => true,
                ),
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Align', 'troma' ),
            'param_name' => 'align',
            "value" => array(
                'Left' => 'left',
                'Center' => 'center',
                'Right' => 'right',
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'troma' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'troma' ),
            'group'      => esc_html__('Extra', 'troma'),
        ),
    ));
vc_map($args);

class WPBakeryShortCode_ct_social extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>