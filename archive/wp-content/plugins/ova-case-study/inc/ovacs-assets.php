<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVACS_Assets' ) ){
	class OVACS_Assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'ovacs_enqueue_style' ) );

		}

		public function ovacs_enqueue_style(){

			// Init Css
			wp_enqueue_style( 'ovacs-style', OVACS_PLUGIN_URI.'assets/css/frontend/ovacs-style.css', array(), null );

			// Init JS
			wp_enqueue_script( 'ovacs-script', OVACS_PLUGIN_URI.'assets/js/frontend/ovacs-script.js', array('jquery'), false, true );

		}
	}
	new OVACS_Assets();
}