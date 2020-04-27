<?php
/**
 * Shop setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main Shop
$this->sections['bauer_shop_general'] = array(
	'title' => esc_html__( 'Main Shop', 'bauer' ),
	'panel' => 'bauer_shop',
	'settings' => array(
		array(
			'id' => 'shop_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Layout Position', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'bauer' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'bauer' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'bauer' ),
				),
				'desc' => esc_html__( 'Specify layout for main shop page.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title',
			'default' => esc_html__( 'Our Construction Equipment', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Shop: Featured Title', 'bauer' ),
				'type' => 'bauer_textarea',
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop: Featured Title Background', 'bauer' ),
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_products_per_page',
			'default' => 6,
			'control' => array(
				'label' => esc_html__( 'Products Per Page', 'bauer' ),
				'type' => 'number',
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_columns',
			'default' => '3',
			'control' => array(
				'label' => esc_html__( 'Shop Columns', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_item_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Bottom Margin', 'bauer' ),
				'description' => esc_html__( 'Example: 30px.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_woo',
			),
			'inline_css' => array(
				'target' => '.products li',
				'alter' => 'margin-top',
			),
		),
	),
);

// Single Shop
$this->sections['bauer_single_shop_general'] = array(
	'title' => esc_html__( 'Single Shop', 'bauer' ),
	'panel' => 'bauer_shop',
	'settings' => array(
		array(
			'id' => 'shop_single_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Single Layout Position', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'bauer' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'bauer' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'bauer' ),
				),
				'desc' => esc_html__( 'Specify layout on the shop single page.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title',
			'default' => esc_html__( 'Our Construction Equipment', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Shop Single: Featured Title', 'bauer' ),
				'type' => 'text',
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop Single: Featured Title Background', 'bauer' ),
				'active_callback' => 'bauer_cac_has_woo',
			),
		),
	),
);