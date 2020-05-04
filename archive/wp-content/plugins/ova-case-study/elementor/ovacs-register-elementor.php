<?php

namespace ovacs_elementor;

use ovacs_elementor\widgets\ovacs_case_study;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class OVACS_Register_Elementor {

	public function __construct() {
		$this->add_actions();
	}

	private function add_actions() {

     	// Register Ovatheme Category in Pane
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_ovatheme_category' ) );
		
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		
	}
	
	public function add_ovatheme_category(  ) {

		\Elementor\Plugin::instance()->elements_manager->add_category(
			'ovatheme',
			[
				'title' => __( 'Ovatheme', 'ova-case-study' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	private function includes() {
		
		require OVACS_PLUGIN_PATH . 'elementor/widgets/ovacs_case_study.php';
		
	}

	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ovacs_case_study() );

	}

}

new OVACS_Register_Elementor();