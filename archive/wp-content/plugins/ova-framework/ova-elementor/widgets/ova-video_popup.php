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
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; 

class video_popup extends Widget_Base {


	public function get_name() {
		return 'video_popup';
	}

	public function get_title() {
		return __( 'Video Popup', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}


	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		wp_enqueue_script( 'video-popup', OVA_PLUGIN_URI.'assets/libs/video.popup.js', array('jquery'), false, true );
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
			'link',
			[
				'label' => __( 'Link Youtube', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'image_bgr',
			[
				'label'   => __( 'Image', 'ova-framework' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title_vd',
			[
				'label'   => __('Title','ova-framework'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Watch How We Work','ova-framework')
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'        => __( 'Show Title', 'ova-framework' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ova-framework' ),
				'label_off'    => __( 'Hide', 'ova-framework' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .video-player-work .video-inside-work h3',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Color Title', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-player-work .video-inside-work h3' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .video-player-work .video-inside-work h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bgr_overlay',
			[
				'label'   => __('Background Overlay','ova-framework'),
				'type'    => Controls_Manager::COLOR,
				'default' => '#efbbab',
				'selectors' => [
					'{{WRAPPER}} .video-player-work:after' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'   => __('Color Icon','ova-framework'),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-player-work .video-inside-work #video i' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label'   => __('Color Icon Hover','ova-framework'),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-player-work .video-inside-work #video:hover i' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label'   => __('Background','ova-framework'),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-player-work .video-inside-work #video' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label'   => __('Background Hover','ova-framework'),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-player-work .video-inside-work #video:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		
	}

	protected function render() {
		$settings = $this->get_settings();

		?>

		<section class="video-player-work" style="background: url(<?php echo esc_attr($settings['image_bgr']['url']);?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="video-inside-work">
							<a id="video" class="btn" video-url="<?php echo esc_url($settings['link']);?>" style="cursor: pointer;"> <i class="fas fa-play fa-2x"></i></a>
							<?php if( $settings['show_title'] == 'yes' ) : ?>
								<h3><?php echo esc_html($settings['title_vd']);?></h3>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	<?php }

}
