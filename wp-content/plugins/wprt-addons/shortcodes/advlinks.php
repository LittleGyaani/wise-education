<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $cls = $data = $inner_cls = $inner_content_css = $content_html = $line_html = $line_css = $line_cls = '';

extract( shortcode_atts( array(
	'alignment' => '',
	'style' => 'style-1',
	'animation' => '',
	'animation_effect' => 'fadeInUp',
	'animation_duration' => '0.75s',
	'animation_delay' => '0.3s',
	'color' => '',
	'link_url' => '',
	'content_font_family' => 'Default',
	'content_font_weight' => 'Default',
	'content_font_size' => '',
), $atts ) );

$inner_cls .= 'link-'. $style;
$cls = $alignment;

$content_font_size = intval( $content_font_size );

if ( $content_font_weight != 'Default' ) $inner_content_css .= 'font-weight:'. $content_font_weight .';';
if ( $content_font_size ) $inner_content_css .= 'font-size:'. $content_font_size .'px;';
if ( $content_font_family != 'Default' ) {
	bauer_enqueue_google_font( $content_font_family );
	$inner_content_css .= 'font-family:'. $content_font_family .';';
}

if ( $color == '#f35c27' ) { $inner_cls .= ' accent'; }
else { if ( $color ) $css .= 'color:'. $color .';'; }

if ( $content )
	$content_html = sprintf(
		'<span class="text" style="%2$s">%1$s</span>',
		$content,
		$inner_content_css
	);

if ( $animation ) {
	$cls .= ' wow '. $animation_effect;
	$data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

if ( $link_url )
	printf(
		'<div class="%3$s"><a class="bauer-links %4$s" href="%2$s" style="%5$s" %6$s>
			%1$s %7$s
		</a></div>',
		$content_html,
		$link_url,
		$cls,
		$inner_cls,
		$css,
		$data,
		$line_html
	);