<?php
/**
 * @package dearmonty
 */
?>

<div class="cc cc-med row">
  <article class="col col-main">
    <header>
      <?php if (!is_page()): ?>
        <div class="heading heading-4"><?php the_date(); ?></div>
      <?php endif; ?>
      <h1 class="heading heading-1">
        <?php if (get_field('question')) {
          the_field('question');
        } else {
          the_title();
        } ?>
      </h1>
      <?php if (get_field('answer')): ?>
        <div class="blockquote"><?php the_field('answer'); ?></div>
      <?php endif; ?>
    </header>

    <div class="entry-content">
    	<?php the_content(); ?>
    </div>

  	<?php
      if (!is_page())
      {
        include 'module-post-categories.php';
      }
    ?>

  </article>

  <aside class="col col-side well well-brown well-shadowed">
    <?php include "module-recent.php"; ?>
  </aside>
</div>