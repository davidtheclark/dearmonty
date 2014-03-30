<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

	<article id="post-0" class="post error404 not-found">

		<header class="entry-header">
			<h1 class="entry-title">
				That page cannot be found.
			</h1>
		</header>

		<div class="entry-content">
			<p>
				Please try another URL or <a rel="home" href="<?php echo home_url(); ?>">return to the homepage</a>.
			</p>
		</div>
	</article>

</main>

<?php get_footer(); ?>