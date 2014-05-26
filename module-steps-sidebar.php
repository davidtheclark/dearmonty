<aside class="sidebar m-<?php echo $steps_parent_name; ?>">
  <h2 class="heading-3">The Steps of <?php the_title(); ?></h2>
  <ol class="sidebar-steps-list">
    <?php
    // Get children pages -- the steps.
    $steps_args = array(
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'post_type' => 'page',
      'post_parent' => $steps_parent_id,
      'nopaging' => true
    );
    $steps_query = new WP_Query($steps_args);
    // The Loop
    while ( $steps_query->have_posts() ):
      $steps_query->the_post();
    ?>
    <li>
      <a href="<?php the_permalink(); ?> "><?php the_title(); ?></a>
    </li>
    <?php endwhile; wp_reset_query(); ?>
  </ol>
</aside>