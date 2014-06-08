<?php
/**
 * @package dearmonty
 */
?>

<div class="cc cc-med row">
  <article class="col col-main">
    <header>
      <h1 class="heading heading-1">
        <?php the_title(); ?>
      </h1>
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