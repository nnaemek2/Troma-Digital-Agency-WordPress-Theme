<?php
vc_map(array(
    'name' => 'Contact Info',
    'base' => 'ct_contact_info',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Contact Info Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

        /* Title */
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Sub Title', 'troma'),
            'param_name' => 'subtitle',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Sub Title Color', 'troma'),
            'param_name' => 'subtitle_color',
            'value' => '',
        ),

        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Title', 'troma'),
            'param_name' => 'title',
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title Color', 'troma'),
            'param_name' => 'title_color',
            'value' => '',
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Title Type', 'troma'),
            'param_name' => 'title_type',
            'value' => array(
                'Text' => 'text',
                'Tel' => 'tel',
                'Email' => 'email',
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'troma' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'troma' ) => 'fontawesome',
                esc_html__( 'Material Design', 'troma' ) => 'material_design',
                esc_html__( 'ET Line', 'troma' ) => 'etline',
                esc_html__( 'Themify', 'troma' ) => 'themify',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'troma' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Material', 'troma' ),
            'param_name' => 'icon_material_design',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'material-design',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'material_design',
            ),
            'description' => esc_html__( 'Select icon from library.', 'troma' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon FontAwesome', 'troma' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'troma' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon ET Line', 'troma' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'etline',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'troma' ),
        ),      
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Themify', 'troma' ),
            'param_name' => 'icon_themify',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'themify',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'troma' ),
        ), 

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'troma'),
            'param_name' => 'info_style',
            'value' => array(
                'Light' => 'style-light',
                'Dark' => 'style-dark',
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

class WPBakeryShortCode_ct_contact_info extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>