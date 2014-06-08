<?php
/**
 * Template Name: Form
 *
 * @package dearmonty
 */

get_header(); ?>

<div class="cc cc-med row" role="main">

  <main class="col col-main">

    <h1 class="heading heading-1"><?php the_title(); ?></h1>

    <div class="well well-brown">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>

    </div>

  </main>

  <aside class="col col-side well well-brown well-shadowed">
    <?php include "module-recent.php" ?>
  </aside>

</div>

<?php get_footer(); ?>