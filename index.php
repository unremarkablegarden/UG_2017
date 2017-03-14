<?php
/**
 * The main template file
 *
 * Based on Olle's WP starter, 2017.
 * Gulp (pack, uglify), Bulma, Barba.js, SASS, jQuery + UI, Move.js, Flickity
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UG_2017
 */

get_header(); ?>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

<?php
get_sidebar();
get_footer();
