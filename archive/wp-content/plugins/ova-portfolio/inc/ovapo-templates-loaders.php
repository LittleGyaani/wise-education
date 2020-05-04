<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVAPO_templates_loader {
	
	/**
	 * The Constructor
	 */
	public function __construct() {

		add_filter( 'template_include', array( $this, 'template_loader' ) );
		
	}

	public function template_loader( $template ) {

		$post_type = isset($_REQUEST['post_type'] ) ? esc_html( $_REQUEST['post_type'] ) : get_post_type();

		if( is_tax( 'portfolio_category' ) || get_query_var( 'portfolio_category' ) != ''  ){

			$paged = get_query_var('paged') ? get_query_var('paged') : '1';

			query_posts( '&portfolio_category='.get_query_var( 'portfolio_category' ).'&paged=' . $paged );

			ovapo_get_template( 'archive-portfolio_category.php' );
			
			return false;
		}

		if(  $post_type == 'portfolio' ){

			if ( is_post_type_archive( 'portfolio' ) || is_tax('portfolio') ) { 

				ovapo_get_template( 'archive-portfolio_category.php' );

				return false;

			} else if ( is_single() ) {

				ovapo_get_template( 'single-portfolio.php' );
				return false;

			}
		}

		if ( $post_type !== 'portfolio'){
			return $template;
		}
	}
}

new OVAPO_templates_loader();
