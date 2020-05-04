<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_feature extends Widget_Base {

	public function get_name() {
		return 'ova_feature';
	}

	public function get_title() {
		return __( 'Service', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-info-box';
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
			'future_type',
			[
				'label' => __( 'Type', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => __( 'Type 1', 'ova-framework' ),
					'type2' => __( 'Type 2', 'ova-framework' ),
				],
			]
		);
		
		$this->add_control(
			'title_brand',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'SMM Report'
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
			'desc_brand',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'A brand for a company is like a reputation for a person. You earn reputation by trying to do hard things well.',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'ova-framework' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
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
			]
		);

		$this->end_controls_section();

		/* Section Image */
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'ova-framework' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'background',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
				'selectors' => [
					'{{WRAPPER}} .ova_feature .inside-service-dig .icon-ser:after' => 'background-image: url({{URL}})',
				],
				'condition' => [
					'future_type' => ''
				]
			]
		);

		$this->end_controls_section();


		/***** Section Style *****/
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_feature .inside-service-dig',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow Hover', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_feature .inside-service-dig:hover',
			]
		);

		/* Style Title */
		$this->add_control(
			'heading_style_title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_feature .inside-service-dig .title_brand ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_feature .inside-service-dig .title_brand a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_feature .inside-service-dig .title_brand a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_feature .inside-service-dig .title_brand a',
			]
		);

		/* Style Desc */
		$this->add_control(
			'heading_style_desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_feature .inside-service-dig .desc_brand ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_feature .inside-service-dig .desc_brand ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova_feature .inside-service-dig .desc_brand ',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$target   = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

		?>
		<div class="ova_feature <?php esc_attr_e( $settings['future_type'], 'ova-framework' ); ?>">
			<div class="container">
				<div class="row">
					<div class="inside-service-dig text-<?php echo esc_attr($settings['align']) ?>">

						<div class="icon-ser">
							<img src="<?php echo esc_attr( $settings['image']['url'] ) ?>" alt=""/>
						</div>
						<div class="content">
							<h4 class="title_brand"><a href="<?php echo esc_url($settings['link']['url']) ?>" <?php echo esc_attr($target) ?> <?php echo esc_attr($nofollow) ?> ><?php echo esc_attr( $settings['title_brand'] ); ?></a></h4>
							<p class="desc_brand"><?php echo esc_attr( $settings['desc_brand'] ); ?></p>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}