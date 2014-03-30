<?php
/**
 * Template Name: Step Single
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <div class="container container-padded">
    <?php while ( have_posts() ) : the_post(); ?>

      <?php include('breadcrumb.php'); ?>

      <?php
      $parent_id = $post->post_parent;
      $parent_title = get_post($parent_id)->post_title;
      $parent_url = get_permalink($parent_id);
      ?>

      <h1>
        <?php echo $parent_title; ?> Step <?php echo $post->menu_order; ?>:
        <br>
        <?php the_title(); ?>
      </h1>
      <?php the_content(); ?>

      <h2>Recent Related Posts</h2>
      <ol class="post-list">
        <?php
        $category = get_field('associated_category');
        // Get posts of the associated category.
        $steps_posts_args = array(
          'cat' => $category,
          'post_count' => 3,
          'nopaging' => true
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

      <a href="<?php echo esc_url(get_category_link($category)); ?>">
        Browse all Q&amp;A Articles about this step
      </a>

    <?php endwhile; ?>
  </div>

</main>

<?php get_footer(); ?>