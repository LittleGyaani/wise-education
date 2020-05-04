<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_testimonials extends Widget_Base {

	public function get_name() {
		return 'ova_testimonials';
	}

	public function get_title() {
		return __( 'Testimonials', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
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

		$this->start_controls_section(
			'section_version',
			[
				'label' => __( 'Version Testimonial' , 'ova-framework'),
			]
		);

		$this->add_control(
			'version_testimonial',
			[
				'label' => __( 'Choose Version', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'testimonial_version_1',
				'options' => [
					'testimonial_version_1' => __( 'Version 1', 'ova-framework' ),
					'testimonial_version_2' => __( 'Version 2', 'ova-framework' ),
				],
			]
		);

		$this->end_controls_section();

		/*************************************************************************************************
		SECTION VERSION TESTIMONIAL 1
		*************************************************************************************************/

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'condition' => [
					'version_testimonial' => 'testimonial_version_1',
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title ', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Thousands Clients Rated Us 5 Star', 'ova-framework' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description ', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Don\'t settle: Don\'t finish crappy books. If leave restaurant you\'re not on.', 'ova-framework' ),
				'row' => 2,
				'separator' => 'after',
			]
		);

		$repeater = new \Elementor\Repeater();

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
				'label' => __( 'Author ', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Mark Anderson', 'ova-framework' ),
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => __( 'Content ', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Happiness is not something you postpone for the future; it is something you design for the present. If you don\'t design your own life plan.', 'ova-framework' ),
				'row' => 2,
			]
		);

		$repeater->add_control(
			'num_star',
			[
				'label' => __( 'Number Star', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 5,
				'options' => [
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
				],
			]
		);

		$this->add_control(
			'tabs_testimonial',
			[
				'label' => __( 'Items Testimonial', 'ova-framework' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ author }}}',
			]
		);

		$this->end_controls_section();

		/*************************************************************************************************
		SECTION VERSION TESTIMONIAL 2
		*************************************************************************************************/

		$this->start_controls_section(
			'section_content_v2',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'condition' => [
					'version_testimonial' => 'testimonial_version_2',
				],
			]
		);

		$repeater_v_2 = new \Elementor\Repeater();

		$repeater_v_2->add_control(
			'image_author_v2',
			[
				'label' => __( 'Image Author', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater_v_2->add_control(
			'author_v_2',
			[
				'label' => __( 'Author ', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Mark Anderson', 'ova-framework' ),
			]
		);

		$repeater_v_2->add_control(
			'job_v_2',
			[
				'label' => __( 'Job', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Visitors', 'ova-framework' ),
			]
		);

		$repeater_v_2->add_control(
			'content_v_2',
			[
				'label' => __( 'Content ', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<p>Design must be functional, and functionality must be translated into visual aesthetics without any reliance.</p> <p>You drift through life and let things hap pen to you, or go by design and say.</p>', 'ova-framework' ),
			]
		);

		$this->add_control(
			'tabs_testimonial_v_2',
			[
				'label' => __( 'Items Testimonial', 'ova-framework' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater_v_2->get_controls(),
			]
		);

		$this->end_controls_section();

		/*****************************************************************
		START SECTION ADDITIONAL VERSIONT 1 TESTIMONIAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'ova-framework' ),
				'condition' => [
					'version_testimonial' => 'testimonial_version_1',
				]
			]
		);

		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'Slides to Scroll', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'description' => __( 'Set how many slides are scrolled per swipe.', 'ova-framework' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'ova-framework' ),
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
			'infinite',
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
			'autoplay',
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
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'frontend_available' => true,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'smartspeed',
			[
				'label'   => __( 'Smart Speed', 'ova-framework' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,

			]
		);


		$this->end_controls_section();

		/*****************************************************************
		START SECTION ADDITIONAL VERSIONT 2 TESTIMONIAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options_v_2',
			[
				'label' => __( 'Additional Options', 'ova-framework' ),
				'condition' => [
					'version_testimonial' => 'testimonial_version_2',
				]
			]
		);

		$this->add_control(
			'slides_to_scroll_v_2',
			[
				'label' => __( 'Slides to Scroll', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'description' => __( 'Set how many slides are scrolled per swipe.', 'ova-framework' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'infinite_v_2',
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
			'autoplay_v_2',
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
			'autoplay_speed_v_2',
			[
				'label' => __( 'Autoplay Speed', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'step' => 500,
				'frontend_available' => true,
				'condition' => [
					'autoplay_v_2' => 'yes',
				],
			]
		);

		$this->add_control(
			'pause_on_hover_v_2',
			[
				'label' => __( 'Pause on Hover', 'ova-framework' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'ova-framework' ),
					'no' => __( 'No', 'ova-framework' ),
				],
				'condition' => [
					'autoplay_v_2' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'smartspeed_v_2',
			[
				'label'   => __( 'Smart Speed', 'ova-framework' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->end_controls_section();
		#########################    END SECTION ADDITIONAL  VERSION 2  #########################

		/**************** Style ****************/
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version_testimonial' => 'testimonial_version_1',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .testimonial-title .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .testimonial-title .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova_testimonial .testimonial-title .title',
			]
		);
		$this->end_controls_section();

		/* Style Description*/
		$this->start_controls_section(
			'section_style_desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version_testimonial' => 'testimonial_version_1',
				],
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .testimonial-title .desc ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .testimonial-title .desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova_testimonial .testimonial-title .desc',
			]
		);
		$this->end_controls_section();

		/* Style Content*/
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-dig .content_v1 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ova_testimonial .single-testi-inside .content_v_2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-dig .content_v1 ' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ova_testimonial .single-testi-inside .content_v_2 p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-dig ul li i ' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ova_testimonial .single-testi-inside i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_bg_color',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-dig' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ova_testimonial .single-testi-inside' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_v1_typography',
				'selector' => '{{WRAPPER}} .ova_testimonial .testimonial-title .content_v1',
				'selector' => '{{WRAPPER}} .ova_testimonial .single-testi-dig .content_v1 ',
				'condition' => [
					'version_testimonial' => 'testimonial_version_1',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_v2_typography',
				'selector' => '{{WRAPPER}} .ova_testimonial .testimonial-title .content_v1',
				'selector' => '{{WRAPPER}} .ova_testimonial .single-testi-inside .content_v_2 p',
				'condition' => [
					'version_testimonial' => 'testimonial_version_2',
				],
			]
		);
		$this->end_controls_section();


		/* Style Content*/
		$this->start_controls_section(
			'section_style_boxshadow',
			[
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover_v2',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_testimonial .testimo_ver_2.home2 .single-testi-inside:hover',
				'condition' => [
					'version_testimonial' => 'testimonial_version_2',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover_v1',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .ova_testimonial .testimo_ver_1 .list-testimonial .wrap_item .single-testi-dig',
				'condition' => [
					'version_testimonial' => 'testimonial_version_1',
				],
			]
		);

		$this->end_controls_section();

		/* Style Name Author*/
		$this->start_controls_section(
			'section_style_author',
			[
				'label' => __( 'Name Author', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version_testimonial' => 'testimonial_version_2',
				],
			]
		);

		$this->add_responsive_control(
			'author_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-inside .author_name ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'author_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-inside .author_name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'selector' => '{{WRAPPER}} .ova_testimonial .single-testi-inside .author_name',
			]
		);
		$this->end_controls_section();

		/* Style Job Author*/
		$this->start_controls_section(
			'section_style_job',
			[
				'label' => __( 'Job Author', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version_testimonial' => 'testimonial_version_2',
				],
			]
		);

		$this->add_responsive_control(
			'job_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-inside .author_job ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'job_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_testimonial .single-testi-inside .author_job' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'selector' => '{{WRAPPER}} .ova_testimonial .single-testi-inside .author_job',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$version_testimonial = $settings['version_testimonial'];

		$tabs_testimonial = $data_options = [];
		if ($version_testimonial == 'testimonial_version_1') {
			$tabs_testimonial = $settings['tabs_testimonial'];

			$data_options['slideBy'] 			= $settings['slides_to_scroll'];
			$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
			$data_options['loop'] 			 	= $settings['infinite'] === 'yes' ? true : false;
			$data_options['autoplay'] 			= $settings['autoplay'] === 'yes' ? true : false;
			$data_options['autoplayTimeout']	= $data_options['autoplay'] ? $settings['autoplay_speed'] : 5000;
			$data_options['smartSpeed']			= $settings['smartspeed'];

			$data_options['prev'] = '<i class=" owl-prev ti-angle-left "></i>';
			$data_options['next'] = '<i class=" owl-next ti-angle-right "></i>';	
		}

		if ($version_testimonial == 'testimonial_version_2') {
			$tabs_testimonial = $settings['tabs_testimonial_v_2'];

			$data_options['slideBy']            = $settings['slides_to_scroll_v_2'];
			$data_options['autoplayHoverPause'] = $settings['pause_on_hover_v_2'] === 'yes' ? true : false;
			$data_options['loop']               = $settings['infinite_v_2'] === 'yes' ? true : false;
			$data_options['autoplay']           = $settings['autoplay_v_2'] === 'yes' ? true : false;
			$data_options['autoplayTimeout']    = $data_options['autoplay'] ? $settings['autoplay_speed_v_2'] : 5000;
			$data_options['smartSpeed']         = $settings['smartspeed_v_2'];
			$data_options['dots']               = true;
		}
		?>

		<div class="ova_testimonial">
			<?php if ($version_testimonial != "testimonial_version_2") : ?>
				<div class="testimo_ver_1 style1">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="testimonial-title">
									<h3 class="title second_font"><?php echo esc_html($settings['title'])  ?></h3>
									<p class="desc second_font"><?php echo esc_html($settings['desc'])  ?></p>
								</div>
							</div>
							<div class="col-md-8">
								<div class="list-testimonial testimonial-slider-ver-1 owl-carousel" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
									<?php if (!empty($tabs_testimonial)) : foreach ($tabs_testimonial as $item_testimonial) : ?>
										<div class="wrap_item">
											<div class="single-testi-dig">
												<p class="content_v1"><?php echo $item_testimonial['content'] ?></p>
												<ul>
													<li><h5 class="author"><?php echo esc_html($item_testimonial['author']) ?></h5></li>
													<?php if($item_testimonial['num_star'] > 0) : for ($i=1; $i<=$item_testimonial['num_star']; $i++) : ?>
														<li><i class="fa fa-star"></i></li>
													<?php endfor; endif;?>
													<?php if((5 - $item_testimonial['num_star']) > 0) : for ($i=1; $i<=(5 - $item_testimonial['num_star']); $i++) : ?>
														<li><i class="fa fa-star-o"></i></li>
													<?php endfor; endif;?>
												</ul>
											</div>
											<img src="<?php echo esc_attr($item_testimonial['image_author']['url']) ?>" alt="">
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>

			<?php if ($version_testimonial == "testimonial_version_2") : ?>
				<div class="testimo_ver_2 home2">
					<div class="list-testimonial testimonial-slider-ver-2 owl-carousel" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
						<?php if (!empty($tabs_testimonial)) : foreach ($tabs_testimonial as $item_testimonial) : ?>
							<div class="testimonial-item">
								<div class="single-testi-inside">
									<i class="text-background fas fa-quote-right"></i>
									<div class="content_v_2">
										<?php echo $item_testimonial['content_v_2'] ?>
									</div>
									<div class="media">
										<img src="<?php echo esc_attr($item_testimonial['image_author_v2']['url']) ?>" alt="">
										<div class="media-body">
											<h4 class="author_name second_font"><?php echo esc_html($item_testimonial['author_v_2']) ?></h4>
											<p class="author_job"><?php echo esc_html($item_testimonial['job_v_2']) ?></p>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>
				</div>
				
			<?php endif ?>
		</div>

		<?php
	}
}