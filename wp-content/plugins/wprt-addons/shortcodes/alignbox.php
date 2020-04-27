<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = '';

extract( shortcode_atts( array(
    'alignment' => 'text-center',
    'mobi_hide' => '',
), $atts ) );

$cls = $alignment;
if ( $mobi_hide ) $cls .= ' hide-on-mobile';

printf(
	'<div class="bauer-align-box %2$s">%1$s</div>',
	do_shortcode( $content ),
	$cls
);