<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVAPO_get_data {
	public function __construct() {

		add_filter( 'OVAPO_portfolio', array( $this, 'OVAPO_portfolio' ), 10, 0 );

	}

	private function OVAPO_query_base( $paged = '', $order = 'ASC', $orderby = 'date' ){

		$args_base = $args_paged = $args_type = $args_orderby = array();

		$args_base = array(
			'post_type'   => 'portfolio',
			'post_status' => 'publish',
			'order'       => $order,
		);

		if( is_tax( 'portfolio_category' ) ||  get_query_var( 'portfolio_category' ) != '' ){
			$args_type = array( 
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_category',
						'field'    => 'slug',
						'terms'    => get_query_var( 'portfolio_category' ),
					)
				)
			);
		}

		$args_paged = ( $paged != '' ) ? array( 'paged' => $paged ) : array();
		
		switch ($orderby) {
			case 'title':
			$args_orderby =  array( 'orderby' => 'title' );
			break;

			case 'ID':
			$args_orderby =  array( 'orderby' => 'ID');
			break;
			
			case 'date':
			$args_orderby =  array( 'orderby' => 'date');
			break;
			
			default:
			break;
		}
		return array_merge_recursive( $args_base, $args_paged, $args_type, $args_orderby );
	}

	public function OVAPO_portfolio(){

		$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$order   = OVAPO_Settings::archive_portfolio_order();
		$orderby = OVAPO_Settings::archive_portfolio_orderby();

		/* Query base */
		$args_basic = $this->OVAPO_query_base( $paged, $order, $orderby );

		$arg = new WP_Query( $args_basic );
		
		return $arg;
	}
}
new OVAPO_get_data();