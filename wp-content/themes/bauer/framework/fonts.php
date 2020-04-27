<?php
/**
 * Font functions
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// List of standard fonts
function bauer_standard_fonts() {
	return array( 'Arial, Helvetica, sans-serif', 'Arial Black, Gadget, sans-serif', 'Bookman Old Style, serif', 'Comic Sans MS, cursive', 'Courier, monospace', 'Georgia, serif', 'Garamond, serif', 'Impact, Charcoal, sans-serif', 'Lucida Console, Monaco, monospace', 'Lucida Sans Unicode, Lucida Grande, sans-serif', 'MS Sans Serif, Geneva, sans-serif', 'MS Serif, New York, sans-serif', 'Palatino Linotype, Book Antiqua, Palatino, serif', 'Tahoma, Geneva, sans-serif', 'Times New Roman, Times, serif', 'Trebuchet MS, Helvetica, sans-serif', 'Verdana, Geneva, sans-serif', 'Paratina Linotype', 'Trebuchet MS' );
}

// List of useful Google fonts
function bauer_google_fonts_array() {
	return array( 'Montserrat', 'Roboto', 'Open Sans', 'Lato', 'Raleway', 'Source Sans Pro', 'Roboto Slab', 'PT Sans', 'Poppins', 'Noto Sans', 'Ubuntu', 'PT Serif', 'Nunito', 'Titillium Web', 'Noto Serif', 'Rubik', 'Oxygen', 'Cabin', 'Nunito Sans', 'Josefin Sans', 'Varela Round', 'Playfair Display', 'Sniglet', 'Dosis', 'Questrial', 'Exo', 'Comfortaa', 'Teko', 'Vollcorn', 'Rajdhani', 'Tinos', 'Cookie', 'Orbitron', 'Martel', 'IBM Plex Serif', 'Volkhov', 'Marck Script', 'Frank Ruhl Libre', 'Josefin Slab', 'Montserrat Alternatives', 'Sawarabi Mincho', 'Yantramanav', 'Boogaloo', 'Ruda', 'Changa', 'Audiowide', 'Enriqueta', 'Jura', 'Aleo', 'Gentium Book Basic' );
}

// Enqueues a Google Font
function bauer_enqueue_google_font( $font ) {

	// Get list of all Google Fonts
	$google_fonts = bauer_google_fonts_array();

	// Make sure font is in our list of fonts
	if ( ! $google_fonts || ! in_array( $font, $google_fonts ) ) {
		return;
	}

	// Sanitize handle
	$handle = trim( $font );
	$handle = strtolower( $handle );
	$handle = str_replace( ' ', '-', $handle );

	// Sanitize font name
	$font = trim( $font );
	$font = str_replace( ' ', '+', $font );

	// Subset
	$subset = bauer_get_mod( 'google_font_subsets', 'latin' );
	$subset = $subset ? $subset : 'latin';
	$subset = '&amp;subset='. $subset;

	// Weights
	$weights = array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );
	$weights = apply_filters( 'bauer_google_font_enqueue_weights', $weights, $font );
	$italics = apply_filters( 'bauer_google_font_enqueue_italics', true );

	// Main URL
	$url = bauer_get_google_fonts_url() .'/css?family='. str_replace(' ', '%20', $font ) .':';

	// Add weights to URL
	if ( ! empty( $weights ) ) {
		$url .= implode( ',' , $weights );
		$italic_weights = array();
		if ( $italics ) {
			foreach ( $weights as $weight ) {
				$italic_weights[] = $weight .'italic';
			}
			$url .= implode( ',' , $italic_weights );
		}
	}

	// Add subset to URL
	$url .= $subset;

	// Enqueue style
	wp_enqueue_style( 'bauer-google-font-'. $handle, $url, false, false, 'all' );
}