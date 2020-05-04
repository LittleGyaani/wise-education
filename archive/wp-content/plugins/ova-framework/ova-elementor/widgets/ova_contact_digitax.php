<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class ova_contact_digitax extends Widget_Base {

	public function get_name() {
		return 'ova_contact_digitax';
	}

	public function get_title() {
		return __( 'Contact', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fa-map-marker';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Contact', 'ova-framework' ),
			]
		);

		$this->add_control(
			'version',
			[
				'label' => __( 'Version Contact', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'version_1',
				'options' => [
					'version_1'  => __( 'Version 1', 'ova-framework' ),
					'version_2' => __( 'Version 2', 'ova-framework' ),
				],
			]
		);


		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('flaticon-smartphone-call', 'ova-framework'),
			]
		);

		$this->add_control(
			'font_size_icon',
			[
				'label' => __( 'Font Size Icon', 'ova-framework' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .icon_contact i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'color_icon',
			[
				'label' => __( 'Color Icon', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .icon_contact i:before' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text Contact', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('+8801760-00000', 'ova-framework'),
			]
		);

			//version 1
		$this->add_control(
			'color_text',
			[
				'label' => __( 'Color Text', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .version_1 .contact' => 'color : {{VALUE}};',
				],
				'condition' => [
					'version' => 'version_1',
				]
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography_v_1',
				'label' => __( 'Typography', 'ova-framework' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'version' => 'version_1',
				],
				'selector' => '{{WRAPPER}} .ova-contact-digitax .version_1 .contact',
			]
		);


		$this->add_responsive_control(
			'margin_icon',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .version_1 .contact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'version' => 'version_1',
				]
			]
		);

		$this->add_responsive_control(
			'padding_icon',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .version_1 .contact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'version' => 'version_1',
				]
			]
		);
			//end version 1


			//version 2
		$this->add_control(
			'color_tex_ver_2',
			[
				'label' => __( 'Color Text', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .version_2 .contact' => 'color : {{VALUE}};',
				],
				'condition' => [
					'version' => 'version_2',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography_v_2',
				'label' => __( 'Typography', 'ova-framework' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ova-contact-digitax .version_2 .contact',
			]
		);



		$this->add_responsive_control(
			'margin_icon_v_2',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .version_2 .contact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'version' => 'version_2',
				]
			]
		);

		$this->add_responsive_control(
			'padding_icon_v_2',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-digitax .version_2 .contact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'version' => 'version_2',
				]
			]
		);
			//end version 2
		$this->end_controls_section();

		// end tab section_content

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="ova-contact-digitax">
			<?php if ($settings['version'] === 'version_1') : ?>
				<div class="version_1">
					<span class="icon_contact"><i class="<?php echo esc_attr($settings['icon']) ?>" ></i></span>
					<p class="contact"><?php echo esc_html($settings['text']) ?></p>
				</div>
			<?php endif ?>
			<?php if ($settings['version'] === 'version_2') : ?>
			<div class="version_2">
				<span class="icon_contact"><i class="<?php echo esc_attr($settings['icon']) ?>" ></i></span>
				<p class="contact"><?php echo esc_html($settings['text']) ?></p>
			</div>
			<?php endif ?>
		</div>
		<?php
	}
}
