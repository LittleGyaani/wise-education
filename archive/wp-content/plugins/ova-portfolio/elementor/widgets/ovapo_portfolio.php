<?php
namespace ovapo_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ovapo_portfolio extends Widget_Base {

	public function get_name() {
		return 'ovapo_portfolio';
	}

	public function get_title() {
		return __( 'Portfolio', 'ova-portfolio' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		wp_enqueue_script('imagesLoaded', OVAPO_PLUGIN_URI.'/assets/js/libs/imagesloaded.pkgd.min.js', array('jquery'), null, true);
		wp_enqueue_script( 'isotop', OVAPO_PLUGIN_URI.'assets/js/libs/isotop.js', array('jquery'), false, true );
		
		
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-portfolio' ),
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => __( 'Total Portfolio', 'ova-portfolio' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8
			]
		);

		$this->add_control(
			'columns',
			[
				'label'   => __('Columns in rows','ova-portfolio'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'2_columns' => __('2 Columns','ova-portfolio'),
					'3_columns' => __('3 Columns','ova-portfolio'),
				],
				'default' => '3_columns'
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => __( 'Order By', 'ova-portfolio' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => __( 'Date', 'ova-portfolio' ),
					'time' => __( 'Time', 'ova-portfolio' ),
					'ID'   => __( 'ID', 'ova-portfolio' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __( 'Order', 'ova-portfolio' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => __( 'Increase', 'ova-portfolio' ),
					'DESC' => __( 'Decrease', 'ova-portfolio' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_fillter',
			[
				'label' => __( 'Fillter Nav', 'ova-portfolio' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'fillter_nav_typography',
					'selector' => '{{WRAPPER}} .portfolio-page-si.element .button-group button',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

		$this->add_responsive_control(
			'fillter_padding',
			[
				'label'      => __( 'Padding', 'ova-portfolio' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-page-si.element .button-group button ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'fillter_color',
			[
				'label'     => __( 'Color', 'ova-portfolio' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#43464b',
				'selectors' => [
					'{{WRAPPER}} .portfolio-page-si.element .button-group button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'fillter_color_hover',
			[
				'label'     => __( 'Hover Color', 'ova-portfolio' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f16334',
				'selectors' => [
					'{{WRAPPER}} .portfolio-page-si.element .button-group button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'fillter_color_active',
			[
				'label'     => __( 'Color Active', 'ova-portfolio' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f16334',
				'selectors' => [
					'{{WRAPPER}} .portfolio-page-si .button-group button.is-checked' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Content', 'ova-portfolio' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'        => __( 'Show Title', 'ova-portfolio' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ova-portfolio' ),
				'label_off'    => __( 'Hide', 'ova-portfolio' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'selector' => '{{WRAPPER}} .portfolio-page-si .grid .grid-item h2.titles',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => __( 'Padding', 'ova-portfolio' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-page-si .grid .grid-item h2.titles' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Color', 'ova-portfolio' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .portfolio-page-si .grid .grid-item h2.titles' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bgr_overlay',
			[
				'label'     => __('Background Overlay','ova-portfolio'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#43464b',
				'selectors' => [
					'{{WRAPPER}} .portfolio-page-si .item-inner:hover .overlay::before' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __('Icon Color','ova-portfolio'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .portfolio-page-si .item-inner .overlay .view-list:before, {{WRAPPER}} .portfolio-page-si .item-inner .overlay .view-list:after' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		$args_base = array(
			'post_type'      => 'portfolio',
			'post_status'    => 'publish',
			'order'          => $settings['order'],
			'orderby'        => $settings['orderby'],
			'posts_per_page' => $settings['total_count'],
		);

		$portfolio  = new \WP_Query($args_base);

		$columns = '';

		if( $settings['columns'] == '2_columns' ){
			$columns = 'col-md-6';
		} elseif( $settings['columns'] == '3_columns' ){
			$columns = 'col-md-4';
		} 

		?>
		<div class="portfolio-page-si element">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!--filter-->
						<div class="button-group filter-button-group">
							<?php
							$terms = get_terms('portfolio_category');
							$count = count($terms);
							echo '<button class="is-checked" data-filter="*">all</button>';
							if ( $count > 0 ){					 
								foreach ( $terms as $term ) {					 
									$termname = strtolower($term->name);
									$termname = str_replace(' ', '-', $termname);
									echo '<button data-filter=".'.$termname.'" class="">'.$term->name.'</button>';
								}
							}
							?>	                              
						</div>
						<!-- /filter-->
					</div>
					<div class="col-md-12">
						<div class="grid"><div class="row">
							<?php 
							if( $portfolio->have_posts() ) : while( $portfolio->have_posts() ) : $portfolio->the_post();

								$img_src = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' );
								$img_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), 'medium' );
								$terms = get_the_terms( get_the_ID(), 'portfolio_category' );

								if ( $terms && ! is_wp_error( $terms ) ) : 
									
									$links = array();
									
									foreach ( $terms as $term ) {
										$links[] = $term->name;
									}
									
									$tax_links = join( " ", str_replace(' ', '-', $links));          
									$tax = strtolower($tax_links);
								else :	
									$tax = '';					
								endif; 

								?>

								<div class="<?php echo esc_attr($columns);?> grid-item <?php echo esc_attr($tax);?>" data-category="<?php echo esc_attr($tax);?>">
									<div class="item-inner text-center">
										<?php if( $settings['show_title'] == 'yes' ) : ?>
											<h2 class="titles"><?php the_title();?></h2>
										<?php endif; ?>
										<?php if( $img_src != '' ) : ?>
											<img src="<?php echo $img_src;?>" srcset="<?php echo $img_srcset;?>" sizes="(max-width: 600px) 100vw, 600px" alt="<?php the_title();?>">
										<?php endif; ?>
										<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="item popup-link">
											<div class="overlay">
												<div class="view-list"></div>
											</div>
										</a>
									</div>
								</div>

							<?php endwhile; ?>
						</div></div>
					</div>
					<?php else: ?>
						<div class="search_not_found">
							<?php esc_html_e( 'Not Found Portfolio', 'ova-portfolio' ); ?>
						</div>
					<?php endif; wp_reset_postdata(); ?>
					
				</div>
			</div>
		</div>
		<?php
	}
}
