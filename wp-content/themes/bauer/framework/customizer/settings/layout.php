<?php
/**
 * Layout setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Layout Style
$this->sections['bauer_layout_style'] = array(
	'title' => esc_html__( 'Layout Site', 'bauer' ),
	'panel' => 'bauer_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_style',
			'default' => 'full-width',
			'control' => array(
				'label' => esc_html__( 'Layout Style', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'full-width' => esc_html__( 'Full Width','bauer' ),
					'boxed' => esc_html__( 'Boxed','bauer' )
				),
			),
		),
		array(
			'id' => 'site_layout_boxed_shadow',
			'control' => array(
				'label' => esc_html__( 'Box Shadow', 'bauer' ),
				'type' => 'checkbox',
				'active_callback' => 'bauer_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'site_layout_wrapper_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Wrapper Margin', 'bauer' ),
				'desc' => esc_html__( 'Top Right Bottom Left. Default: 30px 0px 30px 0px.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'wrapper_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Outer Background Color', 'bauer' ),
				'type' => 'color',
				'active_callback' => 'bauer_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'wrapper_background_img',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image', 'bauer' ),
				'type' => 'image',
				'active_callback' => 'bauer_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'wrapper_background_img_style',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image Style', 'bauer' ),
				'type'  => 'image',
				'type'  => 'select',
				'choices' => array(
					''             => esc_html__( 'Default', 'bauer' ),
					'cover'        => esc_html__( 'Cover', 'bauer' ),
					'center-top'        => esc_html__( 'Center Top', 'bauer' ),
					'fixed-top'    => esc_html__( 'Fixed Top', 'bauer' ),
					'fixed'        => esc_html__( 'Fixed Center', 'bauer' ),
					'fixed-bottom' => esc_html__( 'Fixed Bottom', 'bauer' ),
					'repeat'       => esc_html__( 'Repeat', 'bauer' ),
					'repeat-x'     => esc_html__( 'Repeat-x', 'bauer' ),
					'repeat-y'     => esc_html__( 'Repeat-y', 'bauer' ),
				),
				'active_callback' => 'bauer_cac_has_boxed_layout',
			),
		),
	),
);

// Layout Position
$this->sections['bauer_layout_position'] = array(
	'title' => esc_html__( 'Layout Position', 'bauer' ),
	'panel' => 'bauer_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Site Layout Position', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'bauer' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'bauer' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'bauer' ),
				),
				'desc' => esc_html__( 'Specify layout for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'bauer' )
			),
		),
		array(
			'id' => 'single_post_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Single Post Layout Position', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'bauer' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'bauer' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'bauer' ),
				),
				'desc' => esc_html__( 'Specify layout for all single post pages.', 'bauer' )
			),
		),
	),
);

// Layout Widths
$this->sections['bauer_layout_widths'] = array(
	'title' => esc_html__( 'Layout Widths', 'bauer' ),
	'panel' => 'bauer_layout',
	'settings' => array(
		array(
			'id' => 'site_desktop_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Container', 'bauer' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default: 1170px', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array( 
					'.site-layout-full-width .bauer-container',
					'.site-layout-boxed #page'
				),
				'alter' => 'width',
			),
		),
		array(
			'id' => 'left_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Content', 'bauer' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 66%', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '#site-content',
				'alter' => 'width',
			),
		),
		array(
			'id' => 'sidebar_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Sidebar', 'bauer' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 28%', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '#sidebar',
				'alter' => 'width',
			),
		),
	),
);