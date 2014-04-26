<?php
/**
 * Template Name: Ask
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <div class="container container-padded">

    <form action="" id="ask-form" class="well well-brown">
      <?php while ( have_posts() ) : the_post(); ?>
      <h1 class="heading-1"><?php the_title(); ?></h1>
      <?php endwhile; ?>

      <label for="ask-question">What is your question?</label>
      <textarea id="ask-question" rows="10"></textarea>

      <label for="ask-name">Your name</label>
      <input type="text" id="ask-name" placeholder="e.g. Thomas Edison">

      <label for="ask-email">Your email</label>
      <input type="email" id="ask-email" placeholder="e.g. name@place.com">

      <button type="submit" id="ask-submit" class="btn btn-dark m-t">Submit</button>

      <aside class="f-sm m-t">
        <p>I try to answer as many questions as I can but please understand that I can't always respond to every question.</p>
      </aside>
    </form>

  </div>

</main>

<?php get_footer(); ?>