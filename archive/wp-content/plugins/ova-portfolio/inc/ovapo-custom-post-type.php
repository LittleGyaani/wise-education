<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAPO_custom_post_type' ) ) {

	class OVAPO_custom_post_type{

		public function __construct(){

			add_action( 'init', array( $this, 'OVAPO_register_post_type_portfolio' ) );
			add_action( 'init', array( $this, 'OVAPO_register_taxonomy_portfolio' ) );

		}
		
		function OVAPO_register_post_type_portfolio() {

			$slug = 'portfolio';
			$name = 'Portfolio';
			$singular_name = 'Portfolio';

			$labels = array(
				'name'                  => _x( $name, 'Post Type General Name', 'ova-portfolio' ),
				'singular_name'         => _x( $singular_name, 'Post Type Singular Name', 'ova-portfolio' ),
				'menu_name'             => __( $name, 'ova-portfolio' ),
				'name_admin_bar'        => __( 'Post Type', 'ova-portfolio' ),
				'archives'              => __( 'Item Archives', 'ova-portfolio' ),
				'attributes'            => __( 'Item Attributes', 'ova-portfolio' ),
				'parent_item_colon'     => __( 'Parent Item:', 'ova-portfolio' ),
				'all_items'             => __( 'All '.$name, 'ova-portfolio' ),
				'add_new_item'          => __( 'Add New '.$singular_name, 'ova-portfolio' ),
				'add_new'               => __( 'Add New '.$singular_name, 'ova-portfolio' ),
				'new_item'              => __( 'New Item', 'ova-portfolio' ),
				'edit_item'             => __( 'Edit '.$singular_name, 'ova-portfolio' ),
				'view_item'             => __( 'View Item', 'ova-portfolio' ),
				'view_items'            => __( 'View Items', 'ova-portfolio' ),
				'search_items'          => __( 'Search Item', 'ova-portfolio' ),
				'not_found'             => __( 'Not found', 'ova-portfolio' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ova-portfolio' ),
			);
			$args = array(
				'description'         => __( 'Post Type Description', 'ova-portfolio' ),
				'labels'              => $labels,
				'supports'            => array( 'author', 'title', 'editor', 'comments', 'excerpt', 'thumbnail' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => 'ovapo-menu',
				'menu_position'       => 5,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( $slug, 'URL slug', 'ova-portfolio' ) ),
				'capability_type'     => 'post',
			);
			register_post_type( $slug, $args );
		}

		function OVAPO_register_taxonomy_portfolio() {

			$slug = 'portfolio_category';
			$name = 'Categories';
			$singular_name = 'Categories';

			$labels = array(
				'name'                       => _x( $name, 'Post Type General Name', 'ova-portfolio' ),
				'singular_name'              => _x( $singular_name, 'Post Type Singular Name', 'ova-portfolio' ),
				'menu_name'                  => __( $name, 'ova-portfolio' ),
				'all_items'                  => __( 'All '.$name, 'ova-portfolio' ),
				'parent_item'                => __( 'Parent Item', 'ova-portfolio' ),
				'parent_item_colon'          => __( 'Parent Item:', 'ova-portfolio' ),
				'new_item_name'              => __( 'New Item Name', 'ova-portfolio' ),
				'add_new_item'               => __( 'Add New '.$singular_name, 'ova-portfolio' ),
				'add_new'                    => __( 'Add New '.$singular_name, 'ova-portfolio' ),
				'edit_item'                  => __( 'Edit '.$singular_name, 'ova-portfolio' ),
				'view_item'                  => __( 'View Item', 'ova-portfolio' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'ova-portfolio' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'ova-portfolio' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ova-portfolio' ),
				'popular_items'              => __( 'Popular Items', 'ova-portfolio' ),
				'search_items'               => __( 'Search Items', 'ova-portfolio' ),
				'not_found'                  => __( 'Not Found', 'ova-portfolio' ),
				'no_terms'                   => __( 'No items', 'ova-portfolio' ),
				'items_list'                 => __( 'Items list', 'ova-portfolio' ),
				'items_list_navigation'      => __( 'Items list navigation', 'ova-portfolio' ),
			);
			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'publicly_queryable' => true,
				'public'            => true,
				'show_ui'           => true,
				'show_in_menu'      => 'ovapo-menu',
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => false,
			);
			register_taxonomy( $slug, array( 'portfolio' ), $args );
		}

	}

	new OVAPO_custom_post_type();
}