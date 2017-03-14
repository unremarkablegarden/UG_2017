<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UG_2017
 */

get_header(); ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();


		endwhile; // End of the loop.
		?>


<?php
get_sidebar();
get_footer();
