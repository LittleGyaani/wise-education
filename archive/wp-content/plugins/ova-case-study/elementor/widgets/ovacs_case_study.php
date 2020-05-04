<?php
namespace ovacs_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ovacs_case_study extends Widget_Base {

	public function get_name() {
		return 'ovacs_case_study';
	}

	public function get_title() {
		return __( 'Case Study', 'ova-case-study' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
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
				'label' => __( 'Content', 'ova-case-study' ),
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => __( 'Total Case Study', 'ova-case-study' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'ova-case-study' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => __( 'Date', 'ova-case-study' ),
					'time' => __( 'Time', 'ova-case-study' ),
					'ID'   => __( 'ID', 'ova-case-study' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'ova-case-study' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => __( 'Increase', 'ova-case-study' ),
					'DESC' => __( 'Decrease', 'ova-case-study' ),
				],
			]
		);

		$this->add_control(
			'button',
			[
				'label' => __( 'Button', 'ova-case-study' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read More', 'ova-case-study' ),
				'placeholder' => __( 'Text Button', 'ova-case-study' ),
			]
		);

		$this->end_controls_section();

		/*** Section Style ***/
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'ova-case-study' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow', 'ova-case-study' ),
				'selector' => '{{WRAPPER}} .elementor_case_study .wrap_item .items:hover .card img',
			]
		);

		/* Style Title */
		$this->add_control(
			'heading_style_title',
			[
				'label' => __( 'Title', 'ova-case-study' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'ova-case-study' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body h4 a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Hover', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body h4 a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body h4 a',
			]
		);

		/* Style Description */
		$this->add_control(
			'heading_style_desc',
			[
				'label' => __( 'Description', 'ova-case-study' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin', 'ova-case-study' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body p',
			]
		);

		/* Style Button */
		$this->add_control(
			'heading_style_button',
			[
				'label' => __( 'Button', 'ova-case-study' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'ova-case-study' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' => __( 'Margin', 'ova-case-study' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Color', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_color_hover',
			[
				'label' => __( 'Hover', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore:hover i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background',
			[
				'label' => __( 'Background', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background_hover',
			[
				'label' => __( 'Background Hover', 'ova-case-study' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .elementor_case_study .wrap_item .items .card .card-body .readmore',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings();

		$args_base = array(
			'post_type'      => 'case_study',
			'post_status'    => 'publish',
			'order'          => $settings['order'],
			'orderby'        => $settings['orderby'],
			'posts_per_page' => $settings['total_count'],
		);

		$case_study  = new \WP_Query($args_base);

		?>
		<div class="elementor_case_study">
			
			<div class="wrap_item">
				<?php if( $case_study->have_posts() ) : while( $case_study->have_posts() ) : $case_study->the_post();
					$thumbnail_url = wp_get_attachment_image_url(get_post_thumbnail_id() , 'digitax_thumb_blog' ); ?>
					<div class="items">
						<div class="single-case-dig">
							<div class="card">
								<img src="<?php echo esc_url($thumbnail_url) ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
								<div class="card-body">
									<h4><a href="<?php esc_url( the_permalink() );?>" title="<?php the_title();?>"><?php the_title();?></a></h4>
									<?php if ( function_exists('digitax_custom_text') ) { ?>
										<p><?php echo digitax_custom_text(get_the_excerpt(), 15); ?></p>
									<?php } ?>
									<a class="btn readmore" href="<?php esc_url( the_permalink() );?>" title="<?php the_title();?>" ><?php echo esc_html__( $settings['button'], 'ova-case-study' );; ?><i class="flaticon-right-arrow"></i><i class="flaticon-right-arrow"></i></a>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
			<?php else: ?>
				<div class="search_not_found">
					<?php esc_html_e( 'Not Found Case Study', 'ova-case-study' ); ?>
				</div>
			<?php endif; wp_reset_postdata(); ?>
			
			
		</div>
		<?php
	}
}
