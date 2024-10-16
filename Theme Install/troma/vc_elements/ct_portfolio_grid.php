<?php
$term_list = cms_get_grid_term_list('portfolio');
vc_map(
    array(
        'name'     => esc_html__('Portfolio Grid', 'troma'),
        'base'     => 'ct_portfolio_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Portfolio Displayed', 'troma' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'troma'),
        'params'   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_portfolio_grid',
                'heading' => esc_html__('Shortcode Template', 'troma'),
                'admin_label' => true,
                'std' => 'ct_portfolio_grid.php',
                'group' => esc_html__('Template', 'troma'),
            ),

            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__('Custom Source', 'troma'),
                'param_name' => 'custom_source',
                'value'      => '1',
                'description'        => 'Check here if you want custom source',
                'group'      => esc_html__('Source Settings', 'troma')
            ),
            array(
                'type'       => 'autocomplete',
                'heading'    => esc_html__('Select Categories', 'troma'),
                'param_name' => 'source',
                'description' => esc_html__('Leave blank to select all category', 'troma'),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => $term_list['auto_complete'],
                ),
                'dependency' => array(
                    'element'=>'custom_source',
                    'value'=>array(
                        'true',
                    )
                ),
                'group'      => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Select Post Name', 'troma'),
                'param_name' => 'post_ids',
                'description' => esc_html__('Leave blank to show all post', 'troma'),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => cms_get_type_posts_data('portfolio')
                ),
                'dependency' => array(
                    'element'=>'custom_source',
                    'value'=>array(
                        'true',
                    )
                ),
                'group'      => esc_html__('Source Settings', 'troma'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Order by', 'troma'),
                'param_name' => 'orderby',
                'value'      => array(
                    'Date'   => 'date',
                    'ID'     => 'ID',
                    'Author' => 'author',
                    'Title'  => 'title',
                    'Random' => 'rand',
                ),
                'std'        => 'date',
                'group'      => esc_html__('Source Settings', 'troma')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Sort order', 'troma'),
                'param_name' => 'order',
                'value'      => array(
                    'Ascending'  => 'ASC',
                    'Descending' => 'DESC',
                ),
                'std'        => 'DESC',
                'group'      => esc_html__('Source Settings', 'troma')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Total items', 'troma'),
                'param_name' => 'limit',
                'value'      => '6',
                'group'      => esc_html__('Source Settings', 'troma'),
                'description' => esc_html__('Set max limit for items in grid. Enter number only', 'troma'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'troma' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height). Enter multiple sizes (Example: 100x100,200x200,300x300)).', 'troma' ),
                'group'      => esc_html__('Grid Settings', 'troma'),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Featured Images', 'troma' ),
                'value' => '',
                'param_name' => 'featured_images',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'troma' ),
                        'param_name' => 'featured_image',
                        'value' => '',
                        'description' => esc_html__( 'Select featured image from media library.', 'troma' ),
                    ),
                ),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
                ),
                'group'      => esc_html__('Grid Settings', 'troma'),
            ),

            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Layout Type', 'troma'),
                'param_name' => 'layout',
                'value'      => array(
                    'Basic'   => 'basic',
                    'Masonry' => 'masonry',
                ),
                'group'      => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Item Gap', 'troma'),
                'param_name' => 'gap',
                'value'      => '',
                'group'      => esc_html__('Grid Settings', 'troma'),
                'description' => esc_html__('Select gap between grid elements. Enter number only', 'troma'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter on Masonry', 'troma'),
                'param_name' => 'filter',
                'value'      => array(
                    'Enable'  => 'true',
                    'Disable' => 'false'
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Pagination Type', 'troma'),
                'param_name' => 'pagination_type',
                'value'      => array(
                    'Loadmore' => 'loadmore',
                    'Pagination'  => 'pagination',
                    'Disable' => 'false',
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Default Title', 'troma'),
                'param_name' => 'filter_default_title',
                'value'      => 'All',
                'group'      => esc_html__('Filter', 'troma'),
                'description' => esc_html__('Enter default title for filter option display, empty: All', 'troma'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),

            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XS', 'troma'),
                'param_name'       => 'col_xs',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns SM', 'troma'),
                'param_name'       => 'col_sm',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns MD', 'troma'),
                'param_name'       => 'col_md',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 3,
                'group'            => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns LG', 'troma'),
                'param_name'       => 'col_lg',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'troma')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XL', 'troma'),
                'param_name'       => 'col_xl',
                'edit_field_class' => 'vc_col-sm-12 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'troma')
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
    )
);

class WPBakeryShortCode_ct_portfolio_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-portfolio-grid');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>