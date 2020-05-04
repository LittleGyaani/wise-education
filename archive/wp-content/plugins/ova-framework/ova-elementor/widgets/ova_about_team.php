<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_about_team extends Widget_Base {

	public function get_name() {
		return 'ova_about_team';
	}

	public function get_title() {
		return __( 'About Team', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		wp_enqueue_style( 'owl-carousel', OVA_PLUGIN_URI.'assets/libs/owl-carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', OVA_PLUGIN_URI.'assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

		/***** Content *****/
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);


		$this->add_control(
			'version_about_team',
			[
				'label' => __( 'Choose Version', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'about_team_v1',
				'options' => [
					'about_team_v1' => __( 'Grid', 'ova-framework' ),
					'about_team_v2' => __( 'Slider', 'ova-framework' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->start_controls_tabs( 'Authors',[] );

		$repeater->start_controls_tab( 'content', [ 'label' => __( 'Authors', 'ova-framework' ) ] );

		$repeater->add_control(
			'image_author',
			[
				'label' => __( 'Image Author', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'author',
			[
				'label' => __( 'Author', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Mark Anderson', 'ova-framework' ),
			]
		);

		$repeater->add_control(
			'link_author',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' => '',
			]
		);

		$repeater->add_control(
			'job',
			[
				'label' => __( 'Job Description', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'CEO & Founder', 'ova-framework' ),
			]
		);

		$repeater->end_controls_tab();

		/***** Social *****/
		$repeater->start_controls_tab( 'Social', [ 'label' => __( 'Social', 'ova-framework' ) ] );

		$repeater->add_control(
			'heading_social',
			[
				'label' => __( 'Social', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$repeater->add_control(
			'icon_1',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'fa fa-facebook-f',
				'default' => 'fa fa-facebook-f'
			]
		);

		$repeater->add_control(
			'social_1',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' => 'https://www.facebook.com',
			]
		);

		$repeater->add_control(
			'heading_social_2',
			[
				'label' => __( 'Social 2', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$repeater->add_control(
			'icon_2',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'fab fa-twitter',
				'default' => 'fab fa-twitter'
			]
		);

		$repeater->add_control(
			'social_2',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' => 'https://www.facebook.com',
			]
		);

		$repeater->add_control(
			'heading_social_3',
			[
				'label' => __( 'Social 3', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$repeater->add_control(
			'icon_3',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'fab fa-linkedin-in',
				'default' => 'fab fa-linkedin-in'
			]
		);

		$repeater->add_control(
			'social_3',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' => 'https://www.facebook.com',
			]
		);

		$repeater->add_control(
			'heading_social_4',
			[
				'label' => __( 'Social 4', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$repeater->add_control(
			'icon_4',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'fa fa-facebook-f'
			]
		);

		$repeater->add_control(
			'social_4',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' => 'https://www.facebook.com',
			]
		);
		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'content_about_team',
			[
				'label' => __( 'Authors', 'ova-framework' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ author }}}',
				'default' => [
					[
						'author' => 'Motheis Harison',
						'job' => 'CEO & Founder',
					],
					[
						'author' => 'Vectoria Gorge',
						'job' => 'UI & UX Designer',
					],
					[
						'author' => 'Yeakin Robert',
						'job' => 'Managing Director',
					],
				],
			]
		);

		$this->end_controls_section();


		/****** Slider Option ******/
		$this->start_controls_section(
			'section_slider_option',
			[
				'label' => __( 'Slider Options', 'ova-framework' ),
				'condition' => [
					'version_about_team' => 'about_team_v2',
				]
			]
		);

		$this->add_control(
			'slides_to_scroll_v2',
			[
				'label' => __( 'Slides to Scroll', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'description' => __( 'Set how many slides are scrolled per swipe.', 'ova-framework' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'infinite_v2',
			[
				'label' => __( 'Infinite Loop', 'ova-framework' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'ova-framework' ),
					'no' => __( 'No', 'ova-framework' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay_v2',
			[
				'label' => __( 'Autoplay', 'ova-framework' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'ova-framework' ),
					'no' => __( 'No', 'ova-framework' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay_speed_v2',
			[
				'label' => __( 'Autoplay Speed', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'step' => 500,
				'frontend_available' => true,
				'condition' => [
					'autoplay_v2' => 'yes',
				],
			]
		);

		$this->add_control(
			'pause_on_hover_v2',
			[
				'label' => __( 'Pause on Hover', 'ova-framework' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'ova-framework' ),
					'no' => __( 'No', 'ova-framework' ),
				],
				'condition' => [
					'autoplay_v2' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'smartspeed_v2',
			[
				'label'   => __( 'Smart Speed', 'ova-framework' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->end_controls_section();
		#########################    END SECTION ADDITIONAL  VERSION 2  #########################


		/* Section Style */
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
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_about_team .single-team-dig:hover',
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
					'{{WRAPPER}} .ova_about_team .single-team-dig .author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_about_team .single-team-dig .author' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_about_team .single-team-dig .author:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_about_team .single-team-dig .author',
			]
		);

		/* Style Description */
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
					'{{WRAPPER}} .ova_about_team .single-team-dig .job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_about_team .single-team-dig .job' => 'color: {{VALUE}}',
				],
			]
		);

		/* Style Icon */
		$this->add_control(
			'heading_style_icon',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_about_team ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_about_team ul li a i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_about_team ul li a i:hover' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();

		/* Section Style Dots */
		$this->start_controls_section(
			'section_style_dots',
			[
				'label' => __( 'Dots', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version_about_team' => 'about_team_v2'
				]
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __( 'Size', 'ova-framework' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ova_about_team .ova_about_team_slider .owl-carousel .owl-dots button.owl-dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'dots_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_about_team .ova_about_team_slider .owl-carousel .owl-dots button.owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_about_team .ova_about_team_slider .owl-carousel .owl-dots button.owl-dot' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ova_about_team .ova_about_team_slider .owl-carousel .owl-dots button.owl-dot.active' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ova_about_team .ova_about_team_slider .owl-carousel .owl-dots button.owl-dot:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}}'
					,
				],
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$version_about_team = $settings['version_about_team'];

		if ($version_about_team == 'about_team_v2') {

			$data_option = [
				'slideBy'            => $settings['slides_to_scroll_v2'],
				'margin'             =>	10,
				'autoplayHoverPause' => $settings['pause_on_hover_v2'] === 'yes' ? true : false,
				'loop'               => $settings['infinite_v2'] === 'yes' ? true : false,
				'autoplay'           => $settings['autoplay_v2'] === 'yes' ? true : false,
				'autoplayTimeout'    => 'autoplay' ? $settings['autoplay_speed_v2'] : 5000,
				'smartSpeed'         => absint($settings['smartspeed_v2']),
				'dots'               => true,
				'responsive' => [
					'0' => [
						'items' => absint(1),
					],
					'600' => [
						'items' => absint(2),
					],
					'768' => [
						'items' => absint(3),
					],
				]
			];

			$data_option_encode = wp_json_encode($data_option);
		}

		?>
		<div class="ova_about_team">

			<?php if ($version_about_team == "about_team_v1") { ?>
				<div class="ova_about_team_grid">
					<div class="container">
						<div class="row">
							<div class="wrap_item">
								<?php if ($settings['content_about_team'] != '') {
									foreach ( $settings['content_about_team'] as $key => $value ) { ?>
										<?php 
										$author_target   = $value['link_author']['is_external'] ? ' target=_blank ' : '';
										$author_nofollow = $value['link_author']['nofollow'] ? ' rel=nofollow ' : '';
										?>
										<div class="items">
											<div class="single-team-dig">
												<?php if ($value['image_author']['url']) { ?>
													<img src="<?php echo esc_attr($value['image_author']['url']) ?>" alt="<?php echo esc_attr($value['author']) ?>">
												<?php } ?>
												<a href="<?php echo esc_attr($value['link_author']['url']) ?>" <?php echo esc_attr($author_target) ?> <?php echo esc_attr($author_nofollow) ?> >
													<h4 class="author"><?php echo esc_html($value['author']) ?></h4>
												</a>
												<p class="job"><?php echo esc_html($value['job']) ?></p>
												<ul>
													<?php 
													$target_1   = $value['social_1']['is_external'] ? ' target=_blank ' : '';
													$nofollow_1 = $value['social_1']['nofollow'] ? ' rel=nofollow ' : '';
													?>
													<?php if ($value['icon_1'] != '') { ?>
														<li>
															<a href="<?php echo esc_attr($value['social_1']['url']) ?>" <?php echo esc_attr($target_1) ?> <?php echo esc_attr($nofollow_1) ?> >
																<i class="<?php echo esc_attr($value['icon_1']) ?>"></i>
															</a>
														</li>
													<?php } ?>
													
													<?php 
													$target_2   = $value['social_2']['is_external'] ? ' target=_blank ' : '';
													$nofollow_2 = $value['social_2']['nofollow'] ? ' rel=nofollow ' : '';
													?>
													<?php if ($value['icon_2'] != '') { ?>
														<li>
															<a href="<?php echo esc_attr($value['social_2']['url']) ?>" <?php echo esc_attr($target_2) ?> <?php echo esc_attr($nofollow_2) ?> >
																<i class="<?php echo esc_attr($value['icon_2']) ?>"></i>
															</a>
														</li>
													<?php } ?>
													
													<?php 
													$target_3   = $value['social_3']['is_external'] ? ' target=_blank ' : '';
													$nofollow_3 = $value['social_3']['nofollow'] ? ' rel=nofollow ' : '';
													?>
													<?php if ($value['icon_3'] != '') { ?>
														<li>
															<a href="<?php echo esc_attr($value['social_3']['url']) ?>" <?php echo esc_attr($target_3) ?> <?php echo esc_attr($nofollow_3) ?> >
																<i class="<?php echo esc_attr($value['icon_3']) ?>"></i>
															</a>
														</li>
													<?php } ?>

													<?php 
													$target_4   = $value['social_4']['is_external'] ? ' target=_blank ' : '';
													$nofollow_4 = $value['social_4']['nofollow'] ? ' rel=nofollow ' : '';
													?>
													<?php if ($value['icon_4'] != '') { ?>
														<li>
															<a href="<?php echo esc_attr($value['social_4']['url']) ?>" <?php echo esc_attr($target_4) ?> <?php echo esc_attr($nofollow_4) ?> >
																<i class="<?php echo esc_attr($value['icon_4']) ?>"></i>
															</a>
														</li>
													<?php } ?>

												</ul>
											</div>
										</div>
									<?php }
								} ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ($version_about_team == "about_team_v2") { ?>
				<div class="ova_about_team_slider">
					<div class="container">
						<div class="row">
							<div class="about_team_slider owl-carousel owl-loaded owl-drag" data-option='<?php echo esc_attr($data_option_encode) ?>' >
								<?php if ($settings['content_about_team'] != '') {
									foreach ( $settings['content_about_team'] as $key => $value ) { ?>
										<?php 
										$author_target   = $value['link_author']['is_external'] ? ' target=_blank ' : '';
										$author_nofollow = $value['link_author']['nofollow'] ? ' rel=nofollow ' : '';
										?>
										<div class="single-team-dig">
											<?php if ($value['image_author']['url']) { ?>
												<img src="<?php echo esc_attr($value['image_author']['url']) ?>" alt="<?php echo esc_attr($value['author']) ?>">
											<?php } ?>
											<a href="<?php echo esc_attr($value['link_author']['url']) ?>" <?php echo esc_attr($author_target) ?> <?php echo esc_attr($author_nofollow) ?> >
												<h4 class="author"><?php echo esc_html($value['author']) ?></h4>
											</a>
											<p class="job"><?php echo esc_html($value['job']) ?></p>
											<ul>
												<?php 
												$target_1   = $value['social_1']['is_external'] ? ' target=_blank ' : '';
												$nofollow_1 = $value['social_1']['nofollow'] ? ' rel=nofollow ' : '';
												?>
												<?php if ($value['icon_1'] != '') { ?>
													<li>
														<a href="<?php echo esc_attr($value['social_1']['url']) ?>" <?php echo esc_attr($target_1) ?> <?php echo esc_attr($nofollow_1) ?> >
															<i class="<?php echo esc_attr($value['icon_1']) ?>"></i>
														</a>
													</li>
												<?php } ?>

												<?php 
												$target_2   = $value['social_2']['is_external'] ? ' target=_blank ' : '';
												$nofollow_2 = $value['social_2']['nofollow'] ? ' rel=nofollow ' : '';
												?>
												<?php if ($value['icon_2'] != '') { ?>
													<li>
														<a href="<?php echo esc_attr($value['social_2']['url']) ?>" <?php echo esc_attr($target_2) ?> <?php echo esc_attr($nofollow_2) ?> >
															<i class="<?php echo esc_attr($value['icon_2']) ?>"></i>
														</a>
													</li>
												<?php } ?>

												<?php 
												$target_3   = $value['social_3']['is_external'] ? ' target=_blank ' : '';
												$nofollow_3 = $value['social_3']['nofollow'] ? ' rel=nofollow ' : '';
												?>
												<?php if ($value['icon_3'] != '') { ?>
													<li>
														<a href="<?php echo esc_attr($value['social_3']['url']) ?>" <?php echo esc_attr($target_3) ?> <?php echo esc_attr($nofollow_3) ?> >
															<i class="<?php echo esc_attr($value['icon_3']) ?>"></i>
														</a>
													</li>
												<?php } ?>

												<?php 
												$target_4   = $value['social_4']['is_external'] ? ' target=_blank ' : '';
												$nofollow_4 = $value['social_4']['nofollow'] ? ' rel=nofollow ' : '';
												?>
												<?php if ($value['icon_4'] != '') { ?>
													<li>
														<a href="<?php echo esc_attr($value['social_4']['url']) ?>" <?php echo esc_attr($target_4) ?> <?php echo esc_attr($nofollow_4) ?> >
															<i class="<?php echo esc_attr($value['icon_4']) ?>"></i>
														</a>
													</li>
												<?php } ?>
											</ul>

										</div>
									<?php }
								} ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
		<?php
	}
}