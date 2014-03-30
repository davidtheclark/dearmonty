<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>

</main><!-- #primary -->

<?php get_footer(); ?>