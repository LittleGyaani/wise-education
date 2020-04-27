<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$query_args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => 3
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'testimonials_category'
		),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { echo "Testimonials post not found!"; return; }
ob_start(); ?>

<div class="bauer-testimonials-g3">
<?php $i = 0; if ( $query->have_posts() ) : ?>
	<?php wp_enqueue_script( 'bauer-bxslider' ); ?>


<div id="bx-prev"></div>
<div id="bx-next"></div>

<div class="content-wrap">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="item"><div class="shadow"><div class="inner">
         	<?php if ( bauer_metabox( 'heading' ) || bauer_metabox( 'name' ) || bauer_metabox( 'position' ) || bauer_metabox( 'text' ) ) : ?>
		        <?php if ( bauer_metabox( 'text' ) ) : ?>
		        	<div class="text">
		        	<?php echo esc_html( bauer_metabox( 'text' ) ); ?></div>
		        <?php endif; ?>

		        <?php if ( bauer_metabox( 'name' ) ) : ?>
		        	<div class="name">
		        	<?php echo esc_html( bauer_metabox( 'name' ) ); ?></div>
		        <?php endif; ?>

		        <?php if ( bauer_metabox( 'position' ) ) : ?>
		        	<div class="position">
		        	<?php echo esc_html( bauer_metabox( 'position' ) ); ?></div>
		        <?php endif; ?>

	        <?php endif; ?>
		</div></div></div>
	<?php endwhile; ?>
</div>

<div id="bx-pager" class="avatar-wrap">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php if ( has_post_thumbnail() ) : ?>
			<a data-slide-index="<?php echo $i; ?>" href=""><?php echo get_the_post_thumbnail( get_the_ID(), 'full' );?></a>
 		<?php endif; ?>
	<?php $i++; endwhile; ?>
</div>


<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div><!-- /.bauer-testimonails-g3 -->

<?php
$return = ob_get_clean();
echo $return;