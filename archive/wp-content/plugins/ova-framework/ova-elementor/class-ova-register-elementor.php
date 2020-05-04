<?php

namespace ova_framework;

use ova_framework\widgets\ova_menu;
use ova_framework\widgets\ova_logo;
use ova_framework\widgets\henbergar_menu;
use ova_framework\widgets\ova_header;
use ova_framework\widgets\ova_search;
use ova_framework\widgets\ova_social;
use ova_framework\widgets\ova_banner_1;
use ova_framework\widgets\ova_banner_2;
use ova_framework\widgets\ova_banner_3;
use ova_framework\widgets\ova_feature;
use ova_framework\widgets\ova_testimonials;
use ova_framework\widgets\ova_about_team;

use ova_framework\widgets\ova_blog;
use ova_framework\widgets\ova_heading;
use ova_framework\widgets\ova_contact_digitax;
use ova_framework\widgets\ova_time_countdown;
use ova_framework\widgets\ova_feature_service;


use ova_framework\widgets\ova_pricing_table;
use ova_framework\widgets\ova_button_element;
use ova_framework\widgets\video_popup;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Ova_Register_Elementor {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {

		// Register Header Footer Category in Pane
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_hf_category' ) );

	   // Register Ovatheme Category in Pane
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_ovatheme_category' ) );

		
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		
	}

	public  function add_hf_category(  ) {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'hf',
			[
				'title' => __( 'Header Footer', 'ova-framework' ),
				'icon' => 'fa fa-plug',
			]
		);
	}
	
	public function add_ovatheme_category(  ) {

		\Elementor\Plugin::instance()->elements_manager->add_category(
			'ovatheme',
			[
				'title' => __( 'Ovatheme', 'ova-framework' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-menu.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-logo.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-henbergar_menu.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-header.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-search.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-social.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_banner_1.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_banner_2.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_banner_3.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_feature.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_testimonials.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_about_team.php';

		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_blog.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_heading.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_contact_digitax.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_time_countdown.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_feature_service.php';


		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-pricing_plan.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-button_element.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-video_popup.php';
		
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new henbergar_menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_search() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_social() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_banner_1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_banner_2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_banner_3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_feature() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_about_team() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_blog() );


		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_pricing_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_contact_digitax() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_button_element() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_time_countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_feature_service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new video_popup() );
		
	}
}

new Ova_Register_Elementor();
