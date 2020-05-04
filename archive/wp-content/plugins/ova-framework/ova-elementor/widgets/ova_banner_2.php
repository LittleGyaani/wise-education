<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_banner_2 extends Widget_Base {

	public function get_name() {
		return 'ova_banner_2';
	}

	public function get_title() {
		return __( 'Banner 2', 'ova-framework' );
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
				'default' => 'Website Score Is Very Important,Check Your Website Score Free Now'
			]
		);

		$this->add_control(
			'desc_banner',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'You look at marketing: everything that\'s happening in marketing is digitized. Everything that\'s in finance is digitized. So pretty much every industry, every function in every industry.'
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label' => __( 'Enter your shortcode', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => '[gallery id="123" size="medium"]',
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
					'{{WRAPPER}} .ova_banner_2 .hero-banner-dig.home2' => 'background-image: url({{URL}})',
				],
			]
		);

		$this->add_control(
			'image_1',
			[
				'label' => __( 'Image 1', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'image_2',
			[
				'label' => __( 'Image 2', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'image_3',
			[
				'label' => __( 'Image 3', 'ova-framework' ),
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
					'{{WRAPPER}} .ova_banner_2 .hero-banner-dig.home2' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .ova_banner_2 .hero-banner-dig .inside-hero-text .title_banner ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_2 .hero-banner-dig .inside-hero-text .title_banner ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_banner_2 .hero-banner-dig .inside-hero-text .title_banner ',
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
					'{{WRAPPER}} .ova_banner_2 .hero-banner-dig .inside-hero-text .desc_banner ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_banner_2 .hero-banner-dig .inside-hero-text .desc_banner ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova_banner_2 .hero-banner-dig .inside-hero-text .desc_banner ',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$shortcode = $this->get_settings_for_display( 'shortcode' );
		$shortcode = do_shortcode( shortcode_unautop( $shortcode ) );

		?>
		<div class="ova_banner_2">
			<header class="hero-banner-dig home2">

				<div class="container">
					<div class="row h-100">
						<div class="col-md-10 offset-md-1 align-self-center">
							<div class="inside-hero-text">
								<h1 class="title_banner"><?php echo esc_attr( $settings['title_banner'] ); ?></h1>
								<p class="desc_banner"><?php echo esc_attr( $settings['desc_banner'] ); ?></p>
								<?php if ($settings['shortcode']): ?>
									<div class="seo-form-in">
										<?php echo $shortcode; ?>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>

				<div class="spin-image-hero">
					<img src="<?php echo esc_attr( $settings['image_1']['url'] ) ?>" class="spin1" alt="">
					<img src="<?php echo esc_attr( $settings['image_2']['url'] ) ?>" class="spin2" alt="">
					<img src="<?php echo esc_attr( $settings['image_3']['url'] ) ?>" class="spin3" alt="">
				</div>

			</header>
		</div>
		<?php
	}
}