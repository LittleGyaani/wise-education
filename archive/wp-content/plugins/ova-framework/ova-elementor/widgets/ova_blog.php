<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_blog extends Widget_Base {

	public function get_name() {
		return 'ova_blog';
	}

	public function get_title() {
		return __( 'Blog', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

		$args = array(
			'orderby' => 'name',
			'order' => 'ASC'
		);

		$categories=get_categories($args);
		$cate_array = array();
		$arrayCateAll = array( 'all' => 'All categories ' );
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->slug;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}



		//SECTION CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge($arrayCateAll,$cate_array),
			]
		);

		$this->add_control(
			'total_count',
			[
				'label' => __( 'Total Post', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'number_title',
			[
				'label' => __( 'Number Word Title', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 14,
			]
		);


		$this->add_control(
			'order_by',
			[
				'label' => __('Order By', 'ova-framework'),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __('ASC', 'ova-framework'),
					'desc' => __('DESC', 'ova-framework'),
				]
			]
		);

		$this->add_control(
			'text_read_more',
			[
				'label' => __( 'Text Read More', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('Read More', 'ova-framework'),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'flaticon-right-arrow',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label' => __( 'Show Date', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-framework' ),
				'label_off' => __( 'Hide', 'ova-framework' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_cat',
			[
				'label' => __( 'Show Categories', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-framework' ),
				'label_off' => __( 'Hide', 'ova-framework' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-framework' ),
				'label_off' => __( 'Hide', 'ova-framework' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);



		$this->add_control(
			'show_read_more',
			[
				'label' => __( 'Show Reada More', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-framework' ),
				'label_off' => __( 'Hide', 'ova-framework' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
		//END SECTION CONTENT



		//SECTION TAB STYLE CATEGORIES
		$this->start_controls_section(
			'section_cat',
			[
				'label' => __( 'Categories', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .ova-blog .single-blog-dig h6 a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_cat',
			[
				'label' => __( 'Color Categories', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .single-blog-dig h6 a' => 'color : {{VALUE}};border-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_cat_hover',
			[
				'label' => __( 'Color Cat Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .single-blog-dig h6 a:hover' => 'color : {{VALUE}};border-color : {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE CATEGORIES


		

		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body h4 a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Color Title', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body h4 a' => 'color : {{VALUE}};border-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => __( 'Color Title Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body h4 a:hover' => 'color : {{VALUE}};border-color : {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		
		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => __( 'Read More', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body .readmore',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_readmore',
			[
				'label' => __( 'Color Read More', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body .readmore' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body .readmore i' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_readmore_hover',
			[
				'label' => __( 'Color Read More Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body .readmore:hover' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-blog .single-blog-dig .card .card-body .readmore:hover i' => 'color : {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$category = $settings['category'];
		$total_count = $settings['total_count'];
		$order = $settings['order_by'];

		$number_title = $settings['number_title'] ? $settings['number_title'] : 8;

		$args = [];
		if ($category == 'all') {
			$args=[
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		} else {
			$args=[
				'post_type' => 'post', 
				'category_name'=>$category,
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		}

		$blog = new \WP_Query($args);

		?>
		<div class="ova-blog">

			<?php
			if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();
				$thumbnail_url = wp_get_attachment_image_url(get_post_thumbnail_id() , 'digitax_thumb_blog' );
				?>

				<div class="single-blog-dig">
					<div class="card">
						<?php if ($settings['show_date'] === 'yes') : ?>
						<span class="post-date">
							<span class="day"><?php the_time('dS');?></span>
							<span class="month"><?php the_time('M');?></span>
						</span>
						<?php endif ?>
						<img src="<?php echo esc_attr($thumbnail_url) ?>" alt="<?php echo esc_attr(get_the_title()) ?>">
						<div class="card-body">

							<?php if ($settings['show_cat'] === 'yes') : ?>
								<h6><?php echo the_category('&sbquo;&nbsp;'); ?></h6>
							<?php endif ?>
							<?php if ($settings['show_title'] === 'yes') : ?>
								<h4><a href="<?php echo esc_attr(get_the_permalink()) ?>"><?php echo esc_html(digitax_custom_text(get_the_title(), $number_title)); ?></a></h4>
							<?php endif ?>
							<?php if ($settings['show_read_more'] === 'yes') : ?>
								<a href="<?php echo esc_attr(get_the_permalink()) ?>" class="btn readmore"><?php echo esc_html($settings['text_read_more'])?><i class="<?php echo esc_attr($settings['icon']) ?>"></i> <i class="<?php echo esc_attr($settings['icon']) ?>"></i></a>
							<?php endif ?>

						</div>
					</div>
				</div>



				<?php
			endwhile; endif; wp_reset_postdata();
			?>

		</div>
		<?php
	}
}
