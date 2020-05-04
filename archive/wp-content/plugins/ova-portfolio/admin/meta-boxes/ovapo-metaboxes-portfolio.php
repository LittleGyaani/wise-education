<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAPO_metaboxes_render_portfolio' ) ){

	class OVAPO_metaboxes_render_portfolio{

		public static function render(){

			require_once( OVAPO_PLUGIN_PATH. '/admin/views/ovapo-metabox-portfolio.php' );

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