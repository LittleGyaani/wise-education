<?php 
defined( 'ABSPATH' ) || exit();
global $post;
if( !class_exists( 'OVACS_Admin_Assets' ) ){
	class OVACS_Admin_Assets{

		public function __construct(){
			add_action( 'admin_footer', array( $this, 'enqueue_scripts' ), 10, 2 );
		}

		public function enqueue_scripts(){

			/* Init Css Admin */
			wp_enqueue_style( 'ovacs-admin-style', OVACS_PLUGIN_URI.'assets/css/admin/ovacs-admin-style.css' );

			/* Init JS Admin */
			wp_enqueue_script( 'ovacs-admin-script', OVACS_PLUGIN_URI.'assets/js/admin/ovacs-admin-script.js', array('jquery'), false, true );

			/* Jquery UI */
			wp_enqueue_style( 'jquery-ui', OVACS_PLUGIN_URI.'assets/libs/jquery-ui/jquery-ui.min.css' );
			wp_enqueue_script( 'jquery-ui-tabs' );

		}
	}
	new OVACS_Admin_Assets();
}