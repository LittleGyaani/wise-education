<?php
/**
 * Metabox Options
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return the registered-widget array
function bauer_get_widget_registered() {
	global $wp_registered_sidebars;

	$widgets_areas = array();
	if ( ! empty( $wp_registered_sidebars ) ) {
		foreach ( $wp_registered_sidebars as $widget_area ) {
			$name = isset ( $widget_area['name'] ) ? $widget_area['name'] : '';
			$id = isset ( $widget_area['id'] ) ? $widget_area['id'] : '';
			if ( $name && $id ) {
				$widgets_areas[$id] = $name;
			}
		}
	}

	return $widgets_areas;
}

// Return the all-widget array
function bauer_get_widget_mods() {
	$new_arr = array();
	$widget_areas_mod = bauer_get_mod( 'widget_areas' );
	
	if (is_array($widget_areas_mod) || is_object($widget_areas_mod)) {
		foreach( $widget_areas_mod as $key ) {
			$new_arr[sanitize_key($key)] = $key;
		}
	}
	
	$widget_areas = bauer_get_widget_registered() + $new_arr;

	return $widget_areas;
}

// Registering meta boxes. Using Meta Box plugin: https://metabox.io/
function bauer_register_meta_boxes( $meta_boxes ) {
	// Element Thumbnail
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Element Thumbnail', 'bauer' ),
		'id'     => 'opt-meta-box-element-thumbnail',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Image', 'bauer' ),
				'id'   => 'element_thumbnail',
				'type' => 'image_advanced',
				'max_file_uploads' => 1
			),
		),
	);
	// Post Format Gallery
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Gallery', 'bauer' ),
		'id'     => 'opt-meta-box-post-format-gallery',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'bauer' ),
				'id'   => 'gallery_images',
				'type' => 'image_advanced',
			),
		),
	);

	// Post Format Video
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo...)', 'bauer' ),
		'id'     => 'opt-meta-box-post-format-video',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'bauer' ),
				'id'   => 'video_url',
				'type' => 'textarea',
			),
		)
	);

	// Partner
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Partner Settings', 'bauer' ),
		'id'     => 'opt-meta-box-partner',
		'pages'  => array( 'partner' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hyperlink', 'bauer' ),
				'id'   => 'partner_hyperlink',
				'type'       => 'text',
				'desc'  => esc_html__( "Partne's URL. Leave blank to disable (please 'http://' included).", 'bauer' )
			),
		)
	);

	// Portfolio
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Project Settings', 'bauer' ),
		'id'     => 'opt-meta-box-project',
		'pages'  => array( 'project' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Title', 'bauer' ),
				'id'   => 'title',
				'type' => 'textarea',
			),
			array(
				'name' => esc_html__( 'Description', 'bauer' ),
				'id'   => 'desc',
				'type' => 'textarea',
			),
			array(
				'name'    => esc_html__( 'Image Cropping', 'bauer' ),
				'id'      => 'image_crop',
				'type'    => 'select',
				'options' => array(
					'default' =>  esc_html__( 'Default', 'bauer' ),
					'full' => esc_html__( 'Full', 'bauer' ),
					'square' => esc_html__( '600 x 600', 'bauer' ),
					'rectangle' => esc_html__( '600 x 500', 'bauer' ),
					'rectangle1' => esc_html__( '640 x 440', 'bauer' ),
					'rectangle2' => esc_html__( '640 x 880', 'bauer' ),
					'rectangle3' => esc_html__( '370 x 270', 'bauer' ),
					'rectangle4' => esc_html__( '370 x 740', 'bauer' ),
				),
				'std'     => 'default',
			),
		)
	);

	// Member
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Member Information', 'bauer' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'member' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'bauer' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'bauer' ),
				'id'   => 'position',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Facebook', 'bauer' ),
				'id'   => 'facebook',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Twitter', 'bauer' ),
				'id'   => 'twitter',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Linkedin', 'bauer' ),
				'id'   => 'linkedin',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Google +', 'bauer' ),
				'id'   => 'google_plus',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Instagram', 'bauer' ),
				'id'   => 'instagram',
				'type'       => 'text',
			),
		)
	);

	// Testimonials
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Testimonials Information', 'bauer' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'testimonials' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'bauer' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'bauer' ),
				'id'   => 'position',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Text', 'bauer' ),
				'id'   => 'text',
				'type' => 'textarea',
			),
		)
	);

	// Top Bar Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Top-Bar Settings', 'bauer' ),
		'id'     => 'opt-meta-box-top-bar',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Style', 'bauer' ),
				'id'      => 'top_bar_style',
				'type'    => 'select',
				'options' => array(
					'hide' => esc_html__( 'Hide', 'bauer' ),
					'style-1' => esc_html__( 'Dark-Text', 'bauer' ),
					'style-2' => esc_html__( 'Light-Text', 'bauer' ),
				),
				'std'     => 'hide',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'bauer' ),
			    'id'	=> 'top_bar_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'bauer' ),
				'id'   => 'top_bar_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'bauer' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'bauer' ),
			    'id'	=> 'top_bar_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
		)
	);

	// Header Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Header Settings', 'bauer' ),
		'id'     => 'opt-meta-box-header',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Style', 'bauer' ),
				'id'      => 'header_style',
				'type'    => 'select',
				'options' => array(
					'style-1' => esc_html__( 'Dark-Text', 'bauer' ),
					'style-2' => esc_html__( 'Light-Text', 'bauer' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'bauer' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'bauer' ),
					'style-5' => esc_html__( 'Normal Aside', 'bauer' ),
					'style-6' => esc_html__( 'Float Aside', 'bauer' ),
				),
				'std'     => 'style-1',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'bauer' ),
			    'id'	=> 'header_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'bauer' ),
				'id'   => 'header_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'bauer' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'bauer' ),
			    'id'	=> 'header_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name'    => esc_html__( 'Current Menu Link', 'bauer' ),
				'id'      => 'menu_link_current',
				'type'    => 'select',
				'options' => array(
					'cur-menu-1' => esc_html__( 'Style 1', 'bauer' ),
					'cur-menu-2' => esc_html__( 'Style 2', 'bauer' ),
					'cur-menu-0' => esc_html__( 'Simple', 'bauer' ),
				),
				'std'     => 'cur-menu-1',
			),
		)
	);

	// Featured Title Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Featured Title Settings', 'bauer' ),
		'id'     => 'opt-meta-box-featured-title',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide?', 'bauer' ),
				'id'   => 'hide_featured_title',
				'type' => 'checkbox',
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'bauer' ),
				'id'		=>	'featured_title_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Title', 'bauer' ),
				'id'		=>	'custom_featured_title',
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Sub-Title', 'bauer' ),
				'id'		=>	'custom_featured_subtitle',
			),
		)
	);

	// Main Content Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Main Content Settings', 'bauer' ),
		'id'     => 'opt-meta-box-main-content',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Layout Position', 'bauer' ),
				'id'      => 'page_layout',
				'type'    => 'image_select',
				'options' => array(
					'no-sidebar'  => get_template_directory_uri() . '/assets/admin/img/full-content.png',
					'sidebar-left'  => get_template_directory_uri() . '/assets/admin/img/sidebar-left.png',
					'sidebar-right' => get_template_directory_uri() . '/assets/admin/img/sidebar-right.png',
				),
				'std' 		=> 'no-sidebar',
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'bauer' ),
				'id'      => 'page_sidebar',
				'type'    => 'select',
				'options' => bauer_get_widget_mods(),
				'std'     => 'sidebar-page',
				'desc'    => esc_html__( 'This option do not apply if Layout Position is full-width.', 'bauer' )
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'bauer' ),
				'id'		=>	'main_content_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'name' => esc_html__( 'Remove: Top & Bottom Padding?', 'bauer' ),
				'id'   => 'hide_padding_content',
				'type' => 'checkbox',
			),
		)
	);

	// Footer Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Footer Settings', 'bauer' ),
		'id'     => 'opt-meta-box-footer',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide: Footer?', 'bauer' ),
				'id'   => 'hide_footer',
				'type' => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Hide: Footer Promotion?', 'bauer' ),
				'id'   => 'hide_footer_promo',
				'type' => 'checkbox',
			),
			array(
			    'name'          => 'Footer Widget: Background',
			    'id'            => 'footer_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
			    'name'          => 'Bottom Bar: Background',
			    'id'            => 'bottom_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'bauer_register_meta_boxes' );

// Enqueue script for handling actions with meta boxes
function bauer_admin_filter_meta_box() {
	wp_enqueue_script( 'bauer-metabox-script', get_template_directory_uri() . '/assets/admin/js/meta-boxes.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'bauer_admin_filter_meta_box' );