<?php
/*
Plugin Name: OvaTheme Portfolio
Plugin URI: https://themeforest.net/user/ovatheme
Description: OvaTheme Portfolio
Author: Ovatheme
Version: 1.0
Author URI: https://themeforest.net/user/ovatheme/portfolio
Text Domain: ova-portfolio
*/

if ( !defined( 'ABSPATH' ) ) exit();

if (!class_exists('OVAPO')) {
	
	class OVAPO
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
			$this->define( 'OVAPO_PLUGIN_FILE', __FILE__ );
			$this->define( 'OVAPO_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
			$this->define( 'OVAPO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
			load_plugin_textdomain( 'ova-portfolio', false, basename( dirname( __FILE__ ) ) .'/languages' ); 
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
			require_once( OVAPO_PLUGIN_PATH.'inc/ovapo-assets.php' );

			require_once( OVAPO_PLUGIN_PATH.'inc/ovapo-custom-post-type.php' );

			require_once( OVAPO_PLUGIN_PATH.'inc/ovapo-get-data.php' );

			require_once( OVAPO_PLUGIN_PATH.'inc/ovapo-settings.php' );

			require_once( OVAPO_PLUGIN_PATH.'inc/ovapo-templates-loaders.php' );

			require_once( OVAPO_PLUGIN_PATH.'inc/ovapo-core-functions.php' );

			/* admin */
			if( is_admin() ){
				require_once( OVAPO_PLUGIN_PATH.'admin/ovapo-metaboxes.php' );
				require_once( OVAPO_PLUGIN_PATH.'admin/ovapo-admin.php' );
			}
		}

		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include OVAPO_PLUGIN_PATH.'elementor/ovapo-register-elementor.php';
			}
		}

		public function rewirte_slug(){

			add_filter( 'register_post_type_args', array($this, 'ovapo_change_post_types_slug' ), 10, 2 );

		}

		public function ovapo_change_post_types_slug( $args, $post_type ) {
			
			/* Case Styudy Slug */
			$portfolio_slug = 'portfolio';
			$portfolio_rewrite_slug = OVAPO_Settings::ovapo_portfolio_post_type_rewrite_slug();
			if ( $portfolio_slug === $post_type && $portfolio_slug != $portfolio_rewrite_slug && $portfolio_rewrite_slug != '' ) {
				$args['rewrite']['slug'] = $portfolio_rewrite_slug;
			}

			return $args;
		}

	}
}

function OVAPO() {
	return OVAPO::instance();
}

$GLOBALS['OVAPO'] = OVAPO();