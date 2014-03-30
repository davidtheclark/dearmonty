<?php
/**
 * @package dearmonty
 */
?>

<article>

  <div class="container container-padded">
    <header>
      <h1>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
      <?php if (!is_page()): ?>
  	    <div>
  	      <?php dearmonty_posted_on(); ?>
  	    </div>
    	<?php endif; ?>
    </header>

    <div class="entry-content">
    	<?php the_content(); ?>
    </div>

  	<footer>
  		<?php if (!is_page()): ?>
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
  		<?php endif; ?>
  	</footer>
  </div>

</article>