<?php
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVACS_admin_menu' ) ){

	class OVACS_admin_menu{

		public function __construct(){
			$this->init();
		}

		public function init(){
			add_action( 'admin_menu', array( $this, 'OVACS_register_menu' ) );
		}

		public function OVACS_register_menu(){

			// Get Options
			
			add_menu_page( 
				__( 'Case Study', 'ova-case-study' ), 
				__( 'Case Study', 'ova-case-study' ), 
				'edit_posts',
				'ovacs-menu', 
				null,
				'dashicons-calendar', 
				4
			);
			
			add_submenu_page( 
				'ovacs-menu', 
				__( 'Settings', 'ova-case-study' ),
				__( 'Settings', 'ova-case-study' ),
				'administrator',
				'ovacs_general_settings',
				array( 'OVACS_Admin_Settings', 'create_admin_setting_page' )
			);

		}

	}
	new OVACS_admin_menu();

}