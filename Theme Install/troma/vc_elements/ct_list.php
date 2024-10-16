<?php
vc_map(array(
    'name' => 'List',
    'base' => 'ct_list',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Lists Displayed', 'troma' ),
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
                'Layout 4' => 'layout4',
            ),
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'troma' ),
            'value' => '',
            'param_name' => 'lists',
            'description' => esc_html__( 'Set content for each item.', 'troma' ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'troma'),
                    'param_name' => 'content',
                    'description' => 'Enter content.',
                    'admin_label' => true,
                ),
            ),
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout1',
                )
            ),
        ),

        /* Layout 2 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'troma' ),
            'value' => '',
            'param_name' => 'l2_lists',
            'description' => esc_html__( 'Set content for each item.', 'troma' ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Title', 'troma'),
                    'param_name' => 'title',
                    'description' => 'Enter title.',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'troma'),
                    'param_name' => 'content',
                    'description' => 'Enter content.',
                ),
            ),
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout2',
                )
            ),
        ),

        /* Layout 3 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'troma' ),
            'value' => '',
            'param_name' => 'l3_lists',
            'description' => esc_html__( 'Set content for each item.', 'troma' ),
            'params' => array(
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
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'troma'),
                    'param_name' => 'content',
                    'description' => 'Enter content.',
                    'admin_label' => true,
                ),
            ),
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout3',
                )
            ),
        ),
        
        /* Layout 2 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'troma' ),
            'value' => '',
            'param_name' => 'l4_lists',
            'description' => esc_html__( 'Set content for each item.', 'troma' ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Label', 'troma'),
                    'param_name' => 'label',
                    'description' => 'Enter label.',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'troma'),
                    'param_name' => 'content',
                    'description' => 'Enter content.',
                ),
            ),
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout4',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Color', 'troma'),
            'param_name' => 'color',
            'value' => array(
                'Dark' => 'color-dark',
                'Light' => 'color-light',
            ),
            'dependency' => array(
                'element'=>'layout',
                'value'=>array(
                    'layout4',
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

class WPBakeryShortCode_ct_list extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>