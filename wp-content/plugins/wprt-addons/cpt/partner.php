<?php
if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}

add_action('init', 'register_partner_post_type');
/**
  * Register partner post type
*/
function register_partner_post_type() {
    $partner_slug = 'partner';

    $labels = array(
        'name'               => esc_html__( 'Partners', 'bauer' ),
        'singular_name'      => esc_html__( 'Partner Item', 'bauer' ),
        'add_new'            => esc_html__( 'Add New', 'bauer' ),
        'add_new_item'       => esc_html__( 'Add New Item', 'bauer' ),
        'new_item'           => esc_html__( 'New Item', 'bauer' ),
        'edit_item'          => esc_html__( 'Edit Item', 'bauer' ),
        'view_item'          => esc_html__( 'View Item', 'bauer' ),
        'all_items'          => esc_html__( 'All Items', 'bauer' ),
        'search_items'       => esc_html__( 'Search Items', 'bauer' ),
        'parent_item_colon'  => esc_html__( 'Parent Items:', 'bauer' ),
        'not_found'          => esc_html__( 'No items found.', 'bauer' ),
        'not_found_in_trash' => esc_html__( 'No items found in Trash.', 'bauer' )
    );

    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $partner_slug ),
        'supports'      => array( 'title', 'thumbnail' ),
        'public'        => true
    );

    register_post_type( 'partner', $args );
}

add_filter( 'post_updated_messages', 'partner_updated_messages' );
/**
  * Partner update messages.
*/
function partner_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['partner'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Partner updated.', 'bauer' ),
        2  => esc_html__( 'Custom field updated.', 'bauer' ),
        3  => esc_html__( 'Custom field deleted.', 'bauer' ),
        4  => esc_html__( 'Partner updated.', 'bauer' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Partner restored to revision from %s', 'bauer' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Partner published.', 'bauer' ),
        7  => esc_html__( 'Partner saved.', 'bauer' ),
        8  => esc_html__( 'Partner submitted.', 'bauer' ),
        9  => sprintf(
            esc_html__( 'Partner scheduled for: <strong>%1$s</strong>.', 'bauer' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'bauer' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Partner draft updated.', 'bauer' )
    );
    return $messages;
}

add_action( 'init', 'register_partner_taxonomy' );
/**
  * Register partner taxonomy
*/
function register_partner_taxonomy() {
    $cat_slug = 'partner_category';

    $labels = array(
        'name'                       => esc_html__( 'Partner Categories', 'bauer' ),
        'singular_name'              => esc_html__( 'Category', 'bauer' ),
        'search_items'               => esc_html__( 'Search Categories', 'bauer' ),
        'menu_name'                  => esc_html__( 'Categories', 'bauer' ),
        'all_items'                  => esc_html__( 'All Categories', 'bauer' ),
        'parent_item'                => esc_html__( 'Parent Category', 'bauer' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'bauer' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'bauer' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'bauer' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'bauer' ),
        'update_item'                => esc_html__( 'Update Category', 'bauer' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'bauer' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'bauer' ),
        'not_found'                  => esc_html__( 'No Category found.', 'bauer' ),
        'menu_name'                  => esc_html__( 'Categories', 'bauer' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'             => array('slug'=>$cat_slug),
        'hierarchical'  => true,
    );
    register_taxonomy( 'partner_category', 'partner', $args );
}