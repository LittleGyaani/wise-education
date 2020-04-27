<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$html = $css = $data = '';
$text1_css = $text1_cls = $text2_css = $text2_cls = '';

extract( shortcode_atts( array(
	'animation' => '',
	'animation_effect' => 'fadeInUp',
	'animation_duration' => '0.75s',
	'animation_delay' => '0.3s',
	'alignment' => 'text-center',
    'text1' => '',
    'text1_color' => '',
    'text1_width' => '',
    'text2' => '',
    'text2_color' => '',
    'text2_width' => '',
	'text1_font_family' => 'Default',
	'text1_font_weight' => 'Default',
	'text1_font_size' => '',
	'text1_line_height' => '',
	'text2_font_family' => 'Default',
	'text2_font_weight' => 'Default',
	'text2_font_size' => '',
	'text2_line_height' => '',
	'text1_bottom_margin' => '',
), $atts ) );

$text1_width = intval( $text1_width );
$text2_width = intval( $text2_width );
$text1_font_size = intval( $text1_font_size );
$text1_line_height = intval( $text1_line_height );
$text2_font_size = intval( $text2_font_size );
$text2_line_height = intval( $text2_line_height );
$text1_bottom_margin = intval( $text1_bottom_margin );

$cls = $alignment;

if ( $text1_font_weight != 'Default' ) $text1_css .= 'font-weight:'. $text1_font_weight .';';
if ( $text1_color == '#f35c27' ) { $text1_cls .= ' accent';
} else { if ( $text1_color ) $text1_css .= 'color:'. $text1_color .';'; }
if ( $text1_font_size ) $text1_css .= 'font-size:'. $text1_font_size .'px;';
if ( $text1_width ) {
	$text1_css .= 'max-width:'. $text1_width .'px;';
	if ( $alignment == 'text-center' ) $text1_css .= 'margin-left: auto; margin-right: auto;';
}
if ( $text1_line_height ) $text1_css .= 'line-height:'. $text1_line_height .'px;';
if ( $text1_bottom_margin ) $text1_css .= 'margin-bottom:'. $text1_bottom_margin .'px;';
if ( $text1_font_family != 'Default' ) {
	bauer_enqueue_google_font( $text1_font_family );
	$text1_css .= 'font-family:'. $text1_font_family .';';
}

if ( $text2_font_weight != 'Default' ) $text2_css .= 'font-weight:'. $text2_font_weight .';';
if ( $text2_color == '#f35c27' ) { $text2_cls .= ' accent';
} else { if ( $text2_color ) $text2_css .= 'color:'. $text2_color .';'; }
if ( $text2_font_size ) $text2_css .= 'font-size:'. $text2_font_size .'px;';
if ( $text2_line_height ) $text2_css .= 'line-height:'. $text2_line_height .'px;';
if ( $text2_width ) {
	$text2_css .= 'max-width:'. $text2_width .'px;';
	if ( $alignment == 'text-center' ) $text2_css .= 'margin-left: auto; margin-right: auto;';
}
if ( $text2_font_family != 'Default' ) {
	bauer_enqueue_google_font( $text2_font_family );
	$text2_css .= 'font-family:'. $text2_font_family .';';
}

if ( $text1 ) $html .= sprintf(
	'<div class="group-1 %3$s" style="%2$s">
		%1$s
	</div>',
	$text1,
	$text1_css,
	$text1_cls
);

if ( $text2 ) $html .= sprintf(
	'<div class="group-2 %3$s" style="%2$s">
		%1$s
	</div>',
	$text2,
	$text2_css,
	$text2_cls
);


if ( $animation ) {
	$cls .= ' wow '. $animation_effect;
	$data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

printf(
	'<div class="bauer-text-group clearfix %2$s" %3$s style="%4$s">%1$s</div>',
	$html,
	$cls,
	$data,
	$css
);