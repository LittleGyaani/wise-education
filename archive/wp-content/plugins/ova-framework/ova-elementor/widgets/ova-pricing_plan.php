<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Control_Media;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class ova_pricing_table extends Widget_Base {

	public function get_name() {
		return 'ova_pricing_table';
	}

	public function get_title() {
		return __( 'Pricing Table', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fa-table';
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
				'label' => __( 'Price Table', 'ova-framework' ),
			]
		);

		$this->add_control(
			'pricing_style',
			[
				'label'   => __('Pricing Style','ova-framework'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __('Style 1','ova-framework'),
					'style2' => __('Style 2','ova-framework'),
					'style3' => __('Style 3','ova-framework'),
					'style4' => __('Style 4','ova-framework'),
					'style5' => __('Style 5','ova-framework'),
				]
			]
		);

		$this->add_control(
			'title_prc_style1',
			[
				'label'     => __('Title', 'ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Our Pricings'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'desc_prc_style1',
			[
				'label'     => __( 'Description', 'ova-framework' ),
				'type'      => Controls_Manager::WYSIWYG,
				'default'   => __('Don\'t settle: Don\'t finish copy books. If you don\'t like the menu,leave the restuarant.If you\'re not on the right path,get off it.Search engine marketing and search engine optimization are critically important to online businesses.', 'ova-framework'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_prc_style1_1',
			[
				'label'   => __( 'Text Button 1', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Monthly', 'ova-framework'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_prc_style1_2',
			[
				'label'   => __( 'Text Button 2', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Yearly', 'ova-framework'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_prc_style1_3',
			[
				'label'   => __( 'Text Button 3', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Yearly', 'ova-framework'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'spacing_colum',
			[
				'label' => __('Spacing Bottom','ova-framework'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px'    => [
						'min'  => 0,
						'max'  => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .price-style-two' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pricing_style' => ['style2','style3']
				]
			]
		);

		$repeater2 = new Repeater();

		// Style2
		$repeater2->add_control(
			'background_prc_style2',
			[
				'label' => __('Background Table','ova-framework'),
				'type'  => Controls_Manager::COLOR,
				'default' => '#fff4f2',
			]
		);

		$repeater2->add_control(
			'title_package_st2',
			[
				'label'     => __('Title','ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Basic','ova-framework'),
			]
		);

		$repeater2->add_control(
			'price_package_st2',
			[
				'label'     => __('Price','ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'    => __('$09.00','ova-framework'),
			]
		);

		$repeater2->add_control(
			'background_package_st2',
			[
				'label'   => __( 'Background Image', 'ova-framework' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => OVA_PLUGIN_URI.'/assets/img/price-bg.png',
				],
			]
		);

		$repeater2->add_control(
			'list_plan_prc_st2',
			[
				'label' => __('Plan List','ova-framework'),
				'type'  => Controls_Manager::TEXTAREA,
				'description' => __( 'Example: [pricing_plan_li]One domain limited[/pricing_plan_li]','ova-framework' ),
			]
		);

		$repeater2->add_control(
			'button_prc_st2',
			[
				'label'   => __( 'Text Button', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('get it now', 'ova-framework'),
			]
		);

		$repeater2->add_control(
			'link_prc_st2',
			[
				'label'       => __( 'Link', 'ova-framework' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'items_list_prc_st2',
			[
				'label' => __('Add Plan List','ova-framework'),
				'type'  => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'title_package_st2' => __('Basic', 'ova-framework'),
						'price_package_st2,' => __('$09.00', 'ova-framework'),
					],
					[
						'title_package_st2' => __('Platinume', 'ova-framework'),
						'price_package_st2,' => __('$39.00', 'ova-framework'),
					],
					[
						'title_package_st2' => __('Platinume', 'ova-framework'),
						'price_package_st2,' => __('$99.00', 'ova-framework'),
					],																
				],
				'dynamic' => [
					'active' => true
				],
				'condition' => [
					'pricing_style' => 'style2'
				]
			]
		);
		//End Style2

		// Style3
		$repeater3 = new Repeater();

		$repeater3->add_control(
			'background_prc_style3',
			[
				'label' => __('Background Table','ova-framework'),
				'type'  => Controls_Manager::COLOR,
				'default' => '#fff4f2',
			]
		);

		$repeater3->add_control(
			'title_package_st3',
			[
				'label'     => __('Title','ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Basic','ova-framework'),
			]
		);

		$repeater3->add_control(
			'price_package_st3',
			[
				'label'     => __('Price','ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'    => __('$09.00','ova-framework'),
			]
		);

		$repeater3->add_control(
			'background_package_st3',
			[
				'label'   => __( 'Background Image', 'ova-framework' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => OVA_PLUGIN_URI.'/assets/img/price-single.png',
				],
			]
		);

		$repeater3->add_control(
			'list_plan_prc_st3',
			[
				'label' => __('Plan List','ova-framework'),
				'type'  => Controls_Manager::TEXTAREA,
				'description' => __( 'Example: [pricing_plan_li]One domain limited[/pricing_plan_li]','ova-framework' ),
			]
		);

		$repeater3->add_control(
			'button_prc_st3',
			[
				'label'   => __( 'Text Button', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('get it now', 'ova-framework'),
			]
		);

		$repeater3->add_control(
			'link_prc_st3',
			[
				'label'       => __( 'Link', 'ova-framework' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'items_list_prc_st3',
			[
				'label' => __('Add Plan List','ova-framework'),
				'type'  => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'title_package_st3' => __('Basic', 'ova-framework'),
						'price_package_st3,' => __('$09.00', 'ova-framework'),
					],
					[
						'title_package_st3' => __('Platinume', 'ova-framework'),
						'price_package_st3,' => __('$39.00', 'ova-framework'),
					],
					[
						'title_package_st3' => __('Platinume', 'ova-framework'),
						'price_package_st3,' => __('$99.00', 'ova-framework'),
					],																
				],
				'dynamic' => [
					'active' => true
				],
				'condition' => [
					'pricing_style' => 'style3'
				]
			]
		);
		//End Style3

		//Style4
		$repeater4 = new Repeater();

		$repeater4->add_control(
			'background_prc_style4',
			[
				'label' => __('Background Table','ova-framework'),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffeee9',
			]
		);

		$repeater4->add_control(
			'title_package_st4',
			[
				'label'     => __('Title','ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Basic','ova-framework'),
			]
		);

		$repeater4->add_control(
			'price_package_st4',
			[
				'label'   => __('Price','ova-framework'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('$09.00','ova-framework'),
			]
		);

		$repeater4->add_control(
			'per_time_st4',
			[
				'label'   => __('Per Time','ova-framework'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Mo','ova-framework')
			]
		);

		$repeater4->add_control(
			'background_package_st4',
			[
				'label'   => __( 'Background Image', 'ova-framework' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => OVA_PLUGIN_URI.'/assets/img/price-bg3.png',
				],
			]
		);

		$repeater4->add_control(
			'list_plan_prc_st4',
			[
				'label' => __('Plan List','ova-framework'),
				'type'  => Controls_Manager::TEXTAREA,
				'description' => __( 'Example: [pricing_plan_li]One domain limited[/pricing_plan_li], If the plan list is not in the package: [pricing_plan_li line="del"]One domain limited[/pricing_plan_li]','ova-framework' ),
			]
		);

		$repeater4->add_control(
			'button_prc_st4',
			[
				'label'   => __( 'Text Button', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('get it now', 'ova-framework'),
			]
		);

		$repeater4->add_control(
			'link_prc_st4',
			[
				'label'       => __( 'Link', 'ova-framework' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'items_list_prc_st4',
			[
				'label' => __('Add Plan List','ova-framework'),
				'type'  => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater4->get_controls(),
				'default' => [
					[
						'title_package_st4'  => __('Basic', 'ova-framework'),
						'price_package_st4,' => __('$39', 'ova-framework'),
					],
					[
						'title_package_st4'  => __('Platinume', 'ova-framework'),
						'price_package_st4,' => __('$69', 'ova-framework'),
					],
					[
						'title_package_st4'  => __('Platinume', 'ova-framework'),
						'price_package_st4,' => __('$49', 'ova-framework'),
					],																
				],
				'dynamic' => [
					'active' => true
				],
				'condition' => [
					'pricing_style' => 'style4'
				]
			]
		);
		//End Style4

		//Style5
		$repeater5 = new Repeater();

		$repeater5->add_control(
			'background_prc_style5',
			[
				'label' => __('Background Table','ova-framework'),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffeee9',
			]
		);

		$repeater5->add_control(
			'background_package_st5',
			[
				'label'   => __( 'Background Image', 'ova-framework' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => OVA_PLUGIN_URI.'/assets/img/price-bg.png',
				],
			]
		);

		$repeater5->add_control(
			'title_package_st5',
			[
				'label'     => __('Title','ova-framework'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Basic','ova-framework'),
			]
		);

		$repeater5->add_control(
			'price_package_st5',
			[
				'label'   => __('Price','ova-framework'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('$09.00','ova-framework'),
			]
		);

		$repeater5->add_control(
			'per_time_st5',
			[
				'label'   => __('Per Time','ova-framework'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Mo','ova-framework')
			]
		);

		$repeater5->add_control(
			'list_plan_prc_st5',
			[
				'label' => __('Plan List','ova-framework'),
				'type'  => Controls_Manager::TEXTAREA,
				'description' => __( 'Example: [pricing_plan_li]One domain limited[/pricing_plan_li], If the plan list is not in the package: [pricing_plan_li line="del"]One domain limited[/pricing_plan_li]','ova-framework' ),
			]
		);

		$repeater5->add_control(
			'button_prc_st5',
			[
				'label'   => __( 'Text Button', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('get it now', 'ova-framework'),
			]
		);

		$repeater5->add_control(
			'link_prc_st5',
			[
				'label'       => __( 'Link', 'ova-framework' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'items_list_prc_st5',
			[
				'label' => __('Add Plan List','ova-framework'),
				'type'  => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater4->get_controls(),
				'default' => [
					[
						'title_package_st5'  => __('Basic', 'ova-framework'),
						'price_package_st5,' => __('$39', 'ova-framework'),
					],
					[
						'title_package_st5'  => __('Platinume', 'ova-framework'),
						'price_package_st5,' => __('$69', 'ova-framework'),
					],
					[
						'title_package_st5'  => __('Platinume', 'ova-framework'),
						'price_package_st5,' => __('$49', 'ova-framework'),
					],																
				],
				'dynamic' => [
					'active' => true
				],
				'condition' => [
					'pricing_style' => 'style5'
				]
			]
		);

		//End Style5

		$this->end_controls_section();
		
		$this->start_controls_section(
			'our_pricing_month',
			[
				'label'     => __('Our Pricing Monthly','ova-framework'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'icon_img_mo',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => OVA_PLUGIN_URI.'/assets/img/price.png',
				],
			]
		);

		$this->add_control(
			'price_month',
			[
				'label'   => __( 'Price', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('$29', 'ova-framework'),
			]
		);

		$this->add_control(
			'per_time_month',
			[
				'label'   => __( 'Per Time', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('MO', 'ova-framework'),
			]
		);

		$this->add_control(
			'title_plan_month',
			[
				'label'   => __( 'Title Plan', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Startup Plan', 'ova-framework'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_plan_month',
			[
				'label' => __('Plan List','ova-framework'),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'text_button_month',
			[
				'label'   => __( 'Text Button', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('get it now', 'ova-framework'),
			]
		);

		$this->add_control(
			'link_month',
			[
				'label'       => __( 'Link', 'ova-framework' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'items_list_plan_month',
			[
				'label' => __('Add Plan List','ova-framework'),
				'type'  => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_plan_month' => __('10 Key Words Optimized', 'ova-framework')
					],
					[
						'list_plan_month' => __('3 Top 10 Ranking Guarantee', 'ova-framework')
					],
					[
						'list_plan_month' => __('Web site Analysis', 'ova-framework')
					],
					[
						'list_plan_month' => __('Keyword Research and Analysis', 'ova-framework')
					],
					[	
						'list_plan_month' => __('Fried Prawn Roll*', 'ova-framework')
					],
					[
						'list_plan_month' => __('Content Optimization', 'ova-framework')
					],						
				],
				'dynamic' => [
					'active' => true
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'our_pricing_year',
			[
				'label'     => __('Our Pricing Yearly','ova-framework'),
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'icon_img_yr',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => OVA_PLUGIN_URI.'/assets/img/price.png',
				],
			]
		);

		$this->add_control(
			'price_year',
			[
				'label'   => __( 'Price', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('$49', 'ova-framework'),
			]
		);

		$this->add_control(
			'per_time_year',
			[
				'label'   => __( 'Per Time', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('YR', 'ova-framework'),
			]
		);

		$this->add_control(
			'title_plan_year',
			[
				'label'   => __( 'Title Plan', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Yearly Plan', 'ova-framework'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_plan_year',
			[
				'label' => __('Plan List','ova-framework'),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'text_button_year',
			[
				'label'   => __( 'Text Button', 'ova-framework' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __('get it now', 'ova-framework'),
			]
		);

		$this->add_control(
			'link_year',
			[
				'label'       => __( 'Link', 'ova-framework' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'items_list_plan_year',
			[
				'label' => __('Add Plan List','ova-framework'),
				'type'  => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_plan_year' => __('10 Key Words Optimized', 'ova-framework')
					],
					[
						'list_plan_year' => __('3 Top 10 Ranking Guarantee', 'ova-framework')
					],
					[
						'list_plan_year' => __('Web site Analysis', 'ova-framework')
					],
					[
						'list_plan_year' => __('Keyword Research and Analysis', 'ova-framework')
					],
					[	
						'list_plan_year' => __('Fried Prawn Roll*', 'ova-framework')
					],
					[
						'list_plan_year' => __('Content Optimization', 'ova-framework')
					],						
				],
				'dynamic' => [
					'active' => true
				]
			]
		);		

		$this->end_controls_section();


		/***** Section Style ****/
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
				'name' => 'box_shadow_hover_style1',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .pricing-table-dig .pr-content .pr-tab.active-tab',
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'background_color_style1',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-column .col-inner' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		/* Style Title Plan */
		$this->add_control(
			'heading_style_title_plan',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_responsive_control(
			'title_plan_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig.style1 .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'title_plan_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig.style1 .heading' => 'color: {{VALUE}}',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'title_plan_typography',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig.style1 .heading',
		// 		'condition' => [
		// 			'pricing_style' => 'style1'
		// 		]
		// 	]
		// );
		/* END Style Title Plan */

		/* Style Description Plan */
		$this->add_control(
			'heading_style_desc_plan',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_responsive_control(
			'desc_plan_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig.style1 .desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'desc_plan_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig.style1 .desc p' => 'color: {{VALUE}}',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'desc_plan_typography',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig.style1 .desc p',
		// 		'condition' => [
		// 			'pricing_style' => 'style1'
		// 		]
		// 	]
		// );
		/* END Style Description Plan */

		/* Style 4 */
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover_style4',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .price-list-sec-style4 .single-price-list:hover',
				'condition' => [
					'pricing_style' => 'style4'
				]
			]
		);

		/* Style 5 */
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover_style5',
				'label' => __( 'Box Shadow', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .price-list-sec-style5 .col-inner:hover',
				'condition' => [
					'pricing_style' => 'style5'
				]
			]
		);


		/* Style Name */
		$this->add_control(
			'heading_style_name_plan',
			[
				'label' => __( 'Name', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'name_plan_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-head .name_plan' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .pricing-table-dig-2 .price-style-two .price-head-2 .name_plan' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-list-sec-style4 .single-price-list .price-head .name_plan' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-list-sec-style5 .col-inner .title-head .name_plan' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'name_plan_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-head .name_plan' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-table-dig-2 .price-style-two .price-head-2 .name_plan' => 'color: {{VALUE}}',
					'{{WRAPPER}} .price-list-sec-style4 .single-price-list .price-head .name_plan' => 'color: {{VALUE}}',
					'{{WRAPPER}} .price-list-sec-style5 .col-inner .title-head .name_plan' => 'color: {{VALUE}}',
				],
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'name_plan_typography_style1',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig .price-head .name_plan',
		// 		'condition' => [
		// 			'pricing_style' => 'style1'
		// 		]
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'name_plan_typography_style_2',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig-2 .price-style-two .price-head-2 .name_plan',
		// 		'condition' => [
		// 			'pricing_style' => [
		// 				'style2',
		// 				'style3'
		// 			]
		// 		]
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'name_plan_typography_style4',
		// 		'selector' => '{{WRAPPER}} .price-list-sec-style4 .single-price-list .price-head .name_plan',
		// 		'condition' => [
		// 			'pricing_style' => 'style4'
		// 		]
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'name_plan_typography_style5',
		// 		'selector' => '{{WRAPPER}} .price-list-sec-style5 .col-inner .title-head .name_plan',
		// 		'condition' => [
		// 			'pricing_style' => 'style5'
		// 		]
		// 	]
		// );
		/* END Style Name */


		/* Style Price Name */
		$this->add_control(
			'heading_style_price_plan',
			[
				'label' => __( 'Price', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'price_plan_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-head .price_plan' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'price_plan_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-head .price_plan' => 'color: {{VALUE}}',
				],
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'price_plan_typography',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig .price-head .price_plan',
		// 	]
		// );
		/* END Style Price Name */


		/* Style Per Time */
		$this->add_control(
			'heading_style_per_time',
			[
				'label' => __( 'Per Time', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'pricing_style' => ['style1', 'style4', 'style5']
				],
			]
		);

		$this->add_responsive_control(
			'per_time_margin',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-head .price_plan small' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-list-sec-style4 .single-price-list .price-head .price_plan small' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .price-list-sec-style5 .col-inner .price-body .price_plan small' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pricing_style' => ['style1', 'style4', 'style5']
				],
			]
		);

		$this->add_control(
			'per_time_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .price-head .price_plan small' => 'color: {{VALUE}}',
					'{{WRAPPER}} .price-list-sec-style4 .single-price-list .price-head .price_plan small' => 'color: {{VALUE}}',
					'{{WRAPPER}} .price-list-sec-style5 .col-inner .price-body .price_plan small' => 'color: {{VALUE}}',
				],
				'condition' => [
					'pricing_style' => ['style1', 'style4', 'style5']
				],
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'per_time_typography',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig .price-head .price_plan',
		// 	]
		// );
		/* END Style Per Time */


		/* Style Button */
		$this->add_control(
			'heading_style_button_plan',
			[
				'label' => __( 'Button', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_plan_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-table-dig .tab-btn.active-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-table-dig-2 .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style4 .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style5 .btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_plan_color_hover',
			[
				'label' => __( 'Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-table-dig .tab-btn.active-btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pricing-table-dig-2 .btn:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style4 .btn:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style5 .btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_plan_background',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .pricing-table-dig .tab-btn.active-btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .pricing-table-dig-2 .btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style4 .btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style5 .btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_plan_background_hover',
			[
				'label' => __( 'Background Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .pricing-table-dig .tab-btn.active-btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .pricing-table-dig-2 .btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style4 .btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}} .price-list-sec-style5 .btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'button_plan_typography',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig .btn',

		// 	]
		// );
		/* END Style Button */


		/* Style Button Not Active */
		$this->add_control(
			'heading_style_button_not_active',
			[
				'label' => __( 'Button Not Active', 'ova-framework' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_not_active_color',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .tab-btn' => 'color: {{VALUE}}',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_not_active_color_hover',
			[
				'label' => __( 'Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .tab-btn:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_not_active_background',
			[
				'label' => __( 'Background', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .tab-btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'button_not_active_background_hover',
			[
				'label' => __( 'Background Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table-dig .tab-btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'condition' => [
					'pricing_style' => 'style1'
				]
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'button_not_active_typography',
		// 		'selector' => '{{WRAPPER}} .pricing-table-dig .tab-btn',
		// 		'condition' => [
		// 			'pricing_style' => 'style1'
		// 		]
		// 	]
		// );
		/* END Style Button Not Active */

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$title_prc_style1    = $settings['title_prc_style1'] != '' ? $settings['title_prc_style1'] : '';
		$desc_prc_style1     = $settings['desc_prc_style1'] != '' ? $settings['desc_prc_style1'] : '';
		$button_prc_style1_1 = $settings['button_prc_style1_1'] != '' ? $settings['button_prc_style1_1'] : '';
		$button_prc_style1_2 = $settings['button_prc_style1_2'] != '' ? $settings['button_prc_style1_2'] : '';
		$button_prc_style1_3 = $settings['button_prc_style1_3'] != '' ? $settings['button_prc_style1_3'] : '';

		
		//Tab Content Monthly
		if ( !empty( $settings['icon_img_mo']['url'] ) ) {
			$this->add_render_attribute( 'icon_img_mo', 'src', $settings['icon_img_mo']['url'] );
			$this->add_render_attribute( 'icon_img_mo', 'alt', Control_Media::get_image_alt( $settings['icon_img_mo'] ) );

			$image_mo = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'icon_img_mo' );

		}

		$price_month       = $settings['price_month'] != '' ? $settings['price_month'] : '';
		$per_time_month    = $settings['per_time_month'] != '' ? $settings['per_time_month'] : ''; 
		$title_plan_month  = $settings['title_plan_month'] != '' ? $settings['title_plan_month'] : ''; 
		$text_button_month = $settings['text_button_month'] != '' ? $settings['text_button_month'] : ''; 
		$target_month      = $settings['link_month']['is_external'] ? ' target="_blank"' : '';
		$nofollow_month    = $settings['link_month']['nofollow'] ? ' rel="nofollow"' : '';

		//Tab Content Yearly

		if ( !empty( $settings['icon_img_yr']['url'] ) ) {
			$this->add_render_attribute( 'icon_img_yr', 'src', $settings['icon_img_yr']['url'] );
			$this->add_render_attribute( 'icon_img_yr', 'alt', Control_Media::get_image_alt( $settings['icon_img_yr'] ) );

			$image_yr = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'icon_img_yr' );

		}

		$price_year       = $settings['price_year'] != '' ? $settings['price_year'] : '';
		$per_time_year    = $settings['per_time_year'] != '' ? $settings['per_time_year'] : ''; 
		$title_plan_year  = $settings['title_plan_year'] != '' ? $settings['title_plan_year'] : ''; 
		$text_button_year = $settings['text_button_year'] != '' ? $settings['text_button_year'] : ''; 
		$target_year      = $settings['link_year']['is_external'] ? ' target="_blank"' : '';
		$nofollow_year    = $settings['link_year']['nofollow'] ? ' rel="nofollow"' : '';

		?>
		<?php if( $settings['pricing_style'] == 'style1'){ ?> 
			<section class="pricing-table-dig style1">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="pr-content">
								<div class="price-column pr-tab active-tab" id="<?php echo esc_attr($button_prc_style1_1);?>-tab">
									<div class="col-inner">
										<div class="p-icon">
											<?php echo $image_mo;?>
										</div>
										<div class="price-head">
											<h2 class="price_plan"><?php echo esc_html($price_month);?><small>/<?php echo esc_html($per_time_month);?></small></h2>
											<h3 class="name_plan"><?php echo esc_html($title_plan_month);?></h3>
										</div>
										<div class="price-body">
											<ul>
												<?php foreach ($settings['items_list_plan_month'] as $key => $value) { ?>
													<li><?php echo esc_html($value['list_plan_month']);?></li>
												<?php } ?>
											</ul>
											<a href="<?php echo esc_url($settings['link_month']['url']);?>" <?php echo $target_month . $nofollow_month;?> class="btn btn1 style4"><?php echo esc_html($text_button_month);?></a>
										</div>
									</div><!--/.col-inner-->
								</div>

								<div class="price-column pr-tab" id="<?php echo esc_attr($button_prc_style1_2);?>-tab">
									<div class="col-inner">
										<div class="p-icon">
											<?php echo $image_yr;?>
										</div>
										<div class="price-head">
											<h2 class="price_plan"><?php echo esc_html($price_year);?><small>/<?php echo esc_html($per_time_year);?></small></h2>
											<h3 class="name_plan"><?php echo esc_html($title_plan_year);?></h3>
										</div>
										<div class="price-body">
											<ul>
												<?php foreach($settings['items_list_plan_year'] as $value) : ?>
													<li><?php echo esc_html($value['list_plan_year'])?></li>
												<?php endforeach; ?>
											</ul>
											<a href="<?php echo esc_url($settings['link_year']['url']);?>" <?php echo $target_year . $nofollow_year;?> class="btn btn1 style4"><?php echo esc_html($text_button_year);?></a>
										</div>
									</div><!--/.col-inner-->
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row h-100">
								<div class="col-md-12 align-self-center">
									<div class="price-title">
										<?php if( $title_prc_style1 != '' ) : ?>
											<h3 class="heading"><?php echo esc_html($title_prc_style1);?></h3>
										<?php endif; ?>
										<?php if( $desc_prc_style1 != '' ) : ?>
											<div class="desc"><?php echo $desc_prc_style1;?></div>
										<?php endif;?>
										<ul class="tab-btns clearfix">
											<li class="tab-btn active-btn" data-tab="#<?php echo esc_attr($button_prc_style1_1);?>-tab"><?php echo esc_html($button_prc_style1_1);?></li>
											<li class="tab-btn" data-tab="#<?php echo esc_attr($button_prc_style1_2);?>-tab"><?php echo esc_html($button_prc_style1_2);?></li>
										</ul>
									</div><!--/.price-title-->
								</div>
							</div>

						</div>
					</div>
				</div><!--/.container-->
			</section>
		<?php } elseif( $settings['pricing_style'] == 'style2'){ ?>
			<section class="pricing-table-dig-2 ">
				<div class="container">
					<div class="row">
						<?php foreach ($settings['items_list_prc_st2'] as $value) {
							if ( !empty( $value['background_package_st2']['url'] ) ) {
								$this->add_render_attribute( 'background_package_st2', 'src', $value['background_package_st2']['url'] );
								$this->add_render_attribute( 'background_package_st2', 'alt', Control_Media::get_image_alt( $value['background_package_st2'] ) );

								$bgr_image_st2 = Group_Control_Image_Size::get_attachment_image_html( $value, 'thumbnail', 'background_package_st2' );

							}
							$target_prc   = $value['link_prc_st2']['is_external'] ? ' target="_blank"' : '';
							$nofollow_prc = $value['link_prc_st2']['nofollow'] ? ' rel="nofollow"' : '';
							$bgr_st2      = $value['background_prc_style2'] != '' ? $value['background_prc_style2'] : '';
							?>
							<div class="col-md-4">
								<div class="price-style-two" <?php if( $bgr_st2 != '') : ?> style="background: <?php echo esc_attr($bgr_st2);?>" <?php endif;?>>
									<div class="price-head-2">
										<h4 class="name_plan"><?php echo esc_html($value['title_package_st2']);?></h4>
										<h3 class="price_plan"><?php echo esc_html($value['price_package_st2']);?></h3>
										<?php echo $bgr_image_st2; ?>
									</div>
									<div class="price-body-2">
										<ul>
											<?php echo do_shortcode( $value['list_plan_prc_st2'] );  ?>
										</ul>
										<a href="<?php echo esc_url($value['link_prc_st2']['url']);?>" <?php echo $target_prc . $nofollow_prc;?> class="btn btn1 style4"><?php echo esc_html($value['button_prc_st2']);?></a>
									</div>
								</div><!--/.price-style-two-->
							</div>
						<?php } ?>
					</div>
				</div><!--/.container-->
			</section>
		<?php } elseif( $settings['pricing_style'] == 'style3'){ ?>
			<section class="pricing-table-dig-2 style3">
				<div class="container">
					<div class="row">
						<?php foreach ($settings['items_list_prc_st3'] as $value) {
							if ( !empty( $value['background_package_st3']['url'] ) ) {
								$this->add_render_attribute( 'background_package_st3', 'src', $value['background_package_st3']['url'] );
								$this->add_render_attribute( 'background_package_st3', 'alt', Control_Media::get_image_alt( $value['background_package_st3'] ) );

								$bgr_image_st2 = Group_Control_Image_Size::get_attachment_image_html( $value, 'thumbnail', 'background_package_st3' );

							}
							$target_prc   = $value['link_prc_st3']['is_external'] ? ' target="_blank"' : '';
							$nofollow_prc = $value['link_prc_st3']['nofollow'] ? ' rel="nofollow"' : '';
							$bgr_st3      = $value['background_prc_style3'] != '' ? $value['background_prc_style3'] : '';

							?>
							<div class="col-md-4">
								<div class="price-style-two" <?php if( $bgr_st3 != '') : ?> style="background: <?php echo esc_attr($bgr_st3);?>" <?php endif;?>>
									<div class="price-head-2">
										<h4 class="name_plan"><?php echo esc_html($value['title_package_st3']);?></h4>
										<h3 class="price_plan"><?php echo esc_html($value['price_package_st3']);?></h3>
										<?php echo $bgr_image_st2; ?>
									</div>
									<div class="price-body-2">
										<ul>
											<?php echo do_shortcode( $value['list_plan_prc_st3'] );  ?>
										</ul>
										<a href="<?php echo esc_url($value['link_prc_st3']['url']);?>" <?php echo $target_prc . $nofollow_prc;?> class="btn btn1 style4"><?php echo esc_html($value['button_prc_st3']);?></a>
									</div>
								</div><!--/.price-style-two-->
							</div>
						<?php } ?>
					</div>
				</div><!--/.container-->
			</section>
		<?php } elseif( $settings['pricing_style'] == 'style4' ){ ?>
			<section class="price-list-sec-style4">
				<div class="container">
					<div class="row">
						<?php foreach ($settings['items_list_prc_st4'] as $value) {
							if ( !empty( $value['background_package_st4']['url'] ) ) {
								$this->add_render_attribute( 'background_package_st4', 'src', $value['background_package_st4']['url'] );
								$this->add_render_attribute( 'background_package_st4', 'alt', Control_Media::get_image_alt( $value['background_package_st4'] ) );

								$bgr_image_st2 = Group_Control_Image_Size::get_attachment_image_html( $value, 'thumbnail', 'background_package_st4' );

							}
							$target_prc   = $value['link_prc_st4']['is_external'] ? ' target="_blank"' : '';
							$nofollow_prc = $value['link_prc_st4']['nofollow'] ? ' rel="nofollow"' : '';
							$bgr_st4      = $value['background_prc_style4'] != '' ? $value['background_prc_style4'] : '';

							?>
							<div class="col-md-4">
								<div class="single-price-list" <?php if( $bgr_st4 != '') : ?> style="background: <?php echo esc_attr($bgr_st4);?>" <?php endif;?>>
									<div class="price-head" style="background-image: url(<?php echo esc_url($value['background_package_st4']['url']);?>);">
										<h4 class="name_plan"><?php echo esc_html($value['title_package_st4']);?></h4>
										<h2 class="price_plan"><?php echo esc_html($value['price_package_st4']);?><small>/<?php echo esc_html($value['per_time_st4']);?></small></h2>
									</div>
									<div class="price-body">
										<ul>
											<?php echo do_shortcode( $value['list_plan_prc_st4'] ); ?>
										</ul>
										<a href="<?php echo esc_url($value['link_prc_st4']['url']);?>" <?php echo $target_prc . $nofollow_prc;?> class="btn"><?php echo esc_html($value['button_prc_st4']);?></a>
									</div>
								</div><!--/.single-price-list-->
							</div>
						<?php } ?>
					</div>
				</div><!--/.container-->
			</section>
		<?php } elseif( $settings['pricing_style'] == 'style5' ){
			?>
			<section class="price-list-sec-style5">
				<div class="container">
					<div class="row">
						<?php foreach ($settings['items_list_prc_st5'] as $value) {
							if ( !empty( $value['background_package_st5']['url'] ) ) {
								$this->add_render_attribute( 'background_package_st5', 'src', $value['background_package_st5']['url'] );
								$this->add_render_attribute( 'background_package_st5', 'alt', Control_Media::get_image_alt( $value['background_package_st5'] ) );

								$bgr_image_st5 = Group_Control_Image_Size::get_attachment_image_html( $value, 'thumbnail', 'background_package_st5' );

							}
							$target_prc   = $value['link_prc_st5']['is_external'] ? ' target="_blank"' : '';
							$nofollow_prc = $value['link_prc_st5']['nofollow'] ? ' rel="nofollow"' : '';
							$bgr_st5      = $value['background_prc_style5'] != '' ? $value['background_prc_style5'] : '';

							?>
							<div class="col-md-4">
								<div class="col-inner" <?php if( $bgr_st5 != '') : ?> style="background: <?php echo esc_attr($bgr_st5);?>" <?php endif;?>>
									<div class="p-icon">
										<?php echo $bgr_image_st5;?>                   
									</div>
									<div class="title-head">
										<h3 class="name_plan"><?php echo esc_html($value['title_package_st5']);?></h3>
									</div>
									<div class="price-body">
										<ul>
											<?php echo do_shortcode( $value['list_plan_prc_st5'] ); ?>
										</ul>
										<h4 class="price_plan"><?php echo esc_html($value['price_package_st5']);?><small>/<?php echo esc_html($value['per_time_st5']);?></small></h4>
										<a href="<?php echo esc_url($value['link_prc_st5']['url']);?>" <?php echo $target_prc . $nofollow_prc;?> class="btn"><?php echo esc_html($value['button_prc_st5']);?></a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
}
