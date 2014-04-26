<nav>
  <ul class="breadcrumb">
    <?php
    // assuming a $post
    $ancestors = array_reverse(get_ancestors($post->ID, 'page'));
    foreach($ancestors as $a):
    ?>
    <li>
      <a href="<?php echo get_permalink($a); ?> "><?php echo get_the_title($a); ?></a>
    </li>
    <?php endforeach; ?>
    <li>
      <?php echo the_title(); ?>
    </li>
  </ul>
</nav>