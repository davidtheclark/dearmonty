<?php
/**
 * @package dearmonty
 */
?>

<article>

  <header>
    <h1>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
    <div>
      <?php dearmonty_posted_on(); ?>
    </div>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <!-- <a class="entry-more" href="<?php echo get_permalink(get_the_ID()); ?>">read more</a> -->
  </div>

  <footer>
    <dl class="categories">
      <dt>Categories</dt>
      <dd>
        <ul class="categories-list">
          <?php wp_list_categories(array(
            'hierarchical' => false,
            'title_li' => ''
          )); ?>
        </ul>
      </dd>
    </dl>
  </footer>

</article>