<?php
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVAPO_admin_menu' ) ){

	class OVAPO_admin_menu{

		public function __construct(){
			$this->init();
		}

		public function init(){
			add_action( 'admin_menu', array( $this, 'OVAPO_register_menu' ) );
		}

		public function OVAPO_register_menu(){

			// Get Options
			
			add_menu_page( 
				__( 'Portfolio', 'ova-portfolio' ), 
				__( 'Portfolio', 'ova-portfolio' ), 
				'edit_posts',
				'ovapo-menu', 
				null,
				'dashicons-portfolio', 
				4
			);

			add_submenu_page( 
				'ovapo-menu', 
				__( 'Add New', 'ova-portfolio' ), 
				__( 'Add New', 'ova-portfolio' ), 
				'administrator',
				'post-new.php?post_type=portfolio'
			);

			add_submenu_page( 
				'ovapo-menu', 
				__( 'Categories', 'ova-portfolio' ), 
				__( 'Categories', 'ova-portfolio' ), 
				'administrator',
				'edit-tags.php?taxonomy=portfolio_category'.'&post_type=portfolio'
			);
			
			add_submenu_page( 
				'ovapo-menu', 
				__( 'Settings', 'ova-portfolio' ),
				__( 'Settings', 'ova-portfolio' ),
				'administrator',
				'ovapo_general_settings',
				array( 'OVAPO_Admin_Settings', 'create_admin_setting_page' )
			);

		}

	}
	new OVAPO_admin_menu();

}