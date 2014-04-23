<?php
/**
 * @package dearmonty
 */
?>

<article>

  <div class="container container-padded">
    <header>
      <h1 class="heading-1">
        <?php the_title(); ?>
      </h1>
    </header>

    <div class="entry-content">
    	<?php the_content(); ?>
    </div>

  	<?php include 'module-post-categories.php'; ?>
  </div>

</article>