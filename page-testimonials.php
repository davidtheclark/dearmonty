<?php
/**
 * Template Name: Testimonials
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <div class="container container-padded">

    <?php while ( have_posts() ) : the_post(); ?>
      <h1 class="heading-1"><?php the_title(); ?></h1>
    <?php endwhile; ?>

    <div id="testimonials">
      <ul>
        <?php
        // Query for testimonials.
        $testimonials_args = array(
          'post_type' => 'testimonial',
          'orderby' => 'rand',
          'nopaging' => true
        );
        $testimonials_query = new WP_Query( $testimonials_args );
        // The Loop
        while ( $testimonials_query->have_posts() ):
          $testimonials_query->the_post();
        ?>
        <li>
          <?php include "module-testimonial-content.php"; ?>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>

  </div>


</main>

<?php get_footer(); ?>