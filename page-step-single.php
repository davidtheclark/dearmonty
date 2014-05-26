<?php
/**
 * Template Name: Step Single
 *
 * @package dearmonty
 */

get_header();?>

<main class="content-container row" role="main">
  <?php while ( have_posts() ) : the_post();
  $parent_id = $post->post_parent;
  $parent = get_post($parent_id);
  $parent_title = $parent->post_title;
  $steps_parent_id = $parent_id;
  $steps_parent_name = $parent->post_name;
  ?>

  <div class="container col col-main">
    <?php
      $page_num = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

      <?php
      $parent_url = get_permalink($parent_id);
      $step_title = get_the_title();
      ?>

      <a href="<?php echo $parent_url ?>" class="heading heading-4"><?php echo $parent_title; ?></a>
      <h1 class="heading heading-1">
        <?php the_title(); ?>
      </h1>

      <?php if ($page_num === 1) : ?>
        <?php the_content(); ?>
      <?php else: ?>
        <h2 class="heading heading-4">[page <?php echo $page_num ?>]</h2>
      <?php endif; ?>

      <ol class="post-list">
        <?php
        $category = get_field('associated_category');
        // Get posts of the associated category.
        $steps_posts_args = array(
          'cat' => $category
        );
        $steps_posts_query = new WP_Query($steps_posts_args);
        // The Loop
        while ( $steps_posts_query->have_posts() ):
          $steps_posts_query->the_post();
        ?>
        <li class="post-in-list">
          <?php get_template_part( 'content', 'index' ); ?>
        </li>
        <?php endwhile; ?>
      </ol>

      <?php dearmonty_pagination($steps_posts_query); ?>

    <?php endwhile; ?>
  </div>


  <?php
    include "module-steps-sidebar.php";
  ?>


</main>

<?php get_footer(); ?>