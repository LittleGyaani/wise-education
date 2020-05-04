<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_feature_service extends Widget_Base {

	public function get_name() {
		return 'ova_feature_service';
	}

	public function get_title() {
		return __( 'Feature Service', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fa-id-card-o';
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
			'image',
			[
				'label' => __( 'Image', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('We Take Reasonable Value', 'ova-framework'),
			]
		);


		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Marketing is a contest for people\'s attention. Seth advertising and marketing is an art.', 'ova-framework'),
			]
		);
		$this->add_control(
			'type',
			[
				'label' => __( 'Type feature', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'service',
				'options' => [
					'service' => __( 'Service', 'ova-framework' ),
					'work_list'  => __( 'Work List', 'ova-framework' ),
				],
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'right'  => __( 'Right', 'ova-framework' ),
					'left' => __( 'left', 'ova-framework' ),
				],
				'condition' => [
					'type' => 'service',
				]
			]
		);

		$this->end_controls_section();

		
		/***** Section Style *****/

		/* Style Title */
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_feature_service ul.use-service li' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_feature_service ul.use-service li',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow Hover', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_feature_service ul.use-service li:hover',
			]
		);

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
					'{{WRAPPER}} .ova_feature_service .use-service li h4 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_feature_service .use-service li h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_feature_service .use-service li h4',
			]
		);

		/* Style Desc */
		$this->add_control(
			'heading_style_desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
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
					'{{WRAPPER}} .ova_feature_service .use-service li p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_feature_service .use-service li p ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova_feature_service .use-service li p ',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$class_position = ($settings['position'] !== '') ? $settings['position'] . '-list' : 'left-list';
		

		if ($settings['type'] == 'service') {
			$class_type = "use-service";
		} else {
			$class_type = "";
		}


		?>
		<div class="ova_feature_service">
			<div class="service-sr">
				<?php if ($settings['type'] == 'work_list') : ?>
					<div class="how-work-list">
					<?php endif ?>
					<ul class="<?php echo esc_attr($class_type) ?> <?php echo esc_attr($class_position) ?>">
						<li>
							<img src="<?php echo esc_attr($settings['image']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>"/>
							<h4><?php echo esc_html($settings['title']) ?></h4>
							<p><?php echo esc_html($settings['desc']) ?></p>
						</li>
					</ul>
					<?php if ($settings['type'] == 'work_list') : ?>
					</div>
				<?php endif ?>
			</div>
		</div>
		<?php
	}
}