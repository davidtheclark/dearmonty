<?php $owning = ($steps_parent_name === 'home-owning'); ?>
<aside class="col col-side sidesteps m-<?php echo $steps_parent_name; ?>">
  <h2 class="heading heading-4">
    <?php if (!$owning): ?>
    The Steps of
    <?php endif; ?>
    <?php echo $parent_title; ?></h2>
  <ol class="steps-list<?php if ($owning) { echo ' steps-owning'; } ?>">
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
      <a href="<?php the_permalink(); ?>" class="sidestep-link"><?php the_title(); ?></a>
    </li>
    <?php endwhile; wp_reset_query(); ?>
  </ol>
</aside>