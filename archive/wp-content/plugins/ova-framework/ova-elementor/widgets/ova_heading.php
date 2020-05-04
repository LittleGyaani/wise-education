<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_heading extends Widget_Base {

	public function get_name() {
		return 'ova_heading';
	}

	public function get_title() {
		return __( 'Ova Heading', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {


		/**********************************************
					CONTENT SECTION
					**********************************************/
					$this->start_controls_section(
						'section_heading_content',
						[
							'label' => __( 'Content', 'ova-framework' ),
						]
					);



					$this->add_responsive_control(
						'align',
						[
							'label' => __( 'Alignment', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'left' => [
									'title' => __( 'Left', 'ova-framework' ),
									'icon' => 'fa fa-align-left',
								],
								'center' => [
									'title' => __( 'Center', 'ova-framework' ),
									'icon' => 'fa fa-align-center',
								],
								'right' => [
									'title' => __( 'Right', 'ova-framework' ),
									'icon' => 'fa fa-align-right',
								],
							],
							'default' => 'center',
							'selectors' => [
								'{{WRAPPER}} .ova-heading' => 'text-align: {{VALUE}}',
							]
						]
					);

					$this->add_control(
						'title',
						[
							'label' => __( 'Heading Title', 'ova-framework' ),
							'type' => Controls_Manager::TEXT,
							'default' => __('Our Exclusive Services', 'ova-framework'),
						]
					);

					$this->add_control(
						'sub_title',
						[
							'label' => __( 'Sub Title', 'ova-framework' ),
							'type' => Controls_Manager::WYSIWYG,
							'default' => __("Don't settle: Don't finish copy books. If you don't like the menu,,leave the restuarant.If you're not on the right path,get off it.", "ova-framework"),
						]
					);


					$this->end_controls_section();


		//section style title
					$this->start_controls_section(
						'section_title',
						[
							'label' => __( 'Title', 'ova-framework' ),
							'tab' => Controls_Manager::TAB_STYLE,
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'title_typography',
							'selector' => '{{WRAPPER}} ova-heading h3.heading-title',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_control(
						'color_title',
						[
							'label' => __( 'Color Title', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-heading h3.heading-title' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'margin_title',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-heading h3.heading-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->end_controls_section();

					//section style sub title
					$this->start_controls_section(
						'section_sub_title',
						[
							'label' => __( 'Sub Title', 'ova-framework' ),
							'tab' => Controls_Manager::TAB_STYLE,
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'sub_title_typography',
							'selector' => '{{WRAPPER}} .ova-heading .sub-title p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_control(
						'color_sub_title',
						[
							'label' => __( 'Color Sub Title', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-heading .sub-title' => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-heading .sub-title p' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'margin_sub_title',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-heading .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->end_controls_section();


				}

				protected function render() {
					$settings = $this->get_settings();

					$title = $settings['title'];
					$sub_title = $settings['sub_title'];
					?>
					<div class="ova-heading">
						<?php if (!empty($title)) : ?>
							<h3 class="heading-title"><?php echo esc_html($title) ?></h3>
						<?php endif ?>
						<?php if (!empty($sub_title)) : ?>
							<div class="sub-title">
								<?php echo $sub_title ?>
							</div>
						<?php endif ?>
					</div>
					<?php

				}
	// end render
			}


