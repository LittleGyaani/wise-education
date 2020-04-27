<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $cls = $text_css = $name_css = $position_css = $thumb_css = $name_wrap_css = $name_pos_css = '';
$inner_css = $inner_html = $image_html = $text_html = $name_html = $position_html = '';

extract( shortcode_atts( array(
	'style' => 'style-1',
	'image' => '',
	'image_width' => '',
	'thumb_style' => 'simple',
	'text_color' => '',
	'wrap_padding' => '',
	'wrap_rounded' => '',
	'name' => 'JOHN ROE',
	'name_color' => '',
	'stars' => '',
	'position' => 'Sale Manager',
	'position_color' => '',
	'text_font_family' => 'Default',
	'text_font_weight' => 'Default',
	'text_font_size' => '',
	'text_font_style' => 'normal',
	'text_line_height' => '',
	'name_font_family' => 'Default',
	'name_font_weight' => 'Default',
	'name_font_size' => '',
	'name_line_height' => '',
	'position_font_family' => 'Default',
	'position_font_weight' => 'Default',
	'position_font_size' => '',
	'position_line_height' => '',
	'image_bottom_margin' => '',
	'name_bottom_margin' => '',
), $atts ) );
$content = wpb_js_remove_wpautop($content, true);

$text_line_height = intval( $text_line_height );
$name_line_height = intval( $name_line_height );
$position_line_height = intval( $position_line_height );

$text_font_size = intval( $text_font_size );
$name_font_size = intval( $name_font_size );
$position_font_size = intval( $position_font_size );

$wrap_rounded = intval( $wrap_rounded );
$image_width = intval( $image_width );
$image_bottom_margin = intval( $image_bottom_margin );
$name_bottom_margin = intval( $name_bottom_margin );

$cls = $style .' '. $thumb_style;
if ( $stars ) $cls .= ' has-stars';

$text_css .= 'font-style:'. $text_font_style .';';
if ( $text_font_weight != 'Default' ) $text_css .= 'font-weight:'. $text_font_weight .';';
if ( $text_color ) $text_css .= 'color: '. $text_color .';';
if ( $text_font_size ) $text_css .= 'font-size:'. $text_font_size .'px;';
if ( $text_line_height ) $text_css .= 'line-height:'. $text_line_height .'px;';
if ( $text_font_family != 'Default' ) {
    bauer_enqueue_google_font( $text_font_family );
    $text_css .= 'font-family:'. $text_font_family .';';
}

if ( $name_font_weight != 'Default' ) $name_css .= 'font-weight:'. $name_font_weight .';';
if ( $name_color ) $name_css .= 'color: '. $name_color .';';
if ( $name_font_size ) $name_css .= 'font-size:'. $name_font_size .'px;';
if ( $name_line_height ) $name_css .= 'line-height:'. $name_line_height .'px;';
if ( $name_font_family != 'Default' ) {
    bauer_enqueue_google_font( $name_font_family );
    $name_css .= 'font-family:'. $name_font_family .';';
}

if ( $position_font_weight != 'Default' ) $position_css .= 'font-weight:'. $position_font_weight .';';
if ( $position_color ) $position_css .= 'color: '. $position_color .';';
if ( $position_font_size ) $position_css .= 'font-size:'. $position_font_size .'px;';
if ( $position_line_height ) $position_css .= 'line-height:'. $position_line_height .'px;';
if ( $position_font_family != 'Default' ) {
    bauer_enqueue_google_font( $position_font_family );
    $position_css .= 'font-family:'. $position_font_family .';';
}

if ( $thumb_style == 'simple' ) {
	if ( $image_width ) $thumb_css .= 'max-width:'. $image_width .'px;';
	if ( $image_bottom_margin ) $thumb_css .= 'margin-bottom:'. $image_bottom_margin .'px;';
} 

if ( $thumb_style == 'top' ) {
	if ( $image_width ) {
		$thumb_css .= 'max-width:'. $image_width .'px;';
		$thumb_css .= 'margin-left:-'. ( $image_width / 2 ) .'px;margin-top:-'. ( $image_width / 2 ) .'px;';
		$css .= 'padding-top:'. ( $image_width / 2 ) .'px;';
	}
}












if ( $image ) {
    $image_html .= sprintf(
        '<div class="thumb" style="%2$s">%1$s</div>',
         wp_get_attachment_image( $image, 'full' ), $thumb_css
    );
}

if ( $content )
$text_html .= sprintf(
	'<blockquote class="text" style="%2$s">%1$s</blockquote>',
	$content,
	$text_css
);

if ( $wrap_padding ) $inner_css .= 'padding:'. $wrap_padding .';';
if ( $wrap_rounded ) $inner_css .= 'border-radius:'. $wrap_rounded .'px;';

if ( $name_bottom_margin ) $name_wrap_css .= 'margin-bottom:'. $name_bottom_margin .'px;';

if ( $name || $position ) {
	if ( $name ) {
	    $name_html .= sprintf(
	    '<h6 class="name" style="%2$s"><span>%1$s</span></h6>',
	    $name, $name_css
	    );
	}

	if ( $position ) {
	    $position_html .= sprintf(
	    '<span class="position" style="%2$s">%1$s</span>',
	    $position, $position_css
	    );
	}
}

$inner_html .= sprintf(
    '<div class="inner" style="%6$s">
	    <div class="image-wrap">
	    	%1$s
	    </div>
	    <div class="name-wrap" style="%7$s">
	    	<div class="name-pos" style="%5$s">%3$s %4$s</div>
	    </div>
	    <div class="text-wrap">
	    %2$s
	    </div>
    </div>',
    $image_html, $text_html, $name_html, $position_html, $name_pos_css, $inner_css, $name_wrap_css
);

printf(
    '<div class="bauer-testimonials light clearfix %2$s" style="%3$s">
        %1$s
    </div>', 
    $inner_html,
    $cls,
    $css
);