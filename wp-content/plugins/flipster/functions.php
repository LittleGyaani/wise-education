<?
if ( ! defined( 'ABSPATH' ) ) exit;

function flipster_allowed_post_types() {
	
	$defaults['post_types']['post'] = 'on';
	$defaults['post_types']['page'] = 'on';
	
	$settings = ( array ) get_option( 'flipster-image-gallery', $defaults );	
	
	$post_types = isset( $settings['post_types'] ) ? $settings['post_types'] : '';
	
	if ( ! $post_types )
		return;

	return $post_types;

}


function flipster_get_post_types() {

	$args = array(
		'public' => true
	);

	$post_types = array_map( 'ucfirst', get_post_types( $args ) );

	// remove attachment
	unset( $post_types[ 'attachment' ] );

	return apply_filters( 'flipster_get_post_types', $post_types );

}



function flipster_allowed_post_type() {
	
	$defaults['post_types']['post'] = 'on';
	$defaults['post_types']['page'] = 'on';

	
	$post_type = ( string ) get_post_type();

	
	$settings = ( array ) get_option( 'flipster-image-gallery', $defaults );
	$post_types = isset( $settings['post_types'] ) ? $settings['post_types'] : '';
	
	if ( ! $post_types )
		return;
	
	if ( array_key_exists( $post_type, $post_types ) )
		return true;
}



function flipster_get_image_ids() {
	global $post;

	if( ! isset( $post->ID) )
		return false;

	$attachment_ids = get_post_meta( $post->ID, '_flipster_image_gallery', true );
	$attachment_ids = explode( ',', $attachment_ids );
	
	if($attachment_ids) {
		return array_filter( $attachment_ids );
	} else {
		return false;
	}	
}


//Add meta box

function flipster_gallery_add_meta_box() {

    $post_types = flipster_allowed_post_types();       

    if ( ! $post_types )
        return;

    foreach ( $post_types as $post_type => $status ) {
        add_meta_box( 'flipster_gallery', apply_filters( 'flipster_gallery_meta_box_title', __( 'Flipster Image Gallery', 'flipster-image-gallery' ) ), 'flipster_gallery_metabox', $post_type, apply_filters( 'flipster_gallery_meta_box_context', 'normal' ), apply_filters( 'flipster_gallery_meta_box_priority', 'low' ) );
    }

}
add_action( 'add_meta_boxes', 'flipster_gallery_add_meta_box' );





