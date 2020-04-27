<?php get_header(); ?>

<div id="content-wrap" class="bauer-container">
    <div id="site-content" class="site-content clearfix archive-project">
    	<div id="inner-content" class="inner-content-wrap">
			<?php if ( have_posts() ) : ?>
				<div class="bauer-project-grid" data-layout="grid" data-column="3" data-column2="3" data-column3="2" data-column4="1" data-gaph="30" data-gapv="30">
					<div id="portfolio" class="cbp">
					    <?php while ( have_posts() ) : the_post();
							wp_enqueue_script( 'bauer-cubeportfolio' ); ?>

				            <div class="cbp-item">
								<div class="project-box style-2">
									<?php
									if ( has_post_thumbnail() )
								    	$img_size = 'bauer-rectangle2';

			                    	$icon_html = sprintf('<div class="icons"><a href="%1$s">next</a></div>', esc_url( get_the_permalink() ), bauer_get_image( array( 'size' => 'full', 'format' => 'src' ) )
			                    	);

									$url_html = sprintf('<div class="url-wrap"><a href="%2$s" class="bauer-links link-style-2 accent" style=""><span class="text">%1$s</span></a></div>', esc_html__( 'View Project', 'bauer' ), esc_url( get_the_permalink() ) );

			                    	$title_html = sprintf('<h2 class="project-title"><a href="%1$s">%2$s</a></h2>', esc_url( get_the_permalink() ), bauer_metabox( 'title' ) );
			                    	$desc_html = sprintf('<div class="project-desc">%1$s</div>', bauer_metabox( 'desc' ) );


			                    	echo '<div class="project-image"><div class="inner">' . get_the_post_thumbnail( get_the_ID(), $img_size ) . $icon_html .'<div class="hover-info">' . $title_html . $desc_html .'</div></div></div>';
									?>
								</div><!-- /.project-box -->
				            </div><!-- /.cbp-item -->
						<?php endwhile; ?>
					</div><!-- /#portfolio -->

					<?php bauer_pagination(); ?>
				</div><!-- /.bauer-project-grid -->
			<?php endif; ?>
    	</div>
    </div><!-- /#site-content -->
</div><!-- /#content-wrap -->

<?php get_footer(); ?>