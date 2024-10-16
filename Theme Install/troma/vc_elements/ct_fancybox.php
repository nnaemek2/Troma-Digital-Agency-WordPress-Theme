<?php
vc_map(array(
    'name' => 'Fancy Box',
    'base' => 'ct_fancybox',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Fancy Box Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_fancybox',
            'heading' => esc_html__('Shortcode Template', 'troma'),
            'admin_label' => true,
            'std' => 'ct_fancybox.php',
            'group' => esc_html__('Template', 'troma'),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Background Image', 'troma' ),
            'param_name' => 'bg_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'troma' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                )
            ),
            'group' => esc_html__('Template', 'troma'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Item Same Height', 'troma'),
            'param_name' => 'item_same_height',
            'value' => array(
                'Yes' => 'col-same-height',
                'No' => 'no-same-height',
            ),
            'group' => esc_html__('Template', 'troma'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout4.php',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Styles', 'troma'),
            'param_name' => 'styles',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
            ),
            'group' => esc_html__('Template', 'troma'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout4.php',
                )
            ),
        ),

        /* Title */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'troma'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'group' => esc_html__('Title', 'troma'),
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'troma'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'troma'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'troma'),
            'param_name' => 'title_font_size',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'troma'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Line Height', 'troma'),
            'param_name' => 'title_line_height',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'troma'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        /* Description */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'troma'),
            'param_name' => 'description',
            'description' => 'Enter description.',
            'group' => esc_html__('Description', 'troma'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'troma'),
            'param_name' => 'description_color',
            'value' => '',
            'group' => esc_html__('Description', 'troma'),
        ),

        /* Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Type', 'troma'),
            'param_name' => 'icon_type',
            'value' => array(
                'Icon' => 'icon',
                'Image' => 'image',
            ),
            'group' => esc_html__('Icon', 'troma'),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Icon Image', 'troma' ),
            'param_name' => 'icon_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'troma' ),
            'dependency' => array(
                'element'=>'icon_type',
                'value'=>array(
                    'image',
                )
            ),
            'group' => esc_html__('Icon', 'troma'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'troma' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'troma' ) => 'fontawesome',
                esc_html__( 'Material Design', 'troma' ) => 'material_design',
                esc_html__( 'Flaticon', 'troma' ) => 'flaticon',
                esc_html__( 'ET Line', 'troma' ) => 'etline',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'troma' ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'group' => esc_html__('Icon', 'troma'),
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
            'group' => esc_html__('Icon', 'troma'),
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
            'group' => esc_html__('Icon', 'troma'),
        ),  
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Flaticon', 'troma' ),
            'param_name' => 'icon_flaticon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'flaticon',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'flaticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'troma' ),
            'group' => esc_html__('Icon', 'troma'),
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
            'group' => esc_html__('Icon', 'troma'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'troma'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Icon', 'troma'),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon Font Size', 'troma'),
            'param_name' => 'icon_font_size',
            'group' => esc_html__('Icon', 'troma'),
            'description' => 'Enter number.',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        /* Button */
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'troma'),
            'param_name' => 'btn_link',
            'value' => '',
            'group' => esc_html__('Item Link', 'troma'),
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

class WPBakeryShortCode_ct_fancybox extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>