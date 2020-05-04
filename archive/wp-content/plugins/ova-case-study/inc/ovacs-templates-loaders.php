<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVACS_templates_loader {
	
	/**
	 * The Constructor
	 */
	public function __construct() {

		add_filter( 'template_include', array( $this, 'template_loader' ) );
		
	}

	public function template_loader( $template ) {

		$post_type = isset($_REQUEST['post_type'] ) ? esc_html( $_REQUEST['post_type'] ) : get_post_type();

		// Is Case Study Post Type
		if(  $post_type == 'case_study' ){

			if ( is_post_type_archive( 'case_study' ) || is_tax('case_study') ) { 

				ovacs_get_template( 'archive-case-study.php' );

				return false;

			} else if ( is_single() ) {

				ovacs_get_template( 'single-case-study.php' );
				return false;

			}
		}

		if ( $post_type !== 'case_study'){
			return $template;
		}
	}
}

new OVACS_templates_loader();