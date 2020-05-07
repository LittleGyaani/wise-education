<?php
/* The function that creates the HTML on the front-end, based on the parameters */

function flipster_image_gallery_shortcode() {
	
	if ( ! flipster_allowed_post_type() )
		return;

	return flipster_image_gallery();
}
add_shortcode( 'flipster_image_gallery', 'flipster_image_gallery_shortcode' );
?>