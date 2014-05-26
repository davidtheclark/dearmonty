<?php
/**
 * @package dearmonty
 */
?>

<div class="content-container row">
  <article class="col col-main">
    <header>
      <h1 class="heading heading-1">
        <?php the_title(); ?>
      </h1>
    </header>

    <div class="entry-content">
    	<?php the_content(); ?>
    </div>

  	<?php include 'module-post-categories.php'; ?>

  </article>

  <aside class="col col-side well well-brown well-shadowed">
    <h1 class="heading heading-4">Monty's Recent Answers</h1>
    <ol class="post-list-side">
      <?php
      // Query for 6 recent posts, not including most recent.
      $recent_posts_args = array(
        'posts_per_page' => 5,
      );
      $recent_posts_query = new WP_Query($recent_posts_args);
      // The Loop
      while ( $recent_posts_query->have_posts() ):
        $recent_posts_query->the_post();
      ?>
      <li class="post-in-list-side">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?>&nbsp;&raquo;</a>
      </li>
      <?php endwhile; ?>
    </ol>
  </aside>
</div>