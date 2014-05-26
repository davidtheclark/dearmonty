<?php
/**
 * Template Name: Step Index
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="content-container row" role="main">

  <div class="container col col-main">
    <?php while ( have_posts() ) : the_post(); ?>

      <h1 class="heading heading-1"><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <h2 class="heading heading-3">Steps</h2>
      <ol class="step-list">
        <?php
        // Get children pages -- the steps.
        $steps_args = array(
          'order' => 'ASC',
          'orderby' => 'menu_order',
          'post_type' => 'page',
          'post_parent' => $post->ID,
          'nopaging' => true
        );
        $steps_query = new WP_Query($steps_args);
        // The Loop
        while ( $steps_query->have_posts() ):
          $steps_query->the_post();
        ?>
        <li>
          <h3>
            <a href="<?php the_permalink(); ?> ">
              <?php the_title(); ?>
            </a>
          </h3>
          <?php if (get_field('summary')): ?>
            <?php the_field('summary') ?>
          <?php endif; ?>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ol>
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