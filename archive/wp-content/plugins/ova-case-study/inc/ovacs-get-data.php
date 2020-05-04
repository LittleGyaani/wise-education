<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVACS_get_data {
	public function __construct() {

		add_filter( 'OVACS_case_study', array( $this, 'OVACS_case_study' ), 10, 0 );

	}

	private function OVACS_query_base( $paged = '', $order = 'ASC', $orderby = 'date' ){

		$args_base = $args_paged  = $args_orderby = array();

		$args_base = array(
			'post_type'   => 'case_study',
			'post_status' => 'publish',
			'order'       => $order,
		);

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
		return array_merge_recursive( $args_base, $args_paged, $args_orderby );
	}

	public function OVACS_case_study(){

		$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$order   = OVACS_Settings::archive_case_study_order();
		$orderby = OVACS_Settings::archive_case_study_orderby();

		/* Query base */
		$args_basic = $this->OVACS_query_base( $paged, $order, $orderby );

		$arg = new WP_Query( $args_basic );
		
		return $arg;
	}
}
new OVACS_get_data();