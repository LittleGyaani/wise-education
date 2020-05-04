<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Blog Fullwidth', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-blog-fullwidth.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading source="post_title" font_container="tag:h1|font_size:30|text_align:center|line_height:36px" use_theme_fonts="yes" css=".vc_custom_1491220906832{padding-bottom: 15px !important;}"][con_post count="3" pagination="1"][/vc_column][/vc_row]
CONTENT
);