<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_banner_1 extends Widget_Base {

	public function get_name() {
		return 'ova_banner_1';
	}

	public function get_title() {
		return __( 'Banner 1', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

		$this->add_control(
			'title_banner',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'The best marketing doesn\'t feel like silly marketing!'
			]
		);

		$this->add_control(
			'desc_banner',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Marketing is telling the world you\'re a rock star.Content Marketing is showing the world you are one.'
			]
		);

		$this->add_control(
			'text_button',
			[
				'label' => __( 'Text Button', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Contact Us', 'ova-framework' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default' => [
					'url' => '#',
				],
				'separator' => 'after',
			]
		);

		$this->add_control(
			'image_banner',
			[
				'label' => __( 'Image Banner', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig:after' => 'background-image: url({{URL}})',
				],
			]
		);

		$this->add_control(
			'bg_banner',
			[
				'label' => __( 'Background Banner', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig' => 'background-image: url({{URL}})',
				],
			]
		);

		$this->end_controls_section();

		/***** Section Style *****/
		/* Style Title */
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig .inside-hero-text .title_banner ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig .inside-hero-text .title_banner ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_banner_1 .hero-banner-dig .inside-hero-text .title_banner ',
			]
		);
		$this->end_controls_section();

		/* Style Desc */
		$this->start_controls_section(
			'section_style_desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig .inside-hero-text .desc_banner ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig .inside-hero-text .desc_banner ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova_banner_1 .hero-banner-dig .inside-hero-text .desc_banner ',
			]
		);
		$this->end_controls_section();

		/* Style Button */
		$this->start_controls_section(
			'section_style_button',
			[
				'label' => __( 'Button', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn',
			]
		);

		$this->add_control(
			'button_border_width',
			[
				'label' => __( 'Border Width', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn' => 'border-width:  {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'padding_button',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn' => 'padding:  {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'ova-framework' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => __( 'Normal', 'ova-framework' ) ] );

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => __( 'Border Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover', [ 'label' => __( 'Hover', 'ova-framework' ) ] );

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => __( 'Text Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label' => __( 'Background Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig a.btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/* Style Banner */
		$this->start_controls_section(
			'section_style_image_banner',
			[
				'label' => __( 'Banner', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'duration_image',
			[
				'label' => __( 'Duration(ms)', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 1000,
				'min' => 0,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_1 .hero-banner-dig:after' => '-webkit-animation-duration: {{VALUE}}ms; -moz-animation-duration: {{VALUE}}ms; -ms-animation-duration: {{VALUE}}ms; animation-duration: {{VALUE}}ms;',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$target   = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

		?>
		<div class="ova_banner_1">
			<div class="hero-banner-dig">
				<div class="container">
					<div class="row">
						<div class="col-md-7 align-self-center">
							<div class="inside-hero-text">
								<h1 class="title_banner"><?php echo esc_attr( $settings['title_banner'] ); ?></h1>
								<p class="desc_banner"><?php echo esc_attr( $settings['desc_banner'] ); ?></p>
								<a class="elementor-button-link elementor-button btn btn1 style1" href="<?php echo esc_attr($settings['link']['url']) ?>" <?php echo esc_attr($target) ?> <?php echo esc_attr($nofollow) ?> ><?php echo esc_attr($settings['text_button']) ?></a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<?php
	}
}