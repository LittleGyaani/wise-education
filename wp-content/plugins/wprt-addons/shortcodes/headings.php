<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $data = $heading_css = $heading_cls = $subheading_css = $content_css = '';
$html = $heading_html = $sub_html = $extra_html = $sep_html = '';
$line_cls = $line_css = $image_css = '';

extract( shortcode_atts( array(
	'animation' => '',
	'animation_effect' => 'fadeInUp',
	'animation_duration' => '0.75s',
	'animation_delay' => '0.3s',
	'alignment' => 'text-center',
    'heading' => '',
    'heading_color' => '',
    'heading_width' => '',
    'subheading' => '',
    'subheading_color' => '',
    'subheading_width' => '',
    'content_width' => '',
	'separator' => '',
	'sep_position' => 'between',
	'line_width' => '70',
	'line_height' => '2',
	'line_right_margin' => '20',
	'line_color' => '#f35c27',
	'image' => '',
	'image_width' => '',
	'tag' => 'h2',
	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_font_size' => '',
    'heading_font_size_mobile' => '',
	'heading_line_height' => '',
	'subheading_font_family' => 'Default',
	'subheading_font_weight' => 'Default',
	'subheading_font_size' => '',
	'subheading_line_height' => '',
	'subheading_font_style' => 'normal',
	'heading_top_margin' => '',
	'heading_bottom_margin' => '',
	'subheading_top_margin' => '',
	'subheading_bottom_margin' => ''
), $atts ) );
$content = wpb_js_remove_wpautop($content, true);

$image_width = intval( $image_width );
$heading_width = intval( $heading_width );
$subheading_width = intval( $subheading_width );
$content_width = intval( $content_width );
$line_width = intval( $line_width );
$line_height = intval( $line_height );
$line_right_margin = intval( $line_right_margin );

$heading_font_size = intval( $heading_font_size );
$heading_font_size_mobile = intval( $heading_font_size_mobile );
$heading_line_height = intval( $heading_line_height );
$subheading_font_size = intval( $subheading_font_size );
$subheading_line_height = intval( $subheading_line_height );

$heading_top_margin = intval( $heading_top_margin );
$heading_bottom_margin = intval( $heading_bottom_margin );
$subheading_top_margin = intval( $subheading_top_margin );
$subheading_bottom_margin = intval( $subheading_bottom_margin );

$cls = $alignment;
$subheading_css .= 'font-style:'. $subheading_font_style .';';

if ( $heading_font_weight != 'Default' ) $heading_css .= 'font-weight:'. $heading_font_weight .';';
if ( $heading_color == '#f35c27' ) { $heading_cls .= ' accent';
} else { if ( $heading_color ) $heading_css .= 'color:'. $heading_color .';'; }
if ( $heading_width ) {
	$heading_css .= 'max-width:'. $heading_width .'px;';
	if ( $alignment == 'text-center' ) $heading_css .= 'margin-left: auto; margin-right: auto;';
}
if ( $heading_line_height ) $heading_css .= 'line-height:'. $heading_line_height .'px;';
if ( $heading_top_margin ) $heading_css .= 'margin-top:'. $heading_top_margin .'px;';
if ( $heading_bottom_margin ) $heading_css .= 'margin-bottom:'. $heading_bottom_margin .'px;';
if ( $heading_font_family != 'Default' ) {
	bauer_enqueue_google_font( $heading_font_family );
	$heading_css .= 'font-family:'. $heading_font_family .';';
}

if ( $heading_font_size ) {
	$heading_css .= 'font-size:'. $heading_font_size .'px;';
    $data .= 'data-font='. $heading_font_size;
}
if ( $heading_font_size_mobile ) $data .= ' data-mfont='. $heading_font_size_mobile;

if ( $subheading_font_weight != 'Default' ) $subheading_css .= 'font-weight:'. $subheading_font_weight .';';
if ( $subheading_color ) $subheading_css .= 'color:'. $subheading_color .';';
if ( $subheading_font_size ) $subheading_css .= 'font-size:'. $subheading_font_size .'px;';
if ( $subheading_line_height ) $subheading_css .= 'line-height:'. $subheading_line_height .'px;';
if ( $subheading_top_margin ) $subheading_css .= 'margin-top:'. $subheading_top_margin .'px;';
if ( $subheading_bottom_margin ) $subheading_css .= 'margin-bottom:'. $subheading_bottom_margin .'px;';
if ( $subheading_width ) {
	$subheading_css .= 'max-width:'. $subheading_width .'px;';
	if ( $alignment == 'text-center' ) $subheading_css .= 'margin-left: auto; margin-right: auto;';
}
if ( $subheading_font_family != 'Default' ) {
	bauer_enqueue_google_font( $subheading_font_family );
	$subheading_css .= 'font-family:'. $subheading_font_family .';';
}

if ( $heading ) $heading_html .= sprintf(
	'<%4$s class="heading clearfix %3$s" style="%2$s">
		%1$s
	</%4$s>',
	$heading,
	$heading_css,
	$heading_cls,
	$tag
);

if ( $subheading ) $sub_html .= sprintf(
	'<p class="sub-heading clearfix" style="%2$s">
		%1$s
	</p>',
	$subheading,
	$subheading_css
);

if ( $content_width ) {
	$content_css .= 'max-width:'. $content_width .'px;';
	if ( $alignment == 'text-center' ) $content_css .= 'margin-left: auto; margin-right: auto;';
}

if ( $content ) $extra_html .= sprintf(
	'<div class="extra-content clearfix" style="%2$s">
		%1$s
	</div>',
	$content,
	$content_css
);

if ( $separator == 'line' ) {
	if ( empty( $line_width ) ) $line_width = 50;
	if ( empty( $line_height ) ) $line_height = 2;

	if ( $line_width == '100%' ) {
		$line_css .= 'width:'. $line_width .'%;';
	} else {
		$line_css .= 'width:'. $line_width .'px;';
	}

	$line_css .= 'height:'. $line_height .'px;';

	if ( $line_color == '#f35c27' ) {
		$line_cls .= 'accent';
	} elseif ( $line_color ) {
		$line_css .= 'background-color:'. $line_color .';';
	}

	$sep_html .= sprintf( '<div class="sep %2$s clearfix" style="%1$s"></div>', $line_css, $line_cls );
}

if ( $separator == 'image' ) {
	if ( $image_width )
		$image_css = 'width:'. $image_width .'px;';

	if ( $image )
		$sep_html = sprintf(
			'<div class="sep clearfix" style="%2$s">
				<img alt="image" src="%1$s">
			</div>',
			wp_get_attachment_image_src( $image, 'full' )[0],
			$image_css
		);
}

if ( $sep_position == 'between' ) {
	$html = $heading_html . $sep_html . $sub_html . $extra_html;
} elseif ( $sep_position == 'top' ) {
	$html = $sep_html . $heading_html . $sub_html;
} else { $html = $heading_html . $sub_html . $extra_html . $sep_html; }

if ( $line_right_margin && $sep_position == 'left' ) {
	$css .= 'padding-left:'. $line_right_margin .'px';
	$cls .= ' left-sep';
}

if ( $animation ) {
	$cls .= ' wow '. $animation_effect;
	$data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

printf(
	'<div class="bauer-headings clearfix %2$s" %3$s style="%4$s">%1$s</div>',
	$html,
	$cls,
	$data,
	$css
);