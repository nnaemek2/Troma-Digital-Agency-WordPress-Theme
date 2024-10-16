<?php
vc_map(array(
    'name' => 'Row Angled',
    'base' => 'ct_angled',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Angled Displayed', 'troma' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Angled Style', 'troma'),
            'admin_label' => true,
            'param_name' => 'angled_style',
            'value' => array(
                'Angled Arrow 1' => 'style1',
                'Angled Arrow 2' => 'style2',
                'Angled Curved 1' => 'style3',
                'Angled Curved 2' => 'style4',
            ),
            'group' => esc_html__('Angled Settings', 'troma'),
        ),
        array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Angled Position', 'troma'),
            'admin_label' => true,
            'param_name' => 'angled_pos',
            'value' => array(
                'Top' => 'top',
                'Bottom' => 'bottom',
            ),
            'group' => esc_html__('Angled Settings', 'troma'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Angled Color', 'troma'),
            'param_name' => 'angled_color',
            'value' => '',
            'group' => esc_html__('Angled Settings', 'troma')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Angled Height', 'troma' ),
            'param_name' => 'angled_height',
            'value' => '',
            'description' => 'Enter number.',
            'group' => esc_html__('Angled Settings', 'troma')
        ),
    )
));

class WPBakeryShortCode_ct_angled extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>