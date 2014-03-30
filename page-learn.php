<?php
/**
 * Template Name: Learn
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <div class="container container-padded">
    <?php while ( have_posts() ) : the_post();
      $page_num = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
      <h1>
        <?php the_title(); ?>
        <?php if ($page_num !== 1): ?>
          (page <?php echo $page_num; ?>)
        <?php endif; ?>
      </h1>

      <?php if ($page_num === 1): ?>
        <?php the_content(); ?>

        <p>stuff about buying and selling</p>

        <h2>Q &amp; A Posts</h2>
      <?php endif; ?>

      <ol class="post-list">
        <?php
        // Get posts of the associated category.
        $all_posts_args = array(
          'post_type' => 'post',
          'paged' => $page_num
        );
        $all_posts_query = new WP_Query($all_posts_args);
        // The Loop
        while ( $all_posts_query->have_posts() ):
          $all_posts_query->the_post();
        ?>
        <li class="post-in-list">
          <?php get_template_part( 'content', 'index' ); ?>
        </li>
        <?php endwhile; ?>
      </ol>

      <?php dearmonty_pagination($all_posts_query); ?>

    <?php endwhile; ?>


  </div>

</main>

<?php get_footer(); ?>