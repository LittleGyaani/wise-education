<?php
/**
 * Projects setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Project Related General
$this->sections['bauer_projects_general'] = array(
	'title' => esc_html__( 'General', 'bauer' ),
	'panel' => 'bauer_projects',
	'settings' => array(
		array(
			'id' => 'project_related',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'bauer' ),
				'type' => 'checkbox',
				'active_callback' => 'bauer_cac_has_single_project',
			),
		),
		array(
			'id' => 'related_pre_title',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Project Related Title', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),
		array(
			'id' => 'related_title',
			'default' => esc_html__( 'Related Projects', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Project Related Title', 'bauer' ),
				'type' => 'bauer_textarea',
				'rows' => 3,
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),
		array(
			'id' => 'related_button',
			'default' => esc_html__( 'View All', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Button', 'bauer' ),
				'type' => 'text',
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),
		array(
			'id' => 'related_button_url',
			'default' => esc_html__( '#', 'bauer' ),
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Button URL', 'bauer' ),
				'description' => esc_html__( 'Please \'http://\' included', 'bauer' ),
				'active_callback' => 'bauer_cac_has_related_project',
			),	
		),
		array(
			'id' => 'project_related_query',
			'default' => 7,
			'control' => array(
				'label' => esc_html__( 'Number of items', 'bauer' ),
				'type' => 'number',
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),
		array(
			'id' => 'project_related_column',
			'default' => '3',
			'control' => array(
				'label' => esc_html__( 'Columns', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
				),
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),
		array(
			'id' => 'project_related_item_spacing',
			'default' => 30,
			'control' => array(
				'label' => esc_html__( 'Spacing between items', 'bauer' ),
				'type' => 'number',
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),
		array(
			'id' => 'project_related_img_crop',
			'default' => 'rectangle1',
			'control' => array(
				'label' => esc_html__( 'Image Size', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'rectangle1' => '558 x 410',
					'rectangle2' => '450 x 528',
					'rectangle3' => '470 x 430',
					'rectangle4' => '480 x 600',
				),
				'active_callback' => 'bauer_cac_has_related_project',
			),
		),

	),
);