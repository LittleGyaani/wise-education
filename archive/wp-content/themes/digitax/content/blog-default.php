<?php $sticky_class = is_sticky()?'sticky':''; ?>

<?php if( has_post_format('link') ){ ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
		
			<?php
			        $link = get_post_meta( $post->ID, 'format_link_url', true );
			        $link_description = get_post_meta( $post->ID, 'format_link_description', true );
			        
			        if ( is_single() ) {
			                printf( '<h1 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h1>',
			                        $link,
			                        get_the_title()
			                );
			        } else {
			                printf( '<h2 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h2>',
			                        $link,
			                        get_the_title()
			                );
			        }
			?>
			<?php
			        printf( '<a href="%1$s" target="blank">%2$s</a>',
			                $link,
			                $link_description
			        );
			?>
	</article>

<?php }elseif ( has_post_format('aside') ){ ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
			<div class="post-body">
		           <?php the_content(''); /* Display content  */ ?>
		    </div>
	</article>

<?php }else{ ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
			
			<?php if( has_post_format('audio') ){ ?>

				 <div class="post-media">
		        	<?php digitax_postformat_audio(); /* Display video of post */ ?>
		        </div>

			<?php }elseif(has_post_format('gallery')){ ?>

				<?php digitax_content_gallery(); /* Display gallery of post */ ?>

			<?php }elseif(has_post_format('video')){ ?>

				 <div class="post-media">
		        	<?php digitax_postformat_video(); /* Display video of post */ ?>
		        </div>

			<?php }elseif(has_post_thumbnail()){ ?>

		        <div class="post-media">
		        	<?php digitax_content_thumbnail('full'); /* Display thumbnail of post */ ?>
		        </div>

	        <?php } ?>

	        <div class="post-meta">
		        <?php digitax_content_meta_clone(); /* Display Date, Author, Comment */ ?>
		    </div>

		    <div class="post-title">
	            <?php digitax_content_title(); /* Display title of post */ ?>
		    </div>

		    <?php if(is_single()){ ?>
		    <div class="post-body">
		    	<div class="post-excerpt">
		            <?php digitax_content_body(); /* Display content of post or intro in category page */ ?>
		        </div>
		    </div>
		    <?php }else{ if( get_the_excerpt() ){ ?>
		    	 <div class="post-body">
			    	<div class="post-excerpt">
			            <?php digitax_content_body(); /* Display content of post or intro in category page */ ?>
			        </div>
			    </div>
		    <?php } } ?>
		    

		    <?php if(!is_single()){ ?> 
		            <?php digitax_content_readmore(); /* Display read more button in category page */ ?>
		    <?php }?>

		    <?php if(is_single()){ ?>
		    <?php digitax_content_share_clone(); /* Display tags, category */ ?>
		    <?php } ?>

	</article>


<?php } ?>