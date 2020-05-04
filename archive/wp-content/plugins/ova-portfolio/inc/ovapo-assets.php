<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVAPO_Assets' ) ){
	class OVAPO_Assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'ovapo_enqueue_style' ) );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_elementor_portfolio' ) );

		}

		public function ovapo_enqueue_style(){

			// Init Css
			wp_enqueue_style( 'ovapo-style', OVAPO_PLUGIN_URI.'assets/css/frontend/ovapo-style.css', array(), null );

		}

		/* Add JS for elementor */
		public function ova_enqueue_scripts_elementor_portfolio(){
			wp_enqueue_script( 'script-elementor-portfolio', OVAPO_PLUGIN_URI. 'assets/js/script-elementor.js', [ 'jquery' ], false, true );
		}
		
	}
	new OVAPO_Assets();
}