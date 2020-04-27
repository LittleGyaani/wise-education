<?php
if ( function_exists('vc_add_param') ) {
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Fullwidth', 'bauer'),
            "param_name" => "fullwidth",
            "value" => array(   
                esc_html__('No', 'bauer') => 'no',  
                esc_html__('Yes', 'bauer') => 'yes',                                                                                
            ),
            "description" => esc_html__("Select 'Yes' to stretch row and content", 'bauer' ),      
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Spacing Between Columns', 'bauer'),
            "param_name" => "column_spacing",
            'value' => array(
                esc_html__( 'Default', 'bauer' ) => '30',
                '0px' => '0px',
                '1px' => '1',
                '5px' => '5',
                '10px' => '10',
                '20px' => '20',
                '30px' => '30',
                '40px' => '40',
                '50px' => '50',
                '60px' => '60',
                '65px' => '65',
                '70px' => '70',
                '80px' => '80',
                '90px' => '90',
                '100px' => '100',
            ),     
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Enable Aside Image for Row?', 'bauer' ),
            'param_name' => 'img_halfrow',
            'value' => array(
                esc_html__( 'Disable', 'bauer' ) => '',
                esc_html__( 'Background', 'bauer' ) => 'simple',
                esc_html__( 'Parallax', 'bauer' ) => 'parallax',
                esc_html__( 'Absolute', 'bauer' ) => 'absolute',
            ),
            'description' => esc_html__( 'Put a image left or right side of row', 'bauer' ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'bauer' ),
            'param_name' => 'halfrow_image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'bauer' ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax', 'absolute' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Columns image', 'bauer' ),
            'param_name' => 'img_columns',
            'value' => array(
                esc_html__( 'Default', 'bauer' ) => '',
                esc_html__( 'Image on 3 Columns', 'bauer' ) => '3columns',
                esc_html__( 'Image on 4 Columns', 'bauer' ) => '4columns',
                esc_html__( 'Image on 5 Columns', 'bauer' ) => '5columns',
                esc_html__( 'Image on 6 Columns', 'bauer' ) => '6columns',
                esc_html__( 'Image on 7 Columns', 'bauer' ) => '7columns',
            ),
            'description' => esc_html__( 'Select columns position within row.', 'bauer' ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Image position', 'bauer' ),
            'param_name' => 'img_position',
            'value' => array(
                esc_html__( 'Default', 'bauer' ) => '',
                esc_html__( 'Image on Left Row', 'bauer' ) => 'imgleft',
                esc_html__( 'Image on Right Row', 'bauer' ) => 'imgright',                
            ),
            'description' => esc_html__( 'Select Image position within row.', 'bauer' ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Video URL (Link Youtube/Vimeo)', 'bauer'),
            "param_name" => "image_video",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Image Parallax: Offset Top', 'bauer'),
            "param_name" => "img_offset_top",
            'value' => array(
                '0px' => '0px',
                '50px' => '50px',
                '60px' => '60px',
                '70px' => '70px',
                '80px' => '80px',
                '90px' => '90px',
                '100px' => '100px',
                '110px' => '110px',
                '120px' => '120px',
                '130px' => '130px',
                '140px' => '140px',
                '150px' => '150px',
                '160px' => '160px',
                '170px' => '170px',
                '180px' => '180px',
                '190px' => '190px',
                '200px' => '200px',
                '210px' => '210px',
                '220px' => '220px',
                '230px' => '230px',
                '240px' => '240px',
                '250px' => '250px',
            ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Image Parallax: Offset Right', 'bauer'),
            "param_name" => "img_offset_right",
            'value' => array(
                '0px' => '0px',
                '10px' => '10px',
                '20px' => '20px',
                '30px' => '30px',
                '40px' => '40px',
                '50px' => '50px',
                '60px' => '60px',
                '70px' => '70px',
                '80px' => '80px',
                '90px' => '90px',
                '100px' => '100px',
                '110px' => '110px',
                '120px' => '120px',
                '130px' => '130px',
                '140px' => '140px',
                '150px' => '150px',
                '160px' => '160px',
                '170px' => '170px',
                '180px' => '180px',
                '190px' => '190px',
                '200px' => '200px',
            ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax X', 'bauer'),
            'param_name' => 'parallax_x',
            'description'   => esc_html__('X axis translation.', 'bauer'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax Y', 'bauer'),
            'param_name' => 'parallax_y',
            'description'   => esc_html__('Y axis translation.', 'bauer'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Top', 'bauer'),
            "param_name" => "img_top",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Right', 'bauer'),
            "param_name" => "img_right",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Bottom', 'bauer'),
            "param_name" => "img_bottom",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Left', 'bauer'),
            "param_name" => "img_left",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Translate X', 'bauer'),
            'param_name' => 'image_x',
            'description'   => esc_html__('X axis translation.', 'bauer'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Translate Y', 'bauer'),
            'param_name' => 'image_y',
            'description'   => esc_html__('Y axis translation.', 'bauer'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Show Scroll Arrow', 'bauer'),
            "param_name" => "arrow",
            "value" => array(   
                esc_html__('No', 'bauer') => 'no',  
                esc_html__('Yes', 'bauer') => 'yes',                                                                                
            ),  
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Scroll to ID', 'bauer'),
            "param_name" => "scroll_id",
            'value' => '',
            'dependency' => array(
                'element' => 'arrow',
                'value' => 'yes',
            ),
        )
    );
    // Add new Param in Row Inner  
    vc_add_param(
        'vc_row_inner',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Spacing Between Columns', 'bauer'),
            "param_name" => "column_inner_spacing",
            'value' => array(
                esc_html__( 'Default', 'bauer' ) => '30',
                '0px' => '0px',
                '1px' => '1',
                '5px' => '5',
                '10px' => '10',
                '20px' => '20',
                '30px' => '30',
                '40px' => '40',
                '50px' => '50',
                '60px' => '60',
                '65px' => '65',
                '70px' => '70',
                '80px' => '80',
                '90px' => '90',
                '100px' => '100',
            ),     
        ) 
    );
    vc_add_param(
        'vc_row_inner',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Padding Wrapper', 'bauer'),
            "param_name" => "column_inner_padding",
            'value' => '',     
        )
    );
    vc_add_param(
        'vc_row_inner',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Mobile Padding Wrapper', 'bauer'),
            "param_name" => "column_inner_mobipadding",
            'value' => '',     
        )
    );
}

if ( function_exists('vc_remove_param') ) {
    vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
    vc_remove_param( "vc_row", "video_bg_url" );
    vc_remove_param( "vc_row", "parallax_speed_bg" );
    vc_remove_param( "vc_row", "parallax_speed_video" );
    vc_remove_param( "vc_row", "columns_placement" );
    vc_remove_param( "vc_row", "gap" );
    vc_remove_param( 'vc_row_inner', 'gap' );
    vc_remove_param( 'vc_row_inner', 'equal_height' );
    vc_remove_param( 'vc_row_inner', 'content_placement' );
    vc_remove_param( "vc_column", "css_animation" ); 
}    