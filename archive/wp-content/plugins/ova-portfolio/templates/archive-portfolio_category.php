<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$portfilio_type = isset( $_GET['portfolio_type'] ) ? $_GET['portfolio_type'] : OVAPO_Settings::archive_portfolio_type();

if( $portfilio_type == 'type1' ){
	ovapo_get_template( 'archive-portfolio-type1.php' );
}else if( $portfilio_type == 'type2' ) {
	ovapo_get_template( 'archive-portfolio-type2.php' );
} 

?>


<?php get_footer(); ?>