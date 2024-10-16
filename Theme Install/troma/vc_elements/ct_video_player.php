<?php
vc_map(array(
    'name' => 'Video Player',
    'base' => 'ct_video_player',
    'class'    => 'ct-icon-element',
    'description' => 'Embed Youtube/Vimeo player',
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(

         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Video Layout', 'troma'),
            'param_name' => 'video_layout',
            'value' => array(
                'Layout 1' => 'layout1',
                'Layout 2' => 'layout2',
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'troma' ),
            'param_name' => 'l2_title',
            'dependency' => array(
                'element'=>'video_layout',
                'value'=>array(
                    'layout2',
                )
            ),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Description', 'troma' ),
            'param_name' => 'l2_desc',
            'dependency' => array(
                'element'=>'video_layout',
                'value'=>array(
                    'layout2',
                )
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Video Url', 'troma' ),
            'param_name' => 'video_link',
            'value' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0',
            'description' => 'Video url on Youtube, Vimeo'
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Video Intro', 'troma' ),
            'param_name' => 'video_intro',
            'value' => '',
            'dependency' => array(
                'element'=>'video_layout',
                'value'=>array(
                    'layout1',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Intro Style', 'troma'),
            'param_name' => 'intro_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
            ),
            'dependency' => array(
                'element'=>'video_layout',
                'value'=>array(
                    'layout1',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Play Style', 'troma'),
            'param_name' => 'button_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
            ),
            'dependency' => array(
                'element'=>'intro_style',
                'value'=>array(
                    'style1',
                )
            ),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Video Description', 'troma'),
            'param_name' => 'video_description',
            'dependency' => array(
                'element'=>'intro_style',
                'value'=>array(
                    'style3',
                )
            ),
        ),

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

class WPBakeryShortCode_ct_video_player extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>