<?php
  $post_categories = wp_get_post_categories( $post->ID );
  if (count($post_categories) > 1 || $post_categories[0] != 1):
?>
<footer>
  <dl class="categories">
    <dt>Categories</dt>

    <?php foreach($post_categories as $c):
        if ($c != 1):
          $cat = get_category($c);
    ?>
    <dd>
      <a href="<?php echo get_category_link($c); ?>"><?php echo $cat->name; ?></a>
    </dd>
    <?php
      endif;
      endforeach;
    ?>

  </dl>
</footer>
<?php endif; ?>