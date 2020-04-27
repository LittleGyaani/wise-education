<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $css = $image_html = $new_tab = '';

extract( shortcode_atts( array(
	'alignment' => 'text-center',
	'left_padding' => '',
	'top_padding' => '',
	'parallax_x' => '',
	'parallax_y' => '',
	'width' => '',
	'margin' => '',
), $atts ) );

$cls .= $alignment;
$px = intval( $parallax_x );
$py = intval( $parallax_y );

if ( $width ) $css .= 'max-width:'. $width .';';
if ( ! empty( $left_padding ) ) $css .= 'left:'. $left_padding .';';
if ( ! empty( $top_padding ) ) $css .= 'top:'. $top_padding .';';
if ( ! empty( $margin ) ) $css .= 'margin:'. $margin .';';

printf(
	'<div class="bauer-parallax-box %2$s" style="%5$s"><div style="display: inline-block;" data-parallax=\'{"x" : %3$s, "y" : %4$s}\'>%1$s</div></div>',
	do_shortcode($content),
	$cls,
	$px,
	$py,
	$css
);