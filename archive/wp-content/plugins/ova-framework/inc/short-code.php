<?php

if ( ! function_exists('pricing_plan_li')) {
	function pricing_plan_li ( $args, $content ) {
		$line = (!empty($args['line'])) ? 'class="'.$args['line'].'"' : '';
		$html = '<li '.$line.'>'.$content.'</li>';
		return $html;
	}
}
add_shortcode( 'pricing_plan_li', 'pricing_plan_li' );

?>