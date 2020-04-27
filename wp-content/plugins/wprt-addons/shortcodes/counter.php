<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $data = $icon_cls = $css1 = $css2 = $icon_css = $heading_css = $number_css = $suffix_cls = $prefix_cls = '';
$suffix_css = $prefix_css = $html = $icon_html = $heading_html = $number_html = $number_cls = '';

extract( shortcode_atts( array(
	'animation' => '',
	'animation_effect' => 'fadeInUp',
	'animation_duration' => '0.75s',
	'animation_delay' => '0.3s',
	'style' => 'style-1',
	'alignment' => '',
	'left_width' => '50',
	'right_width' => '50',
	'number_tag' => 'h3',
	'number' => '',
	'number_color' => '',
	'number_prefix' => '',
	'prefix_color' => '',
	'number_suffix' => '',
	'suffix_color' => '',
	'time' => '5000',
	'heading_tag' => 'div',
    'heading' => '',
    'heading_color' => '',
    'heading_max_width' => '',
	'icon_type' => '',
	'icon' => '',
	'icon_color' => '',
	'icon_font_size' => '',
	'icon_line_height' => '',
	'number_font_family' => 'Default',
	'number_font_weight' => 'Default',
	'number_font_size' => '',
	'number_line_height' => '',
	'number_letter_spacing' => '',
	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_font_size' => '',
	'heading_line_height' => '',
	'heading_letter_spacing' => '',
	'number_top_margin' => '',
	'number_bottom_margin' => '',
	'heading_top_margin' => '',
	'heading_bottom_margin' => '',
	'icon_top_margin' => '',
	'icon_right_margin' => '',
	'number_right_margin' => ''
), $atts ) );

$heading_max_width = intval( $heading_max_width );
$icon_font_size = intval( $icon_font_size );
$icon_line_height = intval( $icon_line_height );
$icon_top_margin = intval( $icon_top_margin );
$icon_right_margin = intval( $icon_right_margin );
$number_right_margin = intval( $number_right_margin );

$heading_font_size = intval( $heading_font_size );
$heading_line_height = intval( $heading_line_height );
$heading_letter_spacing = intval( $heading_letter_spacing );
$number_font_size = intval( $number_font_size );
$number_line_height = intval( $number_line_height );
$number_letter_spacing = intval( $number_letter_spacing );

$heading_top_margin = intval( $heading_top_margin );
$heading_bottom_margin = intval( $heading_bottom_margin );
$number_top_margin = intval( $number_top_margin );
$number_bottom_margin = intval( $number_bottom_margin );

$cls = $style .' '. $alignment;

if ( $number_color == '#f35c27' ) {
	$number_cls .= 'accent';
} else {
	if ( $number_color ) $number_css .= 'color:'. $number_color .';';
}

if ( $prefix_color == '#f35c27' ) {
	$prefix_cls .= 'accent';
} else {
	if ( $prefix_color ) $prefix_css .= 'color:'. $prefix_color .';';
}

if ( $suffix_color == '#f35c27' ) {
	$suffix_cls .= 'accent';
} else {
	if ( $suffix_color ) $suffix_css .= 'color:'. $suffix_color .';';
}

if ( $number_font_weight != 'Default' ) $number_css .= 'font-weight:'. $number_font_weight .';';
if ( $number_font_size ) $number_css .= 'font-size:'. $number_font_size .'px;';
if ( $number_line_height ) $number_css .= 'line-height:'. $number_line_height .'px;';
if ( $number_letter_spacing ) $number_css .= 'letter-spacing:'. $number_letter_spacing .'px;';
if ( $number_top_margin ) $number_css .= 'margin-top:'. $number_top_margin .'px;';
if ( $number_right_margin ) $number_css .= 'margin-right:'. $number_right_margin .'px;';
if ( $number_bottom_margin ) $number_css .= 'margin-bottom:'. $number_bottom_margin .'px;';
if ( $number_font_family != 'Default' ) {
	bauer_enqueue_google_font( $number_font_family );
	$number_css .= 'font-family:'. $number_font_family .';';
}

