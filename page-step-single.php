<?php
/**
 * Template Name: Step Single
 *
 * @package dearmonty
 */

get_header();?>

<main class="site-content" role="main">

  <div class="container container-padded row">

    <div class="step-side">
      <div class="well">
        The Steps of Home Something
        <ol>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#">something</a></li>
        </ol>
      </div>
    </div>

    <div class="step-main">
      <?php while ( have_posts() ) : the_post();
        $page_num = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

        <?php
        $parent_id = $post->post_parent;
        $parent_title = get_post($parent_id)->post_title;
        $parent_url = get_permalink($parent_id);
        $step_title = get_the_title();
        ?>

        <h1 class="heading-1">
          <?php echo $parent_title; ?> &#35;<?php echo $post->menu_order; ?>: <?php the_title(); ?>
        </h1>

        <?php if ($page_num === 1) : ?>
          <div class="well well-brown well-shadowed">
            <?php the_content(); ?>
          </div>
        <?php else: ?>
          <h2>page <?php echo $page_num ?></h2>
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
  </div>

</main>

<?php get_footer(); ?>