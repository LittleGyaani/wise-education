<?php
/**
 * Footer setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Footer General
$this->sections['bauer_footer_general'] = array(
	'title' => esc_html__( 'General', 'bauer' ),
	'panel' => 'bauer_footer',
	'settings' => array(
		array(
			'id' => 'footer_columns',
			'default' => '4',
			'control' => array(
				'label' => esc_html__( 'Footer Column(s)', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'5' => 'Style 5',
					'4' => 'Style 4',
					'3' => 'Style 3',
					'2' => 'Style 2',
					'1' => 'Style 1',
				),
			),
		),
		array(
			'id' => 'footer_column_gutter',
			'default' => '35',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Footer Column Gutter', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'5'    => '5px',
					'10'   => '10px',
					'15'   => '15px',
					'20'   => '20px',
					'25'   => '25px',
					'30'   => '30px',
					'35'   => '35px',
					'40'   => '40px',
					'45'   => '45px',
					'50'   => '50px',
					'60'   => '60px',
					'70'   => '70px',
					'80'   => '80px',
				),
			),
		),
		array(
			'id' => 'footer_text_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '#footer-widgets .widget',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'footer_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'footer_top_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Top Padding', 'bauer' ),
				'description' => esc_html__( 'Example: 60px.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'padding-top',
			),
		),
		array(
			'id' => 'footer_bottom_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Bottom Padding', 'bauer' ),
				'description' => esc_html__( 'Example: 60px.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'padding-bottom',
			),
		),
	),
);

// Footer Promotion
$this->sections['bauer_footer_promotion'] = array(
	'title' => esc_html__( 'Promotion Block', 'bauer' ),
	'panel' => 'bauer_footer',
	'settings' => array(
		array(
			'id' => 'promotion_box',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Enable', 'bauer' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'promo_subs_text',
			'default' => esc_html__( 'Sign up today to receive our latest news, special offers and much more.', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Subscribe Text', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_heading',
			'default' => esc_html__( 'Call us and get it done', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Heading', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_subheading',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Sub-Heading', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_button',
			'default' => esc_html__( 'Get A Quote', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Button', 'bauer' ),
				'type' => 'text',
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_button_url',
			'default' => esc_html__( '#', 'bauer' ),
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Button URL', 'bauer' ),
				'description' => esc_html__( 'Please \'http://\' included', 'bauer' ),
				'active_callback' => 'bauer_cac_has_footer_promo',
			),	
		),
		array(
			'id' => 'promo_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'bauer' ),
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
			'inline_css' => array(
				'target' => '.footer-promotion',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'promo_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'bauer' ),
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_background_img_style',
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
				'active_callback' => 'bauer_cac_has_footer_promo',
			),
		),
	),
);