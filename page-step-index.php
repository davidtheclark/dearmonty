<?php
/**
 * Template Name: Step Index
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="cc cc-med row" role="main">

  <div class="col col-main">
    <?php while ( have_posts() ) : the_post(); ?>

    <h1 class="heading heading-1"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>

  <?php
    $steps_parent_id = $post->ID;
    $steps_parent_name = $post->post_name;
    $parent_title = $post->post_title;
    include "module-steps-sidebar.php";
  ?>

  <?php endwhile; ?>


</main>

<?php get_footer(); ?>