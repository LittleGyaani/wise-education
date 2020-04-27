<?php 
/*
Plugin Name: WPRT Addons 
Plugin URI: http://rollthemes.com/plugins/
Description: Extend Visual Composer with Advanced Shortcodes.
Version: 3.7.9
Author: RollThemes
Author URI: http://rollthemes.com
*/

/**
 * Plugin Name: GaviasFramework
 * Description: Open Setting, Post Type, Shortcode ... for theme 
 * Version: 1.0.0
 * Author: Gaviasthemes Team
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'loadCssAndJs', 999999 );
function loadCssAndJs() {
	wp_enqueue_style( 'bauer-owlcarousel', plugins_url('assets/owl.carousel.css', __FILE__), array(), '2.2.1' );
	wp_register_script( 'bauer-owlcarousel', plugins_url('assets/owl.carousel.min.js', __FILE__), array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'bauer-imagesloaded', plugins_url('assets/imagesloaded.js', __FILE__), array('jquery'), '4.1.3', true );
	wp_register_script( 'bauer-bxslider', plugins_url('assets/bxslider.js', __FILE__), array('jquery'), '4.1.0', true );
	wp_enqueue_style( 'bauer-cubeportfolio', plugins_url('assets/cubeportfolio.min.css', __FILE__), array(), '3.4.0' );
	wp_register_script( 'bauer-cubeportfolio', plugins_url('assets/cubeportfolio.min.js', __FILE__), array('jquery'), '3.4.0', true );
	wp_register_script( 'bauer-countto', plugins_url('assets/countto.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bauer-equalize', plugins_url('assets/equalize.min.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'bauer-magnificpopup', plugins_url('assets/magnific.popup.css', __FILE__), array(), '1.0.0' );
	wp_enqueue_script( 'bauer-magnificpopup', plugins_url('assets/magnific.popup.min.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'bauer-vegas', plugins_url('assets/vegas.css', __FILE__), array(), '2.3.1' );
	wp_register_script( 'bauer-vegas', plugins_url('assets/vegas.js', __FILE__), array('jquery'), '2.3.1', true );
	wp_enqueue_style( 'bauer-ytplayer', plugins_url('assets/ytplayer.css', __FILE__), array(), '3.0.2' );
	wp_register_script( 'bauer-ytplayer', plugins_url('assets/ytplayer.js', __FILE__), array('jquery'), '3.0.2', true );
	wp_register_script( 'bauer-fittext', plugins_url('assets/fittext.js', __FILE__), array('jquery'), '1.1.0', true );
	wp_register_script( 'bauer-flowtype', plugins_url('assets/flowtype.js', __FILE__), array('jquery'), '1.3.0', true );
	wp_register_script( 'bauer-typed', plugins_url('assets/typed.js', __FILE__), array('jquery'), '1.1.0', true );
	wp_register_script( 'bauer-countdown', plugins_url('assets/countdown.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_register_script( 'bauer-appear', plugins_url('assets/appear.js', __FILE__), array('jquery'), '0.3.6', true );
	wp_enqueue_script( 'bauer-wow', plugins_url('assets/wow.min.js', __FILE__), array('jquery'), '0.3.6', true );
	wp_enqueue_script( 'bauer-parallaxscroll', plugins_url('assets/parallax-scroll.js', __FILE__), array('jquery'), '0.2.6', true );
	wp_enqueue_script( 'bauer-shortcode', plugins_url('assets/shortcodes.js', __FILE__), array('jquery'), '1.0', true );
	wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js', array(), 'v3');
}

// Add image sizes
add_action( 'after_setup_theme', 'add_image_sizes' );
function add_image_sizes() {
	add_image_size( 'bauer-square', 600, 600, true );
	add_image_size( 'bauer-rectangle', 600, 500, true );
	add_image_size( 'bauer-rectangle1', 425, 570, true ); //archi, interior design
	add_image_size( 'bauer-rectangle2', 450, 528, true ); //handyman, construction
	add_image_size( 'bauer-rectangle3', 470, 430, true ); //construction2
	add_image_size( 'bauer-rectangle4', 480, 600, true ); //factory, main
	add_image_size( 'bauer-medium-auto', 870, 9999 );
	add_image_size( 'bauer-small-auto', 640, 9999 );
	add_image_size( 'bauer-xsmall-auto', 480, 9999 );
}

// Map shortcodes to Visual Composer
require_once __DIR__ . '/vc-map.php';

// Include shortcodes files for Visual Composer
foreach ( glob( plugin_dir_path( __FILE__ ) . '/shortcodes/*.php' ) as $file ) {
	$filename = basename( $file );
	$tagname  = str_replace( '-', '_', pathinfo( $file, PATHINFO_FILENAME ) );

	add_shortcode( $tagname, function( $atts, $content = '' ) use( $file, $filename ) {
		ob_start();
		include $file;
		return ob_get_clean();
	} );
}

// Add user contact methods
function bauer_socials_user_contact_methods() {
	$user_contact['user_position']   = esc_html( 'Position' );
	
	$user_contact['user_facebook']   = esc_html( 'Facebook URL' );
	$user_contact['user_twitter'] = esc_html( 'Twitter URL' );
	$user_contact['user_google_plus'] = esc_html( 'Google+ URL' );
	$user_contact['user_linkedin'] = esc_html( 'LinkedIn URL' );
	$user_contact['user_pinterest'] = esc_html( 'Pinterest URL' );
	$user_contact['user_instagram'] = esc_html( 'Instagram URL' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'bauer_socials_user_contact_methods' );

// Google API
require_once __DIR__ . '/google-api.php';

// Custom Post Type
require_once __DIR__ . '/cpt/init.php';

// Widgets
require_once __DIR__ . '/widgets/init.php';

// Advanced Tabs
require_once __DIR__ . '/shortcodes/advtabs.php';