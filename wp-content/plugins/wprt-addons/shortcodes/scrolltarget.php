<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = '';

extract( shortcode_atts( array(
	'id_target' => '',
	'color' => '',
	'size' => ''
), $atts ) );

$size = intval( $size );

if ( $color ) $css .= 'color:'. $color .';';
if ( $size ) $css .= 'font-size:'. $size .'px;';

if ( $id_target ) {
	printf(
		'<div class="bauer-scroll-target">
			<a href="#%1$s" style="%2$s">
			</a>
		</div>',
		$id_target,
		$css
	);
}

