<?php
/*
 * VC
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Style", 'troma'),
    "param_name" => "ct_row_class",
    "value" => array(
        'None' => '',
        'Row Overlay' => 'row-overlay',
        'Row Background Color Primary' => 'bg-primary',
        'Row Background Color Gradient' => 'row-bg-gradient',
        'Row Background Color Gradient Overlay' => 'row-bg-gradient-overlay',
        'Row Visible' => 'row-visible',
        'Row Flex' => 'row-flex',
        'Row Padding Right Remove' => 'rm-padding-right',
    ),
    "group" => esc_html__("Customs", 'troma'),
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Background Image Position", 'troma'),
    "param_name" => "bg_image_position",
    "value" => array(
        'Inherit' => 'bg-image-ps-inherit',
        'Top' => 'bg-image-ps-top',
        'Center' => 'bg-image-ps-center',
        'Bottom' => 'bg-image-ps-bottom',
    ),
    "group" => esc_html__("Design Options", 'troma'),
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Background Attachment Fixed", 'troma'),
    "param_name" => "bg_attachment_fixed",
    "value" => array(
        'No' => 'no-bg-fixed',
        'Yes' => 'bg-attachment-fixed',
    ),
    "group" => esc_html__("Design Options", 'troma'),
));

vc_add_param("vc_row_inner", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Background Image Position", 'troma'),
    "param_name" => "bg_image_position",
    "value" => array(
        'Inherit' => 'bg-image-ps-inherit',
        'Top' => 'bg-image-ps-top',
        'Center' => 'bg-image-ps-center',
        'Bottom' => 'bg-image-ps-bottom',
    ),
    "group" => esc_html__("Design Options", 'troma'),
));

vc_add_param("vc_row_inner", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Background Attachment Fixed", 'troma'),
    "param_name" => "bg_attachment_fixed",
    "value" => array(
        'No' => 'no-bg-fixed',
        'Yes' => 'bg-attachment-fixed',
    ),
    "group" => esc_html__("Design Options", 'troma'),
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Style", 'troma'),
    "param_name" => "ct_column_class",
    "value" => array(
        'None' => '',
        'Column Overlay' => 'col-overlay',
        'Remove Padding (Left/Right) XLarge Devices ( < 1400px ) to 15px' => 'rm-padding-xlg',
        'Remove Padding (Left/Right) Large Devices ( < 1199px ) to 15px' => 'rm-padding-lg',
        'Remove Padding (Left/Right) Medium Devices ( < 991px ) to 15px' => 'rm-padding-md',
        'Remove Padding (Left/Right) Small Devices ( < 767px ) to 15px' => 'rm-padding-sm',
        'Remove Padding (Left/Right) Mini Devices ( < 575px ) to 15px' => 'rm-padding-xs',
        'Remove Margin (Top/Right/Bottom/Left) Small Devices ( < 767px ) to 0px' => 'rm-margin-sm',
    ),
    "group" => esc_html__("Customs", 'troma'),
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Column Offset", 'troma'),
    "param_name" => "ct_column_offset",
    "value" => array(
        'None' => '',
        'Offset Container Left' => 'col-offset-left',
        'Offset Container Right' => 'col-offset-right'
    ),
    "group" => esc_html__("Customs", 'troma'),
));

vc_add_param("vc_column_inner", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Style", 'troma'),
    "param_name" => "ct_column_inner_class",
    "value" => array(
        'None' => '',
        'Remove Padding (Left/Right) Large Devices ( < 1199px ) to 30px' => 'rm-padding-lg30',
        'Remove Padding (Left/Right) Large Devices ( < 1199px ) to 15px' => 'rm-padding-lg',
        'Remove Padding (Left/Right) Medium Devices ( < 991px ) to 15px' => 'rm-padding-md',
        'Remove Padding (Left/Right) Small Devices ( < 767px ) to 15px' => 'rm-padding-sm',
        'Remove Padding (Left/Right) Mini Devices ( < 575px ) to 15px' => 'rm-padding-xs',
    ),
    "group" => esc_html__("Customs", 'troma'),
));

vc_add_param("vc_column_inner",
    array(
        'type' => 'animation_style',
        'heading' => esc_html__( 'Animation', 'troma' ),
        'param_name' => 'animation_column',
        'description' => esc_html__( 'Choose your animation style', 'troma' ),
        'admin_label' => false,
        'weight' => 0,
        "group" => esc_html__("Customs", 'troma'),
    )
);

// vc_tta_accordion
//--------------------------------------------------
vc_remove_param( 'vc_tta_accordion', 'title' );
vc_remove_param( 'vc_tta_accordion', 'style' );
vc_remove_param( 'vc_tta_accordion', 'shape' );
vc_remove_param( 'vc_tta_accordion', 'color' );
vc_remove_param( 'vc_tta_accordion', 'no_fill' );
vc_remove_param( 'vc_tta_accordion', 'spacing' );
vc_remove_param( 'vc_tta_accordion', 'gap' );
vc_remove_param( 'vc_tta_accordion', 'c_align' );
vc_remove_param( 'vc_tta_accordion', 'autoplay' );
vc_remove_param( 'vc_tta_accordion', 'c_icon' );
vc_remove_param( 'vc_tta_accordion', 'c_position' );
vc_add_param("vc_tta_accordion",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'troma' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'default',
        ),
    )
);

// vc_tta_tabs
//--------------------------------------------------
vc_remove_param( 'vc_tta_tabs', 'title' );
vc_remove_param( 'vc_tta_tabs', 'style' );
vc_remove_param( 'vc_tta_tabs', 'shape' );
vc_remove_param( 'vc_tta_tabs', 'color' );
vc_remove_param( 'vc_tta_tabs', 'spacing' );
vc_remove_param( 'vc_tta_tabs', 'gap' );
vc_add_param("vc_tta_tabs",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'troma' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'default',
        ),
    )
);

vc_remove_param( 'vc_tta_tour', 'title' );
vc_remove_param( 'vc_tta_tour', 'style' );
vc_remove_param( 'vc_tta_tour', 'shape' );
vc_remove_param( 'vc_tta_tour', 'color' );
vc_remove_param( 'vc_tta_tour', 'spacing' );
vc_remove_param( 'vc_tta_tour', 'gap' );
vc_add_param("vc_tta_tour",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'troma' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'tour-default',
        ),
    )
);

// VC Image
//--------------------------------------------------
vc_remove_param( 'vc_single_image', 'style' );
vc_add_param("vc_single_image",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'troma' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'default',
            'Shadow Style 1' => 'shadow-style1',
        ),
        "group" => esc_html__("Styles", 'troma'),
    )
);
vc_add_param("vc_single_image",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image alignment small (768px < Screen < 991px)', 'troma' ),
        'param_name' => 'ct_image_align_md',
        "value" => array(
            'Inherit' => 'inherit',
            'Left' => 'image_align_sm_left',
            'Center' => 'image_align_sm_center',
            'Right' => 'image_align_sm_right',
        ),
        "group" => esc_html__("Styles", 'troma'),
    )
);
vc_add_param("vc_single_image",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image alignment small (Screen < 767px)', 'troma' ),
        'param_name' => 'ct_image_align',
        "value" => array(
            'Inherit' => 'inherit',
            'Left' => 'image_align_xs_left',
            'Center' => 'image_align_xs_center',
            'Right' => 'image_align_xs_right',
        ),
        "group" => esc_html__("Styles", 'troma'),
    )
);

// VC Text Block
//--------------------------------------------------
vc_add_param("vc_column_text",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Text Align', 'troma' ),
        'param_name' => 'text_align',
        "value" => array(
            'Left' => '',
            'Center' => 'text-center',
            'Right' => 'text-right',
        ),
    )
);

vc_add_param("vc_column_text",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Text Style', 'troma' ),
        'param_name' => 'text_style',
        "value" => array(
            'Default' => '',
            'Text Block 1' => 'text-block1',
        ),
    )
);

// WP Custom Menu
//--------------------------------------------------
vc_remove_param( 'vc_wp_custommenu', 'title' );
vc_remove_param( 'vc_wp_custommenu', 'el_class' );
vc_add_param("vc_wp_custommenu",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'troma' ),
        'param_name' => 'el_class',
        "value" => array(
            'Style 1' => 'style1',
            'Style 2 (White)' => 'style2',
        ),
    )
);