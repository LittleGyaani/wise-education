<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

$case_study = apply_filters( 'OVACS_case_study', 10 );

?>

<div class="archive_case_study">
	<div class="case-studies-s-page">
		<div class="container">
			<div class="row">
				<div class="wrap_item">

					<?php if( $case_study->have_posts() ) : while( $case_study->have_posts() ) : $case_study->the_post();
						$thumbnail_url = wp_get_attachment_image_url(get_post_thumbnail_id() , 'digitax_thumb_blog' ); ?>
						<div class="items">
							<div class="single-case-st">
								<div class="card">
									<img src="<?php echo esc_attr($thumbnail_url) ?>" alt="<?php echo esc_attr(get_the_title()) ?>">
									<div class="card-body">
										<h2 class="title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
										<?php if ( function_exists('digitax_custom_text') ) { ?>
											<p><?php echo digitax_custom_text(get_the_excerpt(), 15); ?></p>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				
				<?php else: ?>
					<div class="search_not_found">
						<?php esc_html_e( 'Not Found Case Study', 'ova-case-study' ); ?>
					</div>
				<?php endif; wp_reset_postdata(); ?>

				<?php ovacs_pagination_plugin($case_study); ?>

			</div> 
		</div>
	</div>
</div>

<?php get_footer( );