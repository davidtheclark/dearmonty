<?php
/**
 * Template Name: Home
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <section>
    <div class="container container-padded">
      <?php
        // Homepage-specific content.
        while ( have_posts() ) : the_post(); ?>

        <div class="home-hero">
          <h1 class="home-hero-text">Dear Monty</h1>
        </div>

        <?php the_content(); ?>

        <h2>Actions</h2>
        <ul class="home-actions-list">
          <li class="home-action">
            <a href="<?php the_field('home_cta_one_url'); ?> ">
              <h3><?php the_field('home_cta_one_title'); ?></h3>
              <?php the_field('home_cta_one_text'); ?>
            </a>
          </li>
          <li class="home-action">
            <a href="<?php the_field('home_cta_two_url'); ?> ">
              <h3><?php the_field('home_cta_two_title'); ?></h3>
              <?php the_field('home_cta_two_text'); ?>
            </a>
          </li>
          <li class="home-action">
            <a href="<?php the_field('home_cta_three_url'); ?> ">
              <h3><?php the_field('home_cta_three_title'); ?></h3>
              <?php the_field('home_cta_three_text'); ?>
            </a>
          </li>
        </ul>

      <?php endwhile; ?>
    </div>
  </section>

  <section>
    <div class="container container-padded">
      <h2>Recent Posts</h2>
      <ol class="post-list">
      <?php
      // Query for top 3 recent posts.
      $recent_posts_args = array(
        'posts_per_page' => 3,
        'usepaging' => true
      );
      $recent_posts_query = new WP_Query($recent_posts_args);
      // The Loop
      while ( $recent_posts_query->have_posts() ):
        $recent_posts_query->the_post();
      ?>
        <li class="post-in-list">
          <?php get_template_part( 'content', 'index' ); ?>
        </li>
      <?php endwhile; ?>
      </ol>

      <a href="<?php echo get_permalink(43); ?>">Read more Q&amp;A articles</a>
    </div>
  </section>

  <section>
    <div class="container container-padded">
      <h2>Testimonials</h2>
      <ul class="home-testimonials-list">
        <?php
        // Query for testimonials.
        $testimonials_args = array(
          'post_type' => 'testimonial',
          'nopaging' => true
        );
        $testimonials_query = new WP_Query( $testimonials_args );
        // The Loop
        while ( $testimonials_query->have_posts() ):
          $testimonials_query->the_post();
        ?>
        <li>
          <figure>
            <blockquote class="home-testimonial-blockquote">
              <?php the_content(); ?>
            </blockquote>
            <figcaption>
              <?php the_field('source'); ?>
              <?php if ( get_field('location') ): ?>
              <div>
                <?php the_field('location'); ?>
              </div>
              <?php endif; ?>
            </figcaption>
          </figure>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>

</main>

<?php get_footer(); ?>