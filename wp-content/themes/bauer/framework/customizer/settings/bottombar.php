<?php
/**
 * Bottom Bar setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bottom Bar General
$this->sections['bauer_bottombar_general'] = array(
	'title' => esc_html__( 'General', 'bauer' ),
	'panel' => 'bauer_bottombar',
	'settings' => array(
		array(
			'id' => 'bottom_bar',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'bauer' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'bottom_copyright',
			'transport' => 'postMessage',
			'default' => '&copy; Bauer Construction. All rights reserved.',
			'control' => array(
				'label' => esc_html__( 'Copyright', 'bauer' ),
				'type' => 'bauer_textarea',
				'active_callback' => 'bauer_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_padding',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'bauer' ),
				'active_callback'=> 'bauer_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'bottom_background',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'bauer' ),
				'active_callback'=> 'bauer_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'background',
			),
		),
		array(
			'id' => 'bottom_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'bauer' ),
				'active_callback' => 'bauer_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_background_img_style',
			'default' => 'repeat',
			'control' => array(
				'label' => esc_html__( 'Background Image Style', 'bauer' ),
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
				'active_callback' => 'bauer_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'bauer' ),
				'active_callback'=> 'bauer_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'bottom_link_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Links', 'bauer' ),
				'active_callback'=> 'bauer_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => array(
					'#bottom a',
					'#bottom ul.bottom-nav > li > a'
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'bottom_link_color_hover',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Links: Hover', 'bauer' ),
				'active_callback'=> 'bauer_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => array(
					'#bottom a:hover',
					'#bottom ul.bottom-nav > li > a:hover'
				),
				'alter' => 'color',
			),
		),
	),
);