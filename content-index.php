<?php
/**
 * @package dearmonty
 */
?>

<article>

  <header>
    <h1 class="heading-2">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <!-- <a class="entry-more" href="<?php echo get_permalink(get_the_ID()); ?>">read more</a> -->
  </div>

  <?php include 'module-post-categories.php'; ?>

</article>