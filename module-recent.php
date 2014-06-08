<h1 class="heading heading-4">Monty's Recent Answers</h1>
<ol class="list-unstyled">
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
  <li>
    <a href="<?php the_permalink(); ?>" class="link-in-list"><?php the_title(); ?></a>
  </li>
  <?php endwhile; ?>
</ol>