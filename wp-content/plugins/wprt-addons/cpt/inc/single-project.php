<?php
get_header();

$pre_title = bauer_get_mod( 'related_pre_title' );
$title = bauer_get_mod( 'related_title' );
$button = bauer_get_mod( 'related_button', 'View All' );
$button_url = bauer_get_mod( 'related_button_url', '#' );
$related_query = bauer_get_mod( 'project_related_query', '7' );
$related_column = bauer_get_mod( 'project_related_column', '3' );
$related_item_gap = bauer_get_mod( 'project_related_item_spacing', '30' );
$related_item_crop = bauer_get_mod( 'project_related_img_crop', 'rectangle1' );

$terms = get_the_terms( $post->ID, 'project_category' );
$term_ids = wp_list_pluck( $terms, 'term_id' );
?>
<div class="project-detail-wrap">
	<?php
	while ( have_posts() ) : the_post();
		the_content();
	endwhile; ?>
</div>

<?php if ( bauer_get_mod( 'project_related', true )  ): ?>
<div class="project-related-wrap">
		<div class="bauer-container">
		<div class="clearfix">
			<div class="title-wrap">
				<div class="pre-title"><?php echo esc_html( $pre_title ); ?></div>
				<h2 class="title"><?php echo esc_html( $title ); ?></h2>
			</div>
		</div>
		<?php
		$query_args = array(
			'post_type' => 'project',
			'tax_query' => array(
				array(
				'taxonomy' => 'project_category',
				'field' => 'term_id',
				'terms' => $term_ids,
				'operator'=> 'IN'
				)),
			'ignore_sticky_posts' => 1,
			'post__not_in'=> array( $post->ID )
		);

		$query_args['posts_per_page'] = $related_query;
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) :
			$terms = wp_get_post_terms( get_the_ID(), 'project_category' ); ?>

			<div class="btn-wrap">
				<a href="<?php echo esc_url( get_term_link( $terms[0]->term_id ) ); ?>"><?php echo esc_html( $button ); ?></a>
			</div>

			<div class="project-related" data-gap="<?php echo esc_html( $related_item_gap ); ?>" data-column="<?php echo esc_html( $related_column ); ?>">
				<div class="owl-carousel owl-theme">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php wp_enqueue_script( 'bauer-owlcarousel' ); ?>

					<div class="project-item">
						<?php
							$html = $thumb = '';
							if ( has_post_thumbnail() ) {
						    	$img_size = '';
								if ( $related_item_crop == 'rectangle1' ) $img_size = 'bauer-post-related';
								if ( $related_item_crop == 'rectangle2' ) $img_size = 'bauer-rectangle2';
								if ( $related_item_crop == 'rectangle3' ) $img_size = 'bauer-rectangle3';
								if ( $related_item_crop == 'rectangle4' ) $img_size = 'bauer-rectangle4';

								$thumb .= '<div class="thumb">'. get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="hover-layer"><a href="'. esc_url( get_the_permalink() ) .'" class="icon"><span class="elegant-icon_plus_alt"></span></a></div></div>';
	                    	}
	                    	
							if ( $terms )
								$html .= '<div class="cat"><a href="'. esc_url( get_term_link( $terms[0]->term_id ) ) .'">'. esc_html( $terms[0]->name ) .'</a></div>';
							if ( $title = bauer_metabox( 'title' ) )
	                    		$html .= '<h2><a href="'. esc_url( get_the_permalink() ) .'">'. $title .'</a></h2>';

	                    	echo '<div class="project-wrap"><div class="inner">'. $thumb .'<div class="text-wrap">' . $html .'</div></div></div>';
						?>
					</div><!-- /.project-box -->
					<?php endwhile; ?>
				</div><!-- /.owl-carousel -->
			</div><!-- /.project-related -->
		<?php
		endif; wp_reset_postdata();
		?>
	</div><!-- /.bauer-container -->
</div><!-- /.project-related-wrap -->
<?php endif; ?>

<?php get_footer(); ?>