<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental home contact', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-home-contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1512472615807{margin-top: 90px !important;padding-top: 50px !important;background-color: #00b2ca !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column el_class="text-light"][vc_row_inner el_class="uk-text-light"][vc_column_inner el_class="uk-text-center uk-light" css=".vc_custom_1506411181298{padding-bottom: 20px !important;}"][vc_custom_heading text="How it works" font_container="tag:h2|font_size:36|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1512528375318{margin-bottom: 5px !important;}"][vc_custom_heading text="Let you know how our site is working" font_container="tag:h4|text_align:center|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1510907828994{padding-bottom: 40px !important;}"][/vc_column_inner][/vc_row_inner][vc_row_inner vc_row_container="uk-container" el_class="uk-light" css=".vc_custom_1506411320056{padding-bottom: 30px !important;}"][vc_column_inner width="1/3"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-credit-card" title="Book & pay"][/vc_column_inner][vc_column_inner width="1/3"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-car" title="Receive & Enjoy"][/vc_column_inner][vc_column_inner width="1/3"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-smile-o" title="Car return"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);