function flipster_gallery_metabox() {

    global $post;
?>

    <div id="gallery_images_container">

        <ul class="gallery_images">
            <?php

    $image_gallery = get_post_meta( $post->ID, '_flipster_image_gallery', true );
    $attachments = array_filter( explode( ',', $image_gallery ) );

    if ( $attachments )
        foreach ( $attachments as $attachment_id ) {
            echo '<li class="image attachment details" data-attachment_id="' . $attachment_id . '"><div class="attachment-preview"><div class="thumbnail">
                            ' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '</div>
                            <a href="#" class="delete check" title="' . __( 'Remove image', 'flipster-image-gallery' ) . '"><div class="media-modal-icon"></div></a>
                           
                        </div></li>';
        }
?>
        </ul>
       
       <?php
       $flipster_type = get_post_meta( $post->ID, '_flipster_type', true );
       ?>
        <?php _e( 'Type', 'flipster-image-gallery' ); ?> :<select name="flipster_type">
           <option value="Default" <?php if($flipster_type == 'Default') { ?> selected="selcted" <?php } ?>>Default</option>
            <option value="Carousel" <?php if($flipster_type == 'Carousel') { ?> selected="selcted" <?php } ?>>Carousel</option>
             <option value="Wheel" <?php if($flipster_type == 'Wheel') { ?> selected="selcted" <?php } ?>>Wheel</option>
              <option value="Flat" <?php if($flipster_type == 'Flat') { ?> selected="selcted" <?php } ?>>Flat</option>
        </select> 
        <input type="hidden" id="image_gallery" name="image_gallery" value="<?php echo esc_attr( $image_gallery ); ?>" />
        <?php wp_nonce_field( 'flipster_image_gallery', 'flipster_image_gallery' ); ?>

    </div>

    <p class="add_gallery_images hide-if-no-js">
        <a class="button button-primary" href="#"><?php _e( 'Add images', 'flipster-image-gallery' ); ?></a>
    </p>

    <script type="text/javascript">
        jQuery(document).ready(function($){

            // Uploading files
            var image_gallery_frame;
            var $image_gallery_ids = $('#image_gallery');
            var $gallery_images = $('#gallery_images_container ul.gallery_images');

            jQuery('.add_gallery_images').on( 'click', 'a', function( event ) {

                var $el = $(this);
                var attachment_ids = $image_gallery_ids.val();

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( image_gallery_frame ) {
                    image_gallery_frame.open();
                    return;
                }

                // Create the media frame.
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: '<?php _e( 'Add Images to Gallery', 'flipster-image-gallery' ); ?>',
                    button: {
                        text: '<?php _e( 'Add to gallery', 'flipster-image-gallery' ); ?>',
                    },
                    multiple: true
                });

                // When an image is selected, run a callback.
                image_gallery_frame.on( 'select', function() {

                    var selection = image_gallery_frame.state().get('selection');

                    selection.map( function( attachment ) {

                        attachment = attachment.toJSON();

                        if ( attachment.id ) {
                            attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

                             $gallery_images.append('\
                                <li class="image attachment details" data-attachment_id="' + attachment.id + '">\
                                    <div class="attachment-preview">\
                                        <div class="thumbnail">\
                                            <img src="' + attachment.url + '" />\
                                        </div>\
                                       <a href="#" class="delete check" title="<?php _e( 'Remove image', 'flipster-image-gallery' ); ?>"><div class="media-modal-icon"></div></a>\
                                    </div>\
                                </li>');

                        }

                    } );

                    $image_gallery_ids.val( attachment_ids );
                });

               
                image_gallery_frame.open();
            });

            // Image ordering
            $gallery_images.sortable({
                items: 'li.image',
                cursor: 'move',
                scrollSensitivity:40,
                forcePlaceholderSize: true,
                forceHelperSize: false,
                helper: 'clone',
                opacity: 0.65,
                placeholder: 'eig-metabox-sortable-placeholder',
                start:function(event,ui){
                    ui.item.css('background-color','#f6f6f6');
                },
                stop:function(event,ui){
                    ui.item.removeAttr('style');
                },
                update: function(event, ui) {
                    var attachment_ids = '';

                    $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                        var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                        attachment_ids = attachment_ids + attachment_id + ',';
                    });

                    $image_gallery_ids.val( attachment_ids );
                }
            });

            // Remove images
            $('#gallery_images_container').on( 'click', 'a.delete', function() {

                $(this).closest('li.image').remove();

                var attachment_ids = '';

                $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                    var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

                $image_gallery_ids.val( attachment_ids );

                return false;
            } );

        });
    </script>
    <?php
}






function flipster_image_gallery_save_post( $post_id ) {

    

    $post_types = flipster_allowed_post_types();

    // check user permissions
    if ( isset( $_POST[ 'post_type' ] ) && !array_key_exists( $_POST[ 'post_type' ], $post_types ) ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    }
    else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }

    if ( ! isset( $_POST[ 'flipster_image_gallery' ] ) || ! wp_verify_nonce( $_POST[ 'flipster_image_gallery' ], 'flipster_image_gallery' ) )
        return;

    if ( isset( $_POST[ 'image_gallery' ] ) && !empty( $_POST[ 'image_gallery' ] ) ) {

        $attachment_ids = sanitize_text_field( $_POST['image_gallery'] );       
        $attachment_ids = explode( ',', $attachment_ids );     
        $attachment_ids = array_filter( $attachment_ids  );
        
        $attachment_ids =  implode( ',', $attachment_ids );

        update_post_meta( $post_id, '_flipster_image_gallery', $attachment_ids );
        
        update_post_meta( $post_id, '_flipster_type', $_POST['flipster_type'] );
        
        
    } else {
        delete_post_meta( $post_id, '_flipster_image_gallery' );
        delete_post_meta( $post_id, '_flipster_type' );
    }

    do_action( 'flipster_image_gallery_save_post', $post_id );
}
add_action( 'save_post', 'flipster_image_gallery_save_post' );





//Admin css

