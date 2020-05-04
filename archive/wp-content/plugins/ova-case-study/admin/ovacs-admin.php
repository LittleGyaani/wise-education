<?php 

if( !defined( 'ABSPATH' ) ) exit();


if( !class_exists( 'OVACS_admin' ) ){

	/**
	 * Make Admin Class
	 */
	class OVACS_admin{
		public static $custom_meta_fields = array();

		/**
		 * Construct Admin
		 */
		public function __construct(){
			$this->init();

		}

		public function init(){
			require_once( OVACS_PLUGIN_PATH. '/admin/ovacs-admin-menu.php' );
			require_once( OVACS_PLUGIN_PATH. '/admin/ovacs-admin-assets.php' );
			require_once( OVACS_PLUGIN_PATH. '/admin/ovacs-admin-settings.php' );
		}
	}
	new OVACS_admin();

}