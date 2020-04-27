<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$html = $cls = $css = $heading_wrap_cls = $heading_css = $url_wrap_css = '';
$text_css = $button_cls = $button_css = $button_data = '';

extract( shortcode_atts( array(
	'content_width' => '',
	'button_width' => '',
	'heading_text' => '',
	'heading_color' => '',
	'heading_width' => '',
	'content_align' => '',
	'button_align' => '',
	'heading_tag' => 'h2',
	'link_text' => 'READ MORE',
	'link_url' => '',
	'new_tab' => 'yes',
	'button_size' => 'medium',
	'button_rounded' => '',
	'button_text_color' => '',
	'button_background' => '',
    'button_border_width' => '1px',
    'button_border_style' => 'solid',
	'button_border' => '',
	'button_text_hover' => '',
	'button_background_hover' => '',
	'button_border_hover' => '',
	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_font_size' => '',
	'heading_line_height' => '',
	'button_font_family' => 'Default',
	'button_font_weight' => 'Default',
	'button_font_size' => '',
	'heading_top_margin' => '',
	'button_top_margin' => '',
), $atts ) );

$rand = rand();
$heading_line_height = intval( $heading_line_height );
$heading_font_size = intval( $heading_font_size );

$content_width = intval( $content_width );
$button_width = intval( $button_width );

$heading_width = intval( $heading_width );

$button_font_size = intval( $button_font_size );
$button_rounded = intval( $button_rounded );

$heading_top_margin = intval( $heading_top_margin );
$button_top_margin = intval( $button_top_margin );

if ( $heading_font_weight != 'Default' ) $heading_css .= 'font-weight:'. $heading_font_weight .';';
if ( $heading_color ) $heading_css .= 'color:'. $heading_color .';';
if ( $heading_font_size ) $heading_css .= 'font-size:'. $heading_font_size .'px;';
if ( $heading_line_height ) $heading_css .= 'line-height:'. $heading_line_height .'px;';
if ( $heading_top_margin ) $heading_css .= 'margin-top:'. $heading_top_margin .'px;';
if ( $heading_font_family != 'Default' ) {
	bauer_enqueue_google_font( $heading_font_family );
	$heading_css .= 'font-family:'. $heading_font_family .';';
}

if ( $heading_width ) {
	$heading_css .= 'max-width:'. $heading_width .'px;';
	if ( $content_align == 'text-center' ) $heading_css .= 'margin-left: auto; margin-right: auto;';
}

if ( $heading_text ) {
	$html .= sprintf('
		<div class="heading-wrap %1$s">
			<div class="text-wrap" style="%5$s">
				<%4$s class="heading" style="%2$s">
					%3$s
				</%4$s>
			</div>
		</div>',
		$heading_wrap_cls,
		$heading_css,
		$heading_text,
		$heading_tag,
		$text_css
	);
}

if ( $link_text && $link_url ) {
	$btnrand = rand();
	$button_cls = $button_size .' btn-'. $btnrand;

	if ( $button_top_margin ) $url_wrap_css .= 'padding-top:'. $button_top_margin .'px;';
	if ( $button_rounded ) $button_css .= 'border-radius:'. $button_rounded .'px;';
	if ( $button_border_width ) $button_css .= 'border-width:'. $button_border_width .';';
	if ( $button_text_color ) $button_data .= ' data-text="'. $button_text_color .'"';

    if ( $button_background == '#f35c27' ) {
        $button_cls .= ' accent';
    } else {
        $button_cls .= ' custom';
        $button_data .= ' data-background="'. $button_background .'"';
    }

    if ( $button_border_width ) {
        $button_cls .= ' outline '. $button_border_style;
        if ( $button_border == '#f35c27' ) {
            $button_cls .= ' outline-accent';
        } else {
            $button_cls .= ' custom';
            $button_data .= ' data-border="'. $button_border .'"';
        }
    }	

	if ( $button_text_hover ) $button_data .= ' data-text-hover="'. $button_text_hover .'"';
	if ( $button_background_hover ) $button_data .= ' data-background-hover="'. $button_background_hover .'"';
	if ( $button_border_hover ) $button_data .= ' data-border-hover="'. $button_border_hover .'"';

	$html .= sprintf(
		'<div class="url-wrap" style="%6$s">
			<a target="%5$s" class="bauer-button %3$s" href="%2$s" style="%4$s" %7$s><span>%1$s</span></a>
		</div>',
		esc_html( $link_text ),
		esc_attr( $link_url ),
		$button_cls,
		$button_css,
		$new_tab,
		$url_wrap_css,
		$button_data
	);
}

printf(
	'<div class="bauer-action-box %3$s" style="%2$s">
		<div class="inner">%s</div>
	</div>',
	$html,
	$css,
	$cls
);