<?php

class ovaframework_hooks {

	public function __construct() {
		
		
		
		// Share Social in Single Post
		add_filter( 'digitax_share_social', array( $this, 'digitax_content_social' ), 2, 10 );

		// Allow add font class to title of widget
		add_filter( 'widget_title', array( $this, 'ova_html_widget_title' ) );
		

		add_filter( 'widget_text', 'do_shortcode' );

		add_filter( 'upload_mimes', array( $this, 'upload_mimes' ), 1, 1);

    }

    

	public function digitax_content_social( $link, $title ) {
		$html = '<ul class="social">
					<li><a href="javascript:void()"><i class="fas fa-share"></i></a></li>
					<li><a class="share-ico fa fa-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u='.$link.'"></a></li>
					<li><a class="share-ico fab fa-twitter" target="_blank" href="https://twitter.com/share?url='.$link.'"></a></li>
					<li><a class="share-ico fab fa-instagram" target="_blank" href="https://instagram.com/?url='.$link.'"></a></li>
					<li><a class="share-ico fab fa-linkedin-in" target="_blank" href="https://www.linkedin.com/?url='.$link.'"></a></li>
					<li><a class="share-ico fab fa-pinterest-p" target="_blank" href="http://www.pinterest.com/pin/create/button/?url='.$link.'"></a></li>
				</ul>
		';

		return $html;
 	}


	// Filter class in widget title
	public function ova_html_widget_title( $title ) {
		$title = str_replace( '{{', '<i class="', $title );
		$title = str_replace( '}}', '"></i>', $title );
		return $title;
	}

	public function upload_mimes($mimes){
		$mimes['zip'] = 'application/zip';
		$mimes['7z'] = 'application/x-7z-compressed';
		$mimes['apk'] = 'application/apk';
		$mimes['psd'] = 'image/vnd.adobe.photoshop';
		$mimes['rar'] = 'application/x-rar-compressed';
		$mimes['swf'] = 'application/x-shockwave-flash';
		$mimes['exe'] = 'application/x-msdownload';
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

}

new ovaframework_hooks();

