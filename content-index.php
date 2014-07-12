<?php
/**
 * @package dearmonty
 */
?>

<article>

  <header>
    <h1 class="heading heading-3">
      <a href="<?php the_permalink(); ?>">
        <?php if (get_field('question')) {
          the_field('question');
        } else {
          the_title();
        } ?>
      </a>
    </h1>
  </header>

  <div class="post-list-date"><?php the_date(); ?></div>

  <?php include 'module-post-categories.php'; ?>

</article>