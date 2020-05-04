<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAPO_metaboxes' ) ){

	class OVAPO_metaboxes{

		public function __construct(){

			$this->require_metabox();

			// add_action( 'add_meta_boxes', array( $this , 'OVAPO_add_metabox' ) );

			add_action( 'save_post', array( $this , 'OVAPO_save_metabox' ) );

			/* Save */
			add_action( 'ovapo_update_meta_portfolio', array( 'OVAPO_metaboxes_render_portfolio' ,'save' ), 10, 2 );
		}

		public function require_metabox(){

			require_once( OVAPO_PLUGIN_PATH.'admin/meta-boxes/ovapo-metaboxes-portfolio.php' );

		}

		function OVAPO_add_metabox() {

			add_meta_box( 'ovapo-metabox-settings-portfolio',
				'Portfolio',
				array('OVAPO_metaboxes_render_portfolio', 'render'),
				'portfolio',
				'normal',
				'high'
			);

		}

		function OVAPO_save_metabox($post_id) {

			if ( empty( $_POST ) && defined( 'DOING_AJAX' ) && DOING_AJAX ) return;

			if( !isset( $_POST['ovapo_nonce'] ) || !wp_verify_nonce( $_POST['ovapo_nonce'], 'ovapo_nonce' ) ) return;

			do_action( 'ovapo_update_meta_portfolio', $post_id, $_POST );
			
		}
	}

	new OVAPO_metaboxes();

}
?>