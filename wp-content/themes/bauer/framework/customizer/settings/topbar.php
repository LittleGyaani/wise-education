<?php
/**
 * Top Bar setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Top Bar 1 General
$this->sections['bauer_topbar_general_one'] = array(
	'title' => esc_html__( 'General', 'bauer' ),
	'panel' => 'bauer_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_one_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar:after',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'top_bar_one_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'bauer' ),
					'0.9' => esc_html__( '0.9', 'bauer' ),
					'0.8' => esc_html__( '0.8', 'bauer' ),
					'0.7' => esc_html__( '0.7', 'bauer' ),
					'0.6' => esc_html__( '0.6', 'bauer' ),
					'0.5' => esc_html__( '0.5', 'bauer' ),
					'0.4' => esc_html__( '0.4', 'bauer' ),
					'0.3' => esc_html__( '0.3', 'bauer' ),
					'0.2' => esc_html__( '0.2', 'bauer' ),
					'0.1' => esc_html__( '0.1', 'bauer' ),
					'0.0001' => esc_html__( '0', 'bauer' ),
				),
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'top_bar_one_text',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_social_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Socials: Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar .top-bar-socials .icons a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_border_width',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'top_bar_one_border_color',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'border-color',
			),
		),
	),
);

// Top Bar 2 General
$this->sections['bauer_topbar_general_two'] = array(
	'title' => esc_html__( 'General', 'bauer' ),
	'panel' => 'bauer_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_two_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar:after',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'top_bar_two_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'bauer' ),
					'0.9' => esc_html__( '0.9', 'bauer' ),
					'0.8' => esc_html__( '0.8', 'bauer' ),
					'0.7' => esc_html__( '0.7', 'bauer' ),
					'0.6' => esc_html__( '0.6', 'bauer' ),
					'0.5' => esc_html__( '0.5', 'bauer' ),
					'0.4' => esc_html__( '0.4', 'bauer' ),
					'0.3' => esc_html__( '0.3', 'bauer' ),
					'0.2' => esc_html__( '0.2', 'bauer' ),
					'0.1' => esc_html__( '0.1', 'bauer' ),
					'0.0001' => esc_html__( '0', 'bauer' ),
				),
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'top_bar_two_text',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_social_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Socials: Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar .top-bar-socials .icons a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_border_width',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'top_bar_two_border_color',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'border-color',
			),
		),
	),
);

// Top Bar Content
$this->sections['bauer_topbar_content'] = array(
	'title' => esc_html__( 'Content', 'bauer' ),
	'panel' => 'bauer_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_content_custom',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Custom Text', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_phone',
			'default' => '(+1) 212-946-2707',
			'control' => array(
				'label' => esc_html__( 'Phone', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_email',
			'default' => 'info@BauerX.com',
			'control' => array(
				'label' => esc_html__( 'Email', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_address',
			'default' => '112 W 34th St, New York',
			'control' => array(
				'label' => esc_html__( 'Address', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_topbar',
			),
		),
	),
);

// Top Bar Socials
$this->sections['bauer_topbar_social'] = array(
	'title' => esc_html__( 'Social', 'bauer' ),
	'panel' => 'bauer_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_social_text',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Text', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_social_space_between',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Space Between Items', 'bauer' ),
				'description' => esc_html__( 'Example: 10px.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar',
			),
			'inline_css' => array(
				'target' => '#top-bar .top-bar-socials .icons a',
				'alter' => 'margin-left',
			),
		),
		array(
			'id' => 'top_bar_social_font_size',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Icon Size', 'bauer' ),
				'description' => esc_html__( 'Example: 20px.', 'bauer' ),
				'active_callback' => 'bauer_cac_has_topbar',
			),
			'inline_css' => array(
				'target' => '#top-bar .top-bar-socials .icons a',
				'alter' => 'font-size',
			),
		),
	),
);

// Social settings
$social_options = bauer_topbar_social_options();
foreach ( $social_options as $key => $val ) {
	$this->sections['bauer_topbar_social']['settings'][] = array(
		'id' => 'top_bar_social_profiles[' . $key .']',
		'control' => array(
			'label' => $val['label'],
			'type' => 'text',
			'active_callback' => 'bauer_cac_has_topbar',
		),
	);
}

// Remove var from memory
unset( $social_options );