if ( $heading_font_weight != 'Default' ) $heading_css .= 'font-weight:'. $heading_font_weight .';';
if ( $heading_color ) $heading_css .= 'color:'. $heading_color .';';
if ( $heading_max_width ) $heading_css .= 'max-width:'. $heading_max_width .'px;';
if ( $heading_font_size ) $heading_css .= 'font-size:'. $heading_font_size .'px;';
if ( $heading_line_height ) $heading_css .= 'line-height:'. $heading_line_height .'px;';
if ( $heading_letter_spacing ) $heading_css .= 'letter-spacing:'. $heading_letter_spacing .'px;';
if ( $heading_top_margin ) $heading_css .= 'margin-top:'. $heading_top_margin .'px;';
if ( $heading_bottom_margin ) $heading_css .= 'margin-bottom:'. $heading_bottom_margin .'px;';
if ( $heading_font_family != 'Default' ) {
	bauer_enqueue_google_font( $heading_font_family );
	$heading_css .= 'font-family:'. $heading_font_family .';';
}

if ( ! empty( $number ) )
	wp_enqueue_script( 'bauer-countto' );
	wp_enqueue_script( 'bauer-appear' );
	$number_html .= sprintf(
	'<%12$s class="number-wrap" style="%2$s"><span class="prefix %10$s" style="%3$s">%5$s</span><span class="number %9$s" data-speed="%7$s" data-from="0" data-to="%8$s"> %1$s</span><span class="suffix %11$s" style="%4$s">%6$s</span></%12$s>',
	$number,
	$number_css,
	$prefix_css,
	$suffix_css,
	$number_prefix,
	$number_suffix,
	$time,
	$number,
	$number_cls,
	$prefix_cls,
	$suffix_cls,
	$number_tag
);

if ( $heading ) $heading_html .= sprintf(
	'<%3$s class="heading" style="%2$s">
		%1$s
	</%3$s>',
	$heading,
	$heading_css,
	$heading_tag
);

$icon = bauer_get_icon_class( $atts, 'icon' );
if ( $icon && $icon_type != '' ) {
	vc_icon_element_fonts_enqueue( $icon_type );

	if ( $icon_font_size ) $icon_css .= 'font-size:'. $icon_font_size .'px; line-height: normal;';
	if ( $icon_line_height ) $icon_css .= 'line-height:'. $icon_line_height .'px;';

	if ( $icon_color == '#f35c27' ) { $icon_cls .= ' accent'; }
	else { if ( $icon_color ) $icon_css .= 'color:'. $icon_color .';'; }
	
	if ( $icon_top_margin ) $icon_css .= 'margin-top:'. $icon_top_margin .'px;';
	if ( $icon_right_margin ) $icon_css .= 'margin-right:'. $icon_right_margin .'px;';

	$icon_html = sprintf('<div class="icon %3$s" style="%2$s"><i class="%1$s"></i></div>', $icon, $icon_css, $icon_cls );
}

if ( $left_width ) $css1 .= 'width:'. $left_width .'%';
if ( $right_width ) $css2 .= 'width:'. $right_width .'%';

if ( $style == 'style-1' )
	$html = '<div class="inner"><div class="icon-wrap">'. $icon_html .'</div><div class="text-wrap">'. $number_html . $heading_html .'</div></div>';

if ( $style == 'style-2' )
	$html = '<div class="inner"><div class="left-wrap" style="'. $css1 .'">'. $icon_html .'</div><div class="right-wrap" style="'. $css2 .'">'. $number_html .'</div></div>'. $heading_html;

if ( $style == 'style-3' )
	$html = '<div class="inner"><div class="left-wrap" style="'. $css1 .'">'. $number_html .'</div><div class="right-wrap" style="'. $css2 .'">'. $heading_html .'</div></div>';

if ( $animation ) {
	$cls .= ' wow '. $animation_effect;
	$data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

printf( '<div class="bauer-counter clearfix %2$s" %3$s>%1$s</div>',
	$html,
	$cls,
	$data
);