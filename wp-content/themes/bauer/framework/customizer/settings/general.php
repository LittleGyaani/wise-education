<?php
/**
 * General setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Accent Colors
$this->sections['bauer_accent_colors'] = array(
	'title' => esc_html__( 'Accent Colors', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'accent_color',
			'default' => '#f35c27',
			'control' => array(
				'label' => esc_html__( 'Accent Color', 'bauer' ),
				'type' => 'color',
			),
		),
	)
);

// Favicon
$this->sections['bauer_favicon'] = array(
	'title' => esc_html__( 'Favicon', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'favicon',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Site Icon', 'bauer' ),
				'type' => 'image',
				'description' => esc_html__( 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512 pixels wide and tall.', 'bauer' ),
			),
		),
	)
);

// PreLoader
$this->sections['bauer_preloader'] = array(
	'title' => esc_html__( 'PreLoader', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'preloader',
			'default' => 'animsition',
			'control' => array(
				'label' => esc_html__( 'Preloader Option', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'animsition' => esc_html__( 'Enable','bauer' ),
					'' => esc_html__( 'Disable','bauer' )
				),
			),
		),
	)
);

// Top Bar Site
$this->sections['bauer_topbar_site'] = array(
	'title' => esc_html__( 'Top Bar Site', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'top_bar_site_style',
			'default' => 'hide',
			'control' => array(
				'label' => esc_html__( 'Top Bar Style', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'hide' => esc_html__( 'Hide', 'bauer' ),
					'style-1' => esc_html__( 'Dark-Text', 'bauer' ),
					'style-2' => esc_html__( 'Light-Text', 'bauer' ),
				),
				'desc' => esc_html__( 'Top Bar Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'bauer' )
			),
		),
	),
);

// Header Site
$this->sections['bauer_header_site'] = array(
	'title' => esc_html__( 'Header Site', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'header_site_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Header Style', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Dark-Text', 'bauer' ),
					'style-2' => esc_html__( 'Light-Text', 'bauer' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'bauer' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'bauer' ),
					'style-5' => esc_html__( 'Normal Aside', 'bauer' ),
					'style-6' => esc_html__( 'Float Aside', 'bauer' ),
				),
				'desc' => esc_html__( 'Header Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'bauer' )
			),
		),
		array(
			'id' => 'header_fixed',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Header Fixed: Enable', 'bauer' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Scroll to top
$this->sections['bauer_scroll_top'] = array(
	'title' => esc_html__( 'Scroll Top Button', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'scroll_top',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'bauer' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Forms
$this->sections['bauer_general_forms'] = array(
	'title' => esc_html__( 'Forms', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		array(
			'id' => 'input_border_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Rounded', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-radius',
			),
		),
		array(
			'id' => 'input_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'input_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'input_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'bauer' ),
				'description' => esc_html__( 'Enter a value in pixels. Example: 1px', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'input_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'color',
			),
		),
	),
);

// Responsive
$this->sections['bauer_responsive'] = array(
	'title' => esc_html__( 'Responsive', 'bauer' ),
	'panel' => 'bauer_general',
	'settings' => array(
		// Top Bar
		array(
			'id' => 'heading_top_bar',
			'control' => array(
				'type' => 'bauer-heading',
				'label' => esc_html__( 'Top Bar', 'bauer' ),
			),
		),
		array(
			'id' => 'mobile_hide_top_bar',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Hide: Top Bar on Mobile', 'bauer' ),
				'type' => 'checkbox',
			),
		),
		// Mobile Logo
		array(
			'id' => 'heading_mobile_logo',
			'control' => array(
				'type' => 'bauer-heading',
				'label' => esc_html__( 'Mobile Logo', 'bauer' ),
			),
		),
		array(
			'id' => 'mobile_logo_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Width', 'bauer' ),
				'description' => esc_html__( 'Example: 150px', 'bauer' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo',
				'alter' => 'max-width',
			),
		),
		array(
			'id' => 'mobile_logo_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Margin', 'bauer' ),
				'description' => esc_html__( 'Example: 20px 0px 20px 0px', 'bauer' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo-inner',
				'alter' => 'margin',
			),
		),
		// Mobile Menu
		array(
			'id' => 'heading_mobile_menu',
			'control' => array(
				'type' => 'bauer-heading',
				'label' => esc_html__( 'Mobile Menu', 'bauer' ),
			),
		),
		array(
			'id' => 'mobile_menu_item_height',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Height', 'bauer' ),
				'description' => esc_html__( 'Example: 40px', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'#main-nav-mobi ul > li > a',
					'#main-nav-mobi .menu-item-has-children .arrow'
				),
				'alter' => 'line-height'
			),
		),
		array(
			'id' => 'mobile_menu_logo',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo', 'bauer' ),
				'type' => 'image',
			),
		),
		array(
			'id' => 'mobile_menu_logo_width',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo: Width', 'bauer' ),
				'type' => 'text',
			),
		),
		// Featured Title
		array(
			'id' => 'heading_featured_title',
			'control' => array(
				'type' => 'bauer-heading',
				'label' => esc_html__( 'Mobile Featured Title', 'bauer' ),
			),
		),
		array(
			'id' => 'mobile_featured_title_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_featured_title',
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '.header-style-1 #featured-title .inner-wrap, .header-style-2 #featured-title .inner-wrap, .header-style-3 #featured-title .inner-wrap, .header-style-4 #featured-title .inner-wrap	',
				'alter' => 'padding',
			),
		),
	)
);