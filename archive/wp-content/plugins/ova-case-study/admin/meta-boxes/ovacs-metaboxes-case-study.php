<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVACS_metaboxes_render_case_study' ) ){

	class OVACS_metaboxes_render_case_study{

		public static function render(){

			require_once( OVACS_PLUGIN_PATH. '/admin/views/ovacs-metabox-case-study.php' );

		}

		public static function save($post_id, $post_data){
			
			if( empty($post_data) ) exit();
			
			foreach ($post_data as $key => $value) {
				
				update_post_meta( $post_id, $key, $value );
			}
		}
	}
}
?>