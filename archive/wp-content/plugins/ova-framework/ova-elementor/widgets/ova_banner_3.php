<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_banner_3 extends Widget_Base {

	public function get_name() {
		return 'ova_banner_3';
	}

	public function get_title() {
		return __( 'Banner 3', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		// Mover
		wp_enqueue_script( 'mover', OVA_PLUGIN_URI.'assets/libs/mover.js', array('jquery'), false, true );
		return [ 'script-elementor' ];
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
				'default' => 'SEO & Digital Marketing Is Life Of Business'
			]
		);

		$this->add_control(
			'desc_banner',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'You look at marketing: everything that\'s happening in marketing in finance is digitized. So pretty much every industry.'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'ova-framework' ),
			]
		);

		$this->add_control(
			'background',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_3 .hero-banner-dig.home3:after' => 'background-image: url({{URL}})',
				],
			]
		);

		$this->add_control(
			'image_banner',
			[
				'label' => __( 'Image Banner', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();


		/***** Section Style *****/

		/* Style Background */
		$this->start_controls_section(
			'section_style_background',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-banner-dig.home3' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		
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
					'{{WRAPPER}} .ova_banner_3 .hero-banner-dig .inside-hero-text .title_banner ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_3 .hero-banner-dig .inside-hero-text .title_banner ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_banner_3 .hero-banner-dig .inside-hero-text .title_banner ',
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
					'{{WRAPPER}} .ova_banner_3 .hero-banner-dig .inside-hero-text .desc_banner ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_3 .hero-banner-dig .inside-hero-text .desc_banner ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova_banner_3 .hero-banner-dig .inside-hero-text .desc_banner ',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		?>
		<div class="ova_banner_3">
			<header class="hero-banner-dig home3">
				<div class="container">
					<div class="row h-100">
						<div class="col-md-6 align-self-center">
							<div class="inside-hero-text">
								<h1 class="title_banner"><?php echo esc_attr( $settings['title_banner'] ); ?></h1>
								<p class="desc_banner"><?php echo esc_attr( $settings['desc_banner'] ); ?></p>
							</div>
						</div>
						<div class="col-md-6 align-self-center">
							<div id="wrapper">
								<div class="letra" data-speed="0.2"><img src="<?php echo esc_attr( $settings['image_banner']['url'] ) ?>" alt=""/></div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
		<?php
	}
}