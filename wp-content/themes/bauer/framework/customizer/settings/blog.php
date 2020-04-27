<?php
/**
 * Blog setting for Customizer
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Blog Posts General
$this->sections['bauer_blog_post'] = array(
	'title' => esc_html__( 'General', 'bauer' ),
	'panel' => 'bauer_blog',
	'settings' => array(
		array(
			'id' => 'blog_featured_title',
			'default' => esc_html__( 'Our News', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Blog Featured Title', 'bauer' ),
				'type' => 'text',
			),
		),
		array(
			'id' => 'blog_entry_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Content Background Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.post-content-wrap',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'blog_entry_content_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Content Padding', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'blog_entry_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Bottom Margin', 'bauer' ),
				'description' => esc_html__( 'Example: 30px.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry',
				'alter' => 'margin-top',
			),
		),
		array(
			'id' => 'blog_entry_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Entry Border Width', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 2px 0px 0px', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'blog_entry_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Border Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'blog_entry_composer',
			'default' => 'cdate,title,excerpt_content,readmore,meta',
			'control' => array(
				'label' => esc_html__( 'Entry Content Elements', 'bauer' ),
				'type' => 'bauer-sortable',
				'object' => 'Bauer_Customize_Control_Sorter',
				'choices' => array(
					'cdate'           => esc_html__( 'Custom Date', 'bauer' ),
					'title'           => esc_html__( 'Title', 'bauer' ),
					'excerpt_content' => esc_html__( 'Excerpt', 'bauer' ),
					'readmore'        => esc_html__( 'Read More', 'bauer' ),
					'meta'            => esc_html__( 'Meta', 'bauer' ),
				),
				'desc' => esc_html__( 'Drag and drop elements to re-order.', 'bauer' ),
			),
		),
	),
);

// Blog Posts Title
$this->sections['bauer_blog_post_title'] = array(
	'title' => esc_html__( 'Blog Post - Title', 'bauer' ),
	'panel' => 'bauer_blog',
	'settings' => array(
		array(
			'id' => 'blog_title_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_title_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-title a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_title_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color Hover', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Meta
$this->sections['bauer_blog_post_meta'] = array(
	'title' => esc_html__( 'Blog Post - Meta', 'bauer' ),
	'panel' => 'bauer_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_meta_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Meta Margin', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 20px 0.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta',
				'alter' => 'margin',
			),
		),
		array(
			'id'  => 'blog_entry_meta_items',
			'default' => array( 'author', 'comments', 'categories' ),
			'control' => array(
				'label' => esc_html__( 'Meta Items', 'bauer' ),
				'desc' => esc_html__( 'Click and drag and drop elements to re-order them.', 'bauer' ),
				'type' => 'bauer-sortable',
				'object' => 'Bauer_Customize_Control_Sorter',
				'choices' => array(
					'date'       => esc_html__( 'Date', 'bauer' ),
					'categories' => esc_html__( 'Categories', 'bauer' ),
					'author'     => esc_html__( 'Author', 'bauer' ),
					'comments' => esc_html__( 'Comments', 'bauer' ),
				),
			),
		),
		array(
			'id' => 'heading_blog_entry_meta_item',
			'control' => array(
				'type' => 'bauer-heading',
				'label' => esc_html__( 'Item Meta', 'bauer' ),
			),
		),
		array(
			'id' => 'blog_entry_meta_item_icon_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Icon Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-meta .item .inner:before',
				),
				'alter' => array(
					'color',
				),
			),
		),
		array(
			'id' => 'blog_entry_meta_item_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color Hover', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Excerpt
$this->sections['bauer_blog_post_excerpt'] = array(
	'title' => esc_html__( 'Blog Post - Excerpt', 'bauer' ),
	'panel' => 'bauer_blog',
	'settings' => array(
		array(
			'id' => 'blog_content_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Content Style', 'bauer' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Normal', 'bauer' ),
					'style-2' => esc_html__( 'Excerpt', 'bauer' ),
				),
			),
		),
		array(
			'id' => 'blog_excerpt_length',
			'default' => '50',
			'control' => array(
				'label' => esc_html__( 'Excerpt length', 'bauer' ),
				'type' => 'text',
				'desc' => esc_html__( 'This option only apply for Content Style: Excerpt.', 'bauer' )
			),
		),
		array(
			'id' => 'blog_excerpt_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'bauer' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 30px 0.', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_excerpt_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'bauer' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Read More
$this->sections['bauer_blog_post_read_more'] = array(
	'title' => esc_html__( 'Blog Post - Read More', 'bauer' ),
	'panel' => 'bauer_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_button_read_more_text',
			'default' => esc_html__( 'Read More', 'bauer' ),
			'control' => array(
				'label' => esc_html__( 'Button Text', 'bauer' ),
				'type' => 'text',
			),
		),
	),
);

