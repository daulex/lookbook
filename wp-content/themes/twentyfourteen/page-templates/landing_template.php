<?php
/**
 * Template Name: Landing Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php
	if ( is_front_page()) {
		// Include the featured content template.
		get_template_part( 'landing' );
	}
	else{

echo 'nothing here';

	}
?>


<?php
get_footer();
