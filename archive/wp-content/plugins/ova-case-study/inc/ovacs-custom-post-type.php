<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVACS_custom_post_type' ) ) {

	class OVACS_custom_post_type{

		public function __construct(){

			add_action( 'init', array( $this, 'OVACS_register_post_type_case_study' ) );

		}
		
		function OVACS_register_post_type_case_study() {

			$slug = 'case_study';
			$name = 'Case Study';
			$singular_name = 'Case Study';

			$labels = array(
				'name'                  => _x( $name, 'Post Type General Name', 'ova-case-study' ),
				'singular_name'         => _x( $singular_name, 'Post Type Singular Name', 'ova-case-study' ),
				'menu_name'             => __( $name, 'ova-case-study' ),
				'name_admin_bar'        => __( 'Post Type', 'ova-case-study' ),
				'archives'              => __( 'Item Archives', 'ova-case-study' ),
				'attributes'            => __( 'Item Attributes', 'ova-case-study' ),
				'parent_item_colon'     => __( 'Parent Item:', 'ova-case-study' ),
				'all_items'             => __( 'All '.$name, 'ova-case-study' ),
				'add_new_item'          => __( 'Add New '.$singular_name, 'ova-case-study' ),
				'add_new'               => __( 'Add New '.$singular_name, 'ova-case-study' ),
				'new_item'              => __( 'New Item', 'ova-case-study' ),
				'edit_item'             => __( 'Edit '.$singular_name, 'ova-case-study' ),
				'view_item'             => __( 'View Item', 'ova-case-study' ),
				'view_items'            => __( 'View Items', 'ova-case-study' ),
				'search_items'          => __( 'Search Item', 'ova-case-study' ),
				'not_found'             => __( 'Not found', 'ova-case-study' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ova-case-study' ),
			);
			$args = array(
				'description'         => __( 'Post Type Description', 'ova-case-study' ),
				'labels'              => $labels,
				'supports'            => array( 'author', 'title', 'editor', 'comments', 'excerpt', 'thumbnail' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => 'ovacs-menu',
				'menu_position'       => 5,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( $slug, 'URL slug', 'ova-case-study' ) ),
				'capability_type'     => 'post',
			);
			register_post_type( $slug, $args );
		}

	}

	new OVACS_custom_post_type();
}