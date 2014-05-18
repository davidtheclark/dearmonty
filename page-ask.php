<?php
/**
 * Template Name: Ask
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <div class="container container-padded article">

    <h1 class="heading-1"><?php the_title(); ?></h1>

    <div id="ask-form" class="well well-brown">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
      <aside class="f-sm m-t">
        <p>I try to answer as many questions as I can but please understand that I can't always respond to every question.</p>
      </aside>
    </div>

  </div>

</main>

<?php get_footer(); ?>