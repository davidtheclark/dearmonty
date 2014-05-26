<?php
/**
 * Template Name: Step Index
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content container row" role="main">

  <?php
    $steps_parent_id = $post->ID;
    $steps_parent_name = $post->post_name;
    include "module-steps-sidebar.php";
  ?>

  <div class="main-with-sidebar container-padded">
    <?php while ( have_posts() ) : the_post(); ?>

      <h1 class="heading-1"><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <h2>Steps</h2>
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
              Step <?php echo $post->menu_order; ?>: <?php the_title(); ?>
            </a>
          </h3>
          <?php if (get_field('summary')): ?>
            <?php the_field('summary') ?>
          <?php endif; ?>
        </li>
        <?php endwhile; ?>
      </ol>

    <?php endwhile; ?>
  </div>


</main>

<?php get_footer(); ?>