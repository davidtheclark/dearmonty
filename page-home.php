<?php
/**
 * Template Name: Home
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <!-- temporary pattern library -->
  <div class="pattern-library" style="padding: 2em;">

    <h1 class="heading-1">Pattern Library</h1>

    <h2 class="heading-2">Colors</h2>

    <div class="btn c-red">red</div>
    <div class="btn c-rust">rust</div>
    <div class="btn c-brown">brown</div>
    <div class="btn c-blue">blue</div>
    <div class="btn c-gray">gray</div>
    <div class="btn c-dark">dark</div>
    <div class="btn c-brown-light">brown-light</div>
    <div class="btn c-gray-light">gray-light</div>

    <h2 class="heading-2">Typography</h2>

    <h3 class="heading-3">Regular Text</h3>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. <a href="#">And here is a hyperlink</a>. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. <a href="#">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</a> In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
    <div class="heading-1">Heading 1</div>
    <div class="heading-2">Heading 2</div>
    <div class="heading-3">Heading 3</div>
    <section class="m-sm-tb">
      <h3 class="heading-3">Light Text</h3>
      <p class="f-light">This is lighter text.</p>
    </section>
    <section class="m-sm-tb">
      <h3 class="heading-3">Small Text</h3>
      <p class="f-sm">This is smaller text, useful for stuff that people may as well ignore and probably will.</p>
    </section>

    <p>
      <button class="btn btn-light">light button</button>
      <button class="btn btn-dark">dark button</button>
      <button class="btn-sm btn-light">small light button</button>
      <button class="btn-sm btn-dark">small dark button</button>
    </p>

    <div class="m-tb">
      <p class="well">
        white well
      </p>
      <p class="well well-brown">
        brown well
      </p>
      <p class="well well-shadowed">
        white well shadowed
      </p>
      <p class="well well-brown well-shadowed">
        brown well shadowed
      </p>
    </div>

    <div class="m-tb">
      <h2 class="heading-2">Form</h2>
      <label>Input</label>
      <input type="text">
      <label>Textarea</label>
      <textarea name="" id="" rows="3"></textarea>
      <label>Radios and Checkboxes</label>
      <label>
        <input type="radio">
        radio
      </label>
      <label>
        <input type="checkbox">
        checkbox
      </label>
      <label>
        <input type="radio">
        radio
      </label>
      <label>
        <input type="checkbox">
        checkbox
      </label>
    </div>

  </div>
  <!-- end pattern library -->

  <section>
    <div class="container container-padded">
      <?php
        // Homepage-specific content.
        while ( have_posts() ) : the_post(); ?>

        <div class="home-hero">
          <h1 class="home-hero-text">Dear Monty</h1>
        </div>

        <?php the_content(); ?>

        <?php include "module-actions.php"; ?>

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
    <div id="random-testimonial" class="container container-padded">
      <h2 class="hide-visually">Testimonials</h2>
      <div id="random-testimonial-inner">
        <?php include "module-random-testimonial.php"; ?>
      </div>
      <a href="<?php echo get_permalink(get_page_by_path('Random Testimonial')); ?>" class="btn btn-light js-testimonials-link">See All</a>
    </div>
  </section>

</main>

<?php get_footer(); ?>