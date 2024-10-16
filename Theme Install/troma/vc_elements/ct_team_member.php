<?php
vc_map(
    array(
        'name'     => esc_html__('Team Member', 'troma'),
        'base'     => 'ct_team_member',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Team Member Displayed', 'troma' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
        'params'   => array(

            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_team_member',
                'heading' => esc_html__('Shortcode Template', 'troma'),
                'admin_label' => true,
                'std' => 'ct_team_member.php',
                'group' => esc_html__('Template', 'troma'),
            ),
            
            /* Source Settings */
            array(
                'type' => 'textfield',
                'heading' =>esc_html__('Title', 'troma'),
                'param_name' => 'title',
                'admin_label' => true,
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'textfield',
                'heading' =>esc_html__('Position', 'troma'),
                'param_name' => 'position',
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'troma' ),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'troma' ),
                'group' => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'troma' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).", "troma" ),
                'group'      => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Social', 'troma' ),
                'param_name' => 'social',
                'description' => esc_html__( 'Enter values for team item', 'troma' ),
                'value' => '',
                'group' => esc_html__('Source Settings', 'troma'),
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
                "group" => esc_html__("Extra", 'troma'),
            ),
        )
    )
);

class WPBakeryShortCode_ct_team_member extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>