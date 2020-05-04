<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVAPO_Settings {
	
	public static function ovapo_portfolio_post_type_rewrite_slug(){
		$ops = get_option('ovapo_options');
		return isset( $ops['ovapo_portfolio_post_type_rewrite_slug'] ) ? $ops['ovapo_portfolio_post_type_rewrite_slug'] : 'portfolio';
	}
	
	public static function archive_portfolio_orderby(){
		$ops = get_option('ovapo_options');
		return isset( $ops['archive_portfolio_orderby'] ) ? $ops['archive_portfolio_orderby'] : 'date';
	}
	
	public static function archive_portfolio_order(){
		$ops = get_option('ovapo_options');
		return isset( $ops['archive_portfolio_order'] ) ? $ops['archive_portfolio_order'] : 'ASC';
	}

	public static function archive_portfolio_type(){
		$ops = get_option('ovapo_options');
		return isset( $ops['archive_portfolio_type'] ) ? $ops['archive_portfolio_type'] : 'type1';
	}
	
}

new OVAPO_Settings();