function flipster_image_gallery_admin_css() { ?>

	<style>
		.attachment.details .check div {
			background-position: -60px 0;
		}

		.attachment.details .check:hover div {
			background-position: -60px 0;
		}

		.gallery_images .details.attachment {
			box-shadow: none;
		}

		.eig-metabox-sortable-placeholder {
			background: #DFDFDF;
		}

		.gallery_images .attachment.details > div {
			width: 150px;
			height: 150px;
			box-shadow: none;
		}

		.gallery_images .attachment-preview .thumbnail {
			 cursor: move;
		}

		.attachment.details div:hover .check {
			display:block;
		}

        .gallery_images:after,
        #gallery_images_container:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }

        .gallery_images > li {
            float: left;
            cursor: move;
            margin: 0 20px 20px 0;
        }

        .gallery_images li.image img {
            width: 150px;
            height: auto;
        }

    </style>

<?php }
add_action( 'admin_head', 'flipster_image_gallery_admin_css' );




function flipster_image_gallery() { 
	
	if ( ! flipster_allowed_post_type() )
		return;

	global $post;	

	if( ! isset( $post->ID) )
		return;

	$attachment_files = get_post_meta( $post->ID, '_flipster_image_gallery', true );
	$attachment_files = explode( ',', $attachment_files );

	$attachment_ids =  array_filter( $attachment_files );
	

	if ( $attachment_ids ) { 	

		

		ob_start();		
		
	
		
		 $flipster_type = get_post_meta( $post->ID, '_flipster_type', true );

			switch ( $flipster_type ) {
				
				case 'Carousel':  ?>
		
				<script>
					jQuery(document).ready(function() {		     				
						jQuery(".flipster-container").flipster({
						    style: 'carousel',
						    spacing: -0.5,
						    nav: true,
						    buttons: true,
						});	
					});
				</script>
				
				<?php break;
				
				case 'Wheel':  ?>
				<script>
					jQuery(document).ready(function() {		     				
						jQuery(".flipster-container").flipster({
						   style: 'wheel',
						   spacing: 0
						});	
					});
				</script>
				
				<?php break;
				
				case 'Flat':  ?>
				<script>
					jQuery(document).ready(function() {		     				
						jQuery(".flipster-container").flipster({
						    style: 'flat',
						    spacing: -0.25
						});	
					});
				</script>
				
				<?php break;
				
				default:?>
		
				<script>
					jQuery(document).ready(function() {		     				
						jQuery(".flipster-container").flipster();	
					});
				</script>
				
				<?php
					
					break;
			}		
					?>
				


		
		 <div class="flipster-container">
		   <ul class="flip-items">
		<?php

		foreach ( $attachment_ids as $attachment_id ) {			
			
			$image_link	= wp_get_attachment_image_src( $attachment_id, 'large');
			$image_link	= $image_link[0];				
			
			$image_caption = get_the_title($attachment_id)? esc_attr( get_the_title($attachment_id) ) : '';
						
			?>		        
	            <li data-flip-title="<?php echo $image_caption; ?>">
	                <img src="<?php echo $image_link; ?>">
	            </li>	            
            
            <?php			
		}
		?>
		 </ul>
		</div>  
		<?php

		$gallery = ob_get_clean();

		return apply_filters( 'flipster_image_gallery', $gallery );
	 }
}


function flipster_image_gallery_append_to_content( $content ) {

	if ( is_singular() && is_main_query() && flipster_allowed_post_types() ) {
		$new_content = flipster_image_gallery();
		$content .= $new_content;
	}

	return $content;

}
add_filter( 'the_content', 'flipster_image_gallery_append_to_content' );


function flipster_image_gallery_template_redirect() {

	if ( flipster_image_gallery_has_shortcode( 'flipster_image_gallery' ) )
		remove_filter( 'the_content', 'flipster_image_gallery_append_to_content' );

}
add_action( 'template_redirect', 'flipster_image_gallery_template_redirect' );


function flipster_image_gallery_has_shortcode( $shortcode = '' ) {
	global $post;
	
	$found = false;
	if ( !$shortcode ) {
		return $found;
	}

	if (  is_object( $post ) && stripos( $post->post_content, '[' . $shortcode ) !== false ) {		
		$found = true;
	}
	
	return $found;
}



function flipster_image_gallery_scripts() {

    wp_enqueue_script('flipster', plugins_url( '/assets/js/jquery.flipster.min.js' , __FILE__ ), array( 'jquery' ));
	wp_enqueue_style('flipster', plugins_url( '/assets/css/jquery.flipster.min.css' , __FILE__ ), '');
}
add_action( 'wp_enqueue_scripts', 'flipster_image_gallery_scripts', 20 );

?>