<?php
/**
 * Template Name: Home
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <section class="bg-lined">
    <div class="cc p-y-med row">

      <section id="home-latest-post" class="col col-half-guttered">
        <?php
          // Query for most recent post
          $latest_post = new WP_Query('posts_per_page=1');
          while($latest_post->have_posts()) : $latest_post->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="link-block well well-brown well-shadowed">
            <h2 class="heading heading-4">
              <span class="icon icon-inline grunticon-newspaper-gray"></span>
              This Week's Article
            </h2>
            <h3 class="heading heading-3">
              <?php if (get_field('question')) {
                the_field('question');
              } else {
                the_title();
              } ?>
            </h3>
            <?php if (get_field('answer')) {
              the_field('answer');
            } else {
              the_excerpt();
            } ?>
          </a>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </section>

      <section class="col col-half-guttered">
        <div class="well well-white">
          <h2 class="heading heading-4">Recent Articles</h2>
          <ol class="list-unstyled">
            <?php
            // Query for 6 recent posts, not including most recent.
            $recent_posts_args = array(
              'posts_per_page' => 4,
              'offset' => 1,
            );
            $recent_posts_query = new WP_Query($recent_posts_args);
            // The Loop
            while ( $recent_posts_query->have_posts() ):
              $recent_posts_query->the_post();
            ?>
            <li>
              <a href="<?php the_permalink(); ?>" class="link-block link-in-list">
                <?php if (get_field('question')) {
                  the_field('question');
                } else {
                  the_title();
                } ?>
              </a>
            </li>
            <?php endwhile; ?>
          </ol>
          <a href="#home-articles" class="btn btn-rust">
            <span class="icon icon-sm icon-inline grunticon-books-white"></span>
            Read more Q&amp;A articles
          </a>
        </div>
      </section>

    </div>
  </section>

  <section id="home-articles" class="cc cc-med p-y-lg f-center">
    <h2 class="feature">Start by browsing hundreds of&nbsp;articles&nbsp;&hellip;</h2>
    <div class="row">
      <div class="col col-third-guttered">
        <a href="<?php echo esc_url(get_permalink(get_page_by_title('Home Buying'))); ?>" class="link-block home-action m-buying heading-2">
          <div class="home-icon grunticon-home-white"></div>
          Buying
        </a>
        <p>Buy a home buy a home buy a home buy a home buy a home buy a home</p>
      </div>
      <div class="col col-third-guttered">
        <a href="<?php echo esc_url(get_permalink(get_page_by_title('Home Selling'))); ?> " class="link-block home-action m-selling heading-2">
          <div class="home-icon grunticon-home2-white"></div>
          Selling
        </a>
        <p>Sell a home sell a home sell a home sell a home sell a home sell a home</p>
      </div>
      <div class="col col-third-guttered">
        <a href="<?php echo esc_url(get_permalink(get_page_by_title('Home Owning'))); ?> " class="link-block home-action m-owning heading-2">
          <div class="home-icon grunticon-home3-white"></div>
          Owning
        </a>
        <p>Owning a home owning a home owning a home owning a home owning a home </p>
      </div>
    </div>
  </section>

  <section class="bg-brown">
    <div class="cc cc-sm p-y-lg f-center">
      <h2 class="feature">Or try searching for a specific real&nbsp;estate&nbsp;topic&nbsp;&hellip;</h2>
      <form method="get" id="home-search" class="search-form" action="<?php echo esc_url( home_url( '/search' ) ); ?>" role="search">
        <label for="home-search-input" class="hide-visually">Search</label>
        <input id="home-search-input" class="search-input m-lg" type="search" name="q" placeholder="Search">
        <button id="home-search-submit" class="search-submit" type="submit">
          <span class="icon grunticon-search-gray"></span>
          <span class="hide-visually">Submit</span>
        </button>
      </form>
    </div>
  </section>

  <section class="bg-green">
    <div class="cc cc-sm p-y-lg f-center">
      <h2 class="feature">Still have questions? Ask&nbsp;Monty!</h2>
      <p>Fill out our short form and Monty may choose your question for an article.</p>
      <p>
        <a href="<?php echo get_permalink(39); ?>" class="btn btn-clear btn-lg">
          <span class="icon icon-inline grunticon-quill-white"></span>
          Ask Monty a Question
        </a>
      </p>
    </div>
  </section>

  <section>
    <div class="cc cc-sm p-y-lg f-center">
      <h2 class="feature">Ready to buy or sell? Want guidance finding an agent?</h2>
      <p>If you are ready to go and currently looking for a real estate  agent, you can work with us to find the best fit in your local area. <em>By the way, it’s completely free, too!</em></p>
      <p>
        <a href="<?php echo get_permalink(41); ?>" class="btn btn-orange btn-lg">
          <span class="icon icon-inline grunticon-profile-white"></span>
          Find an Agent
        </a>
      </p>
    </div>
  </section>

  <section class="bg-blue rel">
    <div id="random-testimonial" class="p-y-lg f-center" data-random-href="<?php echo get_permalink(get_page_by_path('Random Testimonial')); ?>">
      <?php // just empty: gets populated by JS ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>