<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $cls = $cls_inner = $data = $data_inner = '';

extract( shortcode_atts( array(
    'animation' => '',
    'animation_effect' => 'fadeInUp',
    'animation_duration' => '0.75s',
    'animation_delay' => '0.3s',
    'bg_image' => '',
    'bg_position' => 'lt',
    'bg_repeat' => 'no-repeat',
    'bg_size' => '',
    'alignment' => '',
    'width' => '',
    'mobile_width' => '',
    'padding' => '',
    'mobile_padding' => '',
    'margin' => '',
    'mobile_margin' => '',
    'background_color' => '',
    'border_color' => '',
    'border_width' => '',
    'rounded' => '',
    'inset' => '',
    'horizontal' => '',
    'vertical' => '',
    'blur' => '',
    'spread' => '',
    'shadow_color' => '',
    'background_color_hover' => '',
    'border_color_hover' => '',
    'border_width_hover' => '',
    'rounded_hover' => '',
    'inset_hover' => '',
    'horizontal_hover' => '',
    'vertical_hover' => '',
    'blur_hover' => '',
    'spread_hover' => '',
    'shadow_color_hover' => '',
    'translatex' => '0',
    'translatey' => '0'
), $atts ) );

$rand = rand();
$width = intval( $width );
$mobile_width = intval( $mobile_width );

if ( $bg_position == 'lt' ) $bg_position = 'left top';
if ( $bg_position == 'rt' ) $bg_position = 'right top';
if ( $bg_position == 'ct' ) $bg_position = 'center top';
if ( $bg_position == 'cc' ) $bg_position = 'center center';
if ( $bg_position == 'cb' ) $bg_position = 'center bottom';
if ( $bg_position == 'lb' ) $bg_position = 'left bottom';
if ( $bg_position == 'rb' ) $bg_position = 'right bottom';

if ( $alignment == 'center' ) $css .= 'margin: 0 auto;';
if ( $bg_image ) $css .= 'background:url('. wp_get_attachment_image_src( $bg_image, 'full' )[0] .') '. $bg_position .' '. $bg_repeat .';';
if ( $bg_size ) $css .= 'background-size:'. $bg_size .';';
$cls_inner .= 'ctb-'. $rand;

if ( $width ) $data .= 'data-width="'. $width .'"';
if ( $mobile_width ) $data .= ' data-mobiwidth="'. $mobile_width .'"';

if ( $background_color == '#f35c27' ) {
    $cls_inner .= ' accent';
} else {
    $data_inner .= ' data-background="'. $background_color .'"';
}

// if ( $background_color ) $data_inner .= ' data-background="'. $background_color .'"';
if ( $rounded ) $data_inner .= ' data-rounded="'. $rounded .'"';
if ( $border_color ) $data_inner .= ' data-border-color="'. $border_color .'"';
if ( $border_width ) $data_inner .= ' data-border-width="'. $border_width .'"';
if ( $horizontal && $vertical && $blur && $spread && $shadow_color )
    $data_inner .= ' data-shadow="'. $inset .' '. $horizontal .' '. $vertical .' '. $blur .' '. $spread .' '. $shadow_color .'"';

if ( $background_color_hover ) $data_inner .= ' data-background-hover="'. $background_color_hover .'"';
if ( $rounded_hover ) $data_inner .= ' data-rounded-hover="'. $rounded_hover .'"';
if ( $border_color_hover ) $data_inner .= ' data-border-color-hover="'. $border_color_hover .'"';
if ( $border_width_hover ) $data_inner .= ' data-border-width-hover="'. $border_width_hover .'"';
if ( $horizontal_hover && $vertical_hover && $blur_hover && $spread_hover && $shadow_color_hover )
    $data_inner .= ' data-shadow-hover="'. $inset_hover .' '. $horizontal_hover .' '. $vertical_hover .' '. $blur_hover .' '. $spread_hover .' '. $shadow_color_hover .'"';

if ( $translatex ) $data_inner .= ' data-translatex="'. $translatex .'"';
if ( $translatey ) $data_inner .= ' data-translatey="'. $translatey .'"';

if ( $animation ) {
    $cls .= ' wow '. $animation_effect;
    $data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

printf(
	'<div class="bauer-content-box clearfix %3$s" data-padding="%6$s" data-mobipadding="%7$s" data-margin="%4$s" data-mobimargin="%5$s" %8$s>
		<div class="inner %9$s" style="%2$s" %10$s>
			%1$s
		</div>
	</div>',
	do_shortcode( $content ),
	$css,
    $cls,
	$margin,
	$mobile_margin,
	$padding,
	$mobile_padding,
    $data,
    $cls_inner,
    $data_inner
);