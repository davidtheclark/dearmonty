<?php
/**
 * Template Name: Random Testimonial
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <div class="container container-padded">

    <?php while ( have_posts() ) : the_post(); ?>
      <h1 class="heading-1"><?php the_title(); ?></h1>
    <?php endwhile; ?>

    <?php include "module-random-testimonial.php"; ?>

    <a href="<?php echo get_permalink(get_page_by_path('Random Testimonial')); ?>" id="random-testimonial-btn" class="btn-sm btn-light">See Another</a>

  </div>

</main>

<?php get_footer(); ?>