<nav>
  <ul class="breadcrumb">
    <li>
      <a href="<?php get_home_url(); ?>">Home</a>
    </li>
    <?php
    $ancestors = array_reverse(get_ancestors($post->ID, 'page'));
    foreach($ancestors as $a):
    ?>
    <li>
      <a href="<?php echo get_permalink($a); ?> "><?php echo get_the_title($a); ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>