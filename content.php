<?php
/**
 * @package dearmonty
 */
?>

<div class="container container-padded row">
  <article class="article">
    <header>
      <h1 class="heading-1">
        <?php the_title(); ?>
      </h1>
    </header>

    <div class="entry-content">
    	<?php the_content(); ?>
    </div>

  	<?php include 'module-post-categories.php'; ?>

  </article>

  <aside class="article-side">
    <div class="well">
      Monty's Recent Answers
      <ol>
        <li><a href="">something</a></li>
        <li><a href="">something</a></li>
        <li><a href="">something</a></li>
        <li><a href="">something</a></li>
        <li><a href="">something</a></li>
        <li><a href="">something</a></li>
      </ol>
    </div>
  </aside>
</div>