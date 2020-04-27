<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $css = $icon_cls = $icon_css = $icon_html = $data = $image_html = $new_tab = '';

extract( shortcode_atts( array(
	'image' => '',
	'rounded' => '',
	'alignment' => 'text-center',
	'max_width' => '',
	'url' => '',
	'new_tab' => 'yes',
    'animation' => '',
    'animation_effect' => 'fadeInUp',
    'animation_duration' => '0.75s',
    'animation_delay' => '0.3s',
	'icon_style' => 'white',
	'icon_size' => 'big',
	'video_url' => '',
	'img_top' => '',
	'img_right' => '',
	'img_bottom' => '',
	'img_left' => '',
	'image_x' => '',
	'image_y' => ''
), $atts ) );

$cls = $alignment;
if ( $rounded ) $css .= 'border-radius:'.  intval( $rounded ) .'px;overflow:hidden;';
if ( $max_width ) {
	$css .= 'max-width:'. intval( $max_width ) .'px;';
	if ( $alignment == 'text-center' ) $css .= 'margin-left: auto; margin-right: auto;';
}

if ( $video_url ) {
	$icon_cls = $icon_style .' '. $icon_size;

	if ( $img_top ) $icon_css .= 'top:'. $img_top .';';
	if ( $img_right ) $icon_css .= 'right:'. $img_right .';';
	if ( $img_bottom ) $icon_css .= 'bottom:'. $img_bottom .';';
	if ( $img_left ) $icon_css .= 'left:'. $img_left .';';
	if ( $image_x  || $image_y ) $icon_css .= 'transform:translate('. $image_x .','. $image_y .');';

	$icon_html = sprintf(
		'<div class="bauer-video-icon clearfix %2$s" style="%3$s"><a class="icon-wrap popup-video" href="%1$s">play<span class="circle"></span></a></div>',
		$video_url,
		$icon_cls,
		$icon_css
	);
}

if ( $animation ) {
	$cls .= ' wow '. $animation_effect;
	$data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

if ( $image ) {
	$image_html = sprintf( '<img alt="image" src="%1$s" />', wp_get_attachment_image_src( $image, 'full' )[0] );

	if ( $url ) {
		$new_tab = 'yes' ? '_blank' : '_self';
		$image_html = sprintf( '<a target="%3$s" href="%2$s">%1$s</a>', $image_html, $url, $new_tab );
	}

	printf(
		'<div class="bauer-simple-image %3$s" style="%4$s" %5$s>
			%1$s %2$s
		</div>',
		$image_html,
		$icon_html,
		$cls,
		$css,
		$data
	);
}



