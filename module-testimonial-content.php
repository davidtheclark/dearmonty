<figure id="testimonial-<?php the_ID(); ?>" class="testimonial">
  <blockquote class="testimonial-blockquote">
    <?php the_content(); ?>
  </blockquote>
  <figcaption class="testimonial-caption">
    <?php the_field('source'); ?>
    <?php if ( get_field('location') ): ?>
    <div>
      <?php the_field('location'); ?>
    </div>
    <?php endif; ?>
  </figcaption>
</figure>