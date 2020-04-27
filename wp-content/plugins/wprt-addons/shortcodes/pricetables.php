<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $prices_html = $url = $link = '';

extract( shortcode_atts( array(
	'style' => 'two',
	'gutter' => '',
	'pricebox' => ''
), $atts ) );

$cls = $style;
if ( $gutter ) $cls .= ' gutter';

$pricebox = (array) vc_param_group_parse_atts( $pricebox );

$prices_html .= '<div class="pricing-content">';
$prices_html .='<div class="pricing-boxs clearfix">';
$count = 0;
foreach ( $pricebox as $data ) {
	$count++;
 	$data['top_margin'] = isset( $data['top_margin'] ) ? $data['top_margin'] : '';
 	$data['background'] = isset( $data['background'] ) ? $data['background'] : '';
 	$data['border'] = isset( $data['border'] ) ? $data['border'] : '';
	$data['rounded'] = isset( $data['rounded'] ) ? intval($data['rounded']) : '';
 	$data['shadow'] = isset( $data['shadow'] ) ? $data['shadow'] : '';
 	$data['heading'] = isset( $data['heading'] ) ? $data['heading'] : '';
	$data['heading_color'] = isset( $data['heading_color'] ) ? $data['heading_color'] : 'default';


	$data['price_padding'] = isset( $data['price_padding'] ) ? $data['price_padding'] : '';
	$data['pre_price'] = isset( $data['pre_price'] ) ? $data['pre_price'] : '';
	$data['price'] = isset( $data['price'] ) ? $data['price'] : '';
	$data['text'] = isset( $data['text'] ) ? $data['text'] : '';
	$data['features_padding'] = isset( $data['features_padding'] ) ? $data['features_padding'] : '';
	$data['features'] = isset( $data['features'] ) ? $data['features'] : '';
	$data['button_style'] = isset( $data['button_style'] ) ? $data['button_style'] : 'accent';
	$data['button_content'] = isset( $data['button_content'] ) ? $data['button_content'] : '';
	$data['button_url'] = isset( $data['button_url'] ) ? $data['button_url'] : '';
	$data['button_new_tab'] = isset( $data['button_new_tab'] ) ? $data['button_new_tab'] : 'yes';
	$data['button_rounded'] = isset( $data['button_rounded'] ) ? intval($data['button_rounded']) : '';
	$data['border_width'] = isset( $data['border_width'] ) ? intval($data['border_width']) : '';

	$data['button_text'] = isset( $data['button_text'] ) ? $data['button_text'] : '';
	$data['button_background'] = isset( $data['button_background'] ) ? $data['button_background'] : '';
	$data['button_border'] = isset( $data['button_border'] ) ? $data['button_border'] : '';
	$data['button_text_hover'] = isset( $data['button_text_hover'] ) ? $data['button_text_hover'] : '';
	$data['button_background_hover'] = isset( $data['button_background_hover'] ) ? $data['button_background_hover'] : '';
	$data['button_border_hover'] = isset( $data['button_border_hover'] ) ? $data['button_border_hover'] : '';

	$rand = rand();
	$btn_cls = 'rounded-30 btn-'. $rand;
	$btn_data = '';
	$h_cls = '';
	$btn_css = '';
	$cls_item = '';
	$css_item = '';
	$price_css = '';
	$features_css = '';

	if ( $data['top_margin'] ) $css_item .= 'margin-top:'. $data['top_margin'] .';';
	if ( $data['background'] ) $css_item .= 'background-color:'. $data['background'] .';';
	if ( $data['border'] ) $css_item .= 'border:'. $data['border'] .';';
	if ( $data['rounded'] ) $css_item .= 'border-radius:'. $data['rounded'] .'px;';
	if ( $data['heading_color'] ) $h_cls .= $data['heading_color'];
	if ( $data['button_rounded'] ) $btn_css .= 'border-radius:'. $data['button_rounded'] .'px;';
	if ( $data['border_width'] ) $btn_css .= 'border-width:'. $data['border_width'] .'px;';

	if ( $data['shadow'] ) $cls_item .= ' '. $data['shadow'];

	if ( $data['price_padding'] ) $price_css .= 'padding:'. $data['price_padding'] .';';
	if ( $data['features_padding'] ) $features_css .= 'padding:'. $data['features_padding'] .';';

	$prices_html .= '<div class="pricing-item '. $cls_item .'" style="'. $css_item .'">';
 	
	 	if ( $data['heading'] ) $prices_html .= '<div class="title '. $h_cls .'"><h3>'. $data['heading'] .'</h3></div>';

		if ( $data['price'] ) $prices_html .= '<div class="price-wrap" style="'. $price_css .'"><span class="pre-price">'. $data['pre_price'] .'</span><span class="figure">'. $data['price'] .'</span><span class="term">'. $data['text'] .'</span></div>';

		if ( $data['features'] ) $prices_html .= '<div class="features" style="'. $features_css .'">'. $data['features'] .'</div>';

		if ( $data['button_content'] ) {

			if ( $data['button_text'] ) $btn_data .= ' data-text="'. $data['button_text'] .'"';

			if ( $data['button_background'] == '#f35c27' ) {
				$btn_cls .= ' accent';
			} else {
				$btn_cls .= ' custom';
				$btn_data .= ' data-background="'. $data['button_background'] .'"';
			}

			if ( $data['border_width'] ) {
				$btn_cls .= ' outline solid';

				if ( $data['button_border'] == '#f35c27' ) {
					$btn_cls .= ' outline-accent';
				} else {
					$btn_cls .= ' custom';
					$btn_data .= ' data-border="'. $data['button_border'] .'"';
				}
			}

			if ( $data['button_text_hover'] ) $btn_data .= ' data-text-hover="'. $data['button_text_hover'] .'"';
			if ( $data['button_background_hover'] ) $btn_data .= ' data-background-hover="'. $data['button_background_hover'] .'"';
			if ( $data['button_border_hover'] ) $btn_data .= ' data-border-hover="'. $data['button_border_hover'] .'"';

			$data['button_new_tab'] = $data['button_new_tab'] == 'yes' ? '_blank' : '_self';
			
		    $prices_html .= '<div class="button-wrap"><a target="'. $data['button_new_tab'] .'" class="bauer-button medium '. $btn_cls .'" href="'. $data['button_url'] .'" style="'. $btn_css .'" '. $btn_data .'><span>'. $data['button_content'] .'</span></a></div>';
		}

 	$prices_html .= '</div>';
}

$prices_html .= '</div></div>';

echo '<div class="bauer-pricing clearfix '. $cls .'">'. $prices_html .'</div>';
?>