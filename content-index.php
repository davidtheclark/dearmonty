<?php
/**
 * @package dearmonty
 */
?>

<article>

  <header>
    <h1 class="heading heading-3">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <?php include 'module-post-categories.php'; ?>

</article>