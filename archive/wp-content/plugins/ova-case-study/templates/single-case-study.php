<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<div class="single_case_study">
		<div class="our-support-tw">
			<?php the_content(); ?>
			
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer( );