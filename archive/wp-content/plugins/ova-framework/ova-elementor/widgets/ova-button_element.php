<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_button_element extends Widget_Base {

	public function get_name() {
		return 'ova_button_element';
	}

	public function get_title() {
		return __( 'Ova Button', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'button_control_section',
			[
				'label' => __('Button Content','ova-framework'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'button_control',
			[
				'label'   => __('Button','ova-framework'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Button','ova-framework'),
			]
		);

		$this->add_control(
			'button_style',
			[
				'label' => __('Button Style','ova-framework'),
				'type'  => Controls_Manager::SELECT,
				'options' => [
					'style1' => __('Style 1','ova-framework'), 
					'style2' => __('Style 2','ova-framework'), 
					'style3' => __('Style 3','ova-framework'), 
					'style4' => __('Style 4','ova-framework'), 
				],
				'default' => 'style1'
			]
		);
		
		$this->add_control(
			'button_type',
			[
				'label' => __('Choose Style','ova-framework'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'btn1' => __('Type 1','ova-framework'),
					'btn2' => __('Type 2','ova-framework'),
					'btn3' => __('Type 3','ova-framework'),
					'btn4' => __('Type 4','ova-framework'),
					'btn5' => __('Type 5','ova-framework'),
					'btn6' => __('Type 6','ova-framework'),
				],
				'default' => 'btn1',
				'condition' => [
					'button_style!' => '',
				]
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'         => __( 'Link', 'ova-framework' ),
				'type'          =>  Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'ova-framework' ),
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_control_typography',
				'label'    => __( 'Typography', 'ova-framework' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'ova-framework' ),
			]
		);

		$this->add_control(
			'button_control_text_color',
			[
				'label'     => __( 'Text Color', 'ova-framework' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_control_background_color',
			[
				'label'     => __( 'Background Color', 'ova-framework' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

				// Tab button hover
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'ova-framework' ),
			]
		);

		$this->add_control(
			'button_control_hover_color',
			[
				'label'     => __( 'Text Color', 'ova-framework' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_control_background_hover_color',
			[
				'label'     => __( 'Background Color', 'ova-framework' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:hover, {{WRAPPER}} .style1.btn.btn1:after, {{WRAPPER}} .style1.btn.btn2:after, {{WRAPPER}} .style1.btn.btn3:after, {{WRAPPER}} .style1.btn.btn4:after, {{WRAPPER}} .style1.btn.btn5:after, {{WRAPPER}} .style1.btn.btn6:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => __( 'Border Color', 'ova-framework' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .btn',
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => __( 'Border Radius', 'ova-framework' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .btn, {{WRAPPER}} .btn:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();


		$button_text  = $settings['button_control'] != '' ? $settings['button_control'] : '';			
		$button_style = $settings['button_style'] != '' ? $settings['button_style'] : '';
		$button_type  = $settings['button_type'] != '' ? $settings['button_type'] : '';			
		$target       = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow     = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

		?>

		<a class="elementor-button-link elementor-button btn <?php echo esc_attr($button_type);?> <?php echo esc_attr($button_style);?>" href="<?php echo esc_url($settings['button_link']['url']);?>" <?php echo $target . $nofollow;?>><?php echo esc_html($button_text);?></a>

	<?php }

}


