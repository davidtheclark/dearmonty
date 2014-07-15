<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

	<div class="cc cc-med row">
	  <article class="col col-main">
	    <header>
	      <h1 class="heading heading-1">The page cannot be found</h1>
	    </header>

	    <div class="entry-content">
	    	<ul>
	    		<li>Try searching below (or above, in the menu) for what you're looking for &hellip;</li>
	    		<li>Or check out one of Monty's Recent Answers &hellip;</li>
	    		<li>Or <a rel="home" href="<?php echo home_url(); ?>">go to the homepage</a>.</li>
	    	</ul>

	    	<form method="get" id="home-search" class="search-form" action="<?php echo esc_url( home_url( '/search' ) ); ?>" role="search">
	    	  <label for="home-search-input" class="hide-visually">Search</label>
	    	  <input id="home-search-input" class="search-input m-lg" type="search" name="q" placeholder="Search">
	    	  <button id="home-search-submit" class="search-submit" type="submit">
	    	    <span class="icon grunticon-search-gray"></span>
	    	    <span class="hide-visually">Submit</span>
	    	  </button>
	    	</form>
	    </div>

	  </article>

	  <aside class="col col-side well well-brown well-shadowed">
	    <?php include "module-recent.php"; ?>
	  </aside>
	</div>

</main>

<?php get_footer(); ?>