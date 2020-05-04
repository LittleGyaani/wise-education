<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVACS_Settings {
	
	public static function ovacs_case_study_post_type_rewrite_slug(){
		$ops = get_option('ovacs_options');
		return isset( $ops['ovacs_case_study_post_type_rewrite_slug'] ) ? $ops['ovacs_case_study_post_type_rewrite_slug'] : 'case_study';
	}
	
	public static function archive_case_study_orderby(){
		$ops = get_option('ovacs_options');
		return isset( $ops['archive_case_study_orderby'] ) ? $ops['archive_case_study_orderby'] : 'date';
	}
	
	public static function archive_case_study_order(){
		$ops = get_option('ovacs_options');
		return isset( $ops['archive_case_study_order'] ) ? $ops['archive_case_study_order'] : 'ASC';
	}
	
}

new OVACS_Settings();