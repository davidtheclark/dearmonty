<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dearmonty
 */
?>

<article id="post-0" class="post no-results not-found">

	<header class="entry-header">
		<h1 class="entry-title">
			Nothing found.
		</h1>
	</header>

	<div class="entry-content">
		<?php if ( is_search() ) : ?>

			<p>
				Sorry, but nothing matched your search terms. Please try again.
			</p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p>
				It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help."
			</p>

			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</article>