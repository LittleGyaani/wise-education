<?php
/*
Plugin Name: Ovatheme Case Study
Plugin URI: https://themeforest.net/user/ovatheme
Description: Ovatheme Case Study
Author: Ovatheme
Version: 1.0
Author URI: https://themeforest.net/user/ovatheme/portfolio
Text Domain: ova-case-study
*/

if ( !defined( 'ABSPATH' ) ) exit();

if (!class_exists('OVACS')) {
	
	class OVACS
	{
		static $_instance = null;

		function __construct()
		{
			$this -> define_constants();
			$this -> includes();
			$this -> supports();
			$this -> rewirte_slug();
		}

		function define_constants(){
			$this->define( 'OVACS_PLUGIN_FILE', __FILE__ );
			$this->define( 'OVACS_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
			$this->define( 'OVACS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
			load_plugin_textdomain( 'ova-case-study', false, basename( dirname( __FILE__ ) ) .'/languages' ); 
		}

		function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		public static function instance() {
			if ( !empty( self::$_instance ) ) {
				return self::$_instance;
			}
			return self::$_instance = new self();
		}

		function includes() {

			/* inc */
			require_once( OVACS_PLUGIN_PATH.'inc/ovacs-assets.php' );

			require_once( OVACS_PLUGIN_PATH.'inc/ovacs-custom-post-type.php' );

			require_once( OVACS_PLUGIN_PATH.'inc/ovacs-get-data.php' );

			require_once( OVACS_PLUGIN_PATH.'inc/ovacs-settings.php' );

			require_once( OVACS_PLUGIN_PATH.'inc/ovacs-templates-loaders.php' );

			require_once( OVACS_PLUGIN_PATH.'inc/ovacs-core-functions.php' );

			/* admin */
			if( is_admin() ){
				require_once( OVACS_PLUGIN_PATH.'admin/ovacs-metaboxes.php' );
				require_once( OVACS_PLUGIN_PATH.'admin/ovacs-admin.php' );
			}
		}

		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include OVACS_PLUGIN_PATH.'elementor/ovacs-register-elementor.php';
			}
		}

		public function rewirte_slug(){

			add_filter( 'register_post_type_args', array($this, 'ovacs_change_post_types_slug' ), 10, 2 );

		}

		public function ovacs_change_post_types_slug( $args, $post_type ) {
			
			/* Case Styudy Slug */
			$case_study_slug = 'case_study';
			$exhibition_rewrite_slug = OVACS_Settings::ovacs_case_study_post_type_rewrite_slug();
			if ( $case_study_slug === $post_type && $case_study_slug != $exhibition_rewrite_slug && $exhibition_rewrite_slug != '' ) {
				$args['rewrite']['slug'] = $exhibition_rewrite_slug;
			}

			return $args;
		}

	}
}

function OVACS() {
	return OVACS::instance();
}

$GLOBALS['OVACS'] = OVACS();