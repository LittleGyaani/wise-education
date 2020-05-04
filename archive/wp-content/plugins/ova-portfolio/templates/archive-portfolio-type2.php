<?php 

$portfolio = apply_filters( 'OVAPO_portfolio', 10 );

?>

<div class="portfolio-page-sr3">

	<div class="container">

		<?php
		$i = 1;
	 	if( $portfolio->have_posts() ) : while( $portfolio->have_posts() ) : $portfolio->the_post();

			$img_src = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' );
			$img_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), 'medium' );
			$i++;
			$class_flex = ( $i % 2 == 1 ) ? 'flex-row-reverse' : 'flex-row';
		?>
		<div class="portfolio_content">
			<div class="row <?php echo esc_attr($class_flex);?>">
				<div class="col-md-5">
					<div class="portfolio-image">
						<a href="<?php the_permalink();?>" title="<?php the_title();?>">
							<img src="<?php echo $img_src;?>" srcset="<?php echo $img_srcset;?>" sizes="(max-width: 600px) 100vw, 600px" alt="<?php the_title();?>">
						</a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="row h-100">
						<div class="col-md-12 align-self-center">
							<div class="portfolio-info-in">
								<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
								<?php if ( function_exists('digitax_custom_text') ) { ?>
									<p><?php echo digitax_custom_text( get_the_excerpt(), 58); ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else: ?>
			<div class="search_not_found">
				<?php esc_html_e( 'Not Found Portfolio', 'ova-portfolio' ); ?>
			</div>
		<?php endif; wp_reset_postdata(); ?>
		<div class="col-md-12">
			<div class="row">
				<?php ovapo_pagination_plugin($portfolio); ?>
			</div>
		</div>

	</div>

</div>