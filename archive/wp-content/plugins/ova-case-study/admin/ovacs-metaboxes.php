<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVACS_metaboxes' ) ){

	class OVACS_metaboxes{

		public function __construct(){

			$this->require_metabox();

			// add_action( 'add_meta_boxes', array( $this , 'OVACS_add_metabox' ) );

			add_action( 'save_post', array( $this , 'OVACS_save_metabox' ) );

			/* Save */
			add_action( 'ovacs_update_meta_case_study', array( 'OVACS_metaboxes_render_case_study' ,'save' ), 10, 2 );
		}

		public function require_metabox(){

			require_once( OVACS_PLUGIN_PATH.'admin/meta-boxes/ovacs-metaboxes-case-study.php' );

		}

		function OVACS_add_metabox() {

			add_meta_box( 'ovacs-metabox-settings-case-study',
				'Case Study',
				array('OVACS_metaboxes_render_case_study', 'render'),
				'case_study',
				'normal',
				'high'
			);

		}

		function OVACS_save_metabox($post_id) {

			if ( empty( $_POST ) && defined( 'DOING_AJAX' ) && DOING_AJAX ) return;

			if( !isset( $_POST['ovacs_nonce'] ) || !wp_verify_nonce( $_POST['ovacs_nonce'], 'ovacs_nonce' ) ) return;

			do_action( 'ovacs_update_meta_case_study', $post_id, $_POST );
			
		}
	}

	new OVACS_metaboxes();

}
?>