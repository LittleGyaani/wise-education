<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

extract( shortcode_atts( array(
    'type' => 'accordions',
), $atts ) );

printf( '
	<div class="bauer-accordions %2$s">%1$s</div>',
	do_shortcode($content),
	$type
);