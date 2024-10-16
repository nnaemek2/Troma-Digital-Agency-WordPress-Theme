<?php
/**
 * Newsletter form for VC
 * Require Newsletter plugin to be installed
 */

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $forms_list = array(
        esc_html__( 'Default Form', 'troma' ) => 'default'
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $forms_list[ sprintf( esc_html__( 'Form %s', 'troma' ), $index ) ] = $key;
            $index ++;
        }
    }

    vc_map(array(
        "name" => 'Newsletter',
        "base" => "ct_newsletter",
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Newsletter Form', 'troma' ),
        "category" => esc_html__('CaseThemes Shortcodes', 'troma'),
        "params" => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Newsletter Form', 'troma' ),
                'description' => esc_html__( 'Pick default or custom forms from Newsletter Plugin.', 'troma' ),
                'value'       => $forms_list,
                'admin_label' => true,
                'param_name'  => 'form'
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", 'troma' ),
                "param_name" => "el_class",
                "description" => esc_html__( "Style particular content element differently - add a class name and refer to it in Custom CSS.", 'troma' ),
                'group' => esc_html__('Extra', 'troma'),
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

    class WPBakeryShortCode_ct_newsletter extends CmsShortCode
    {

        protected function content($atts, $content = null)
        {
            return parent::content($atts, $content);
        }
    }
} ?>