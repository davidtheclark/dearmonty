<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

  <?php if ( have_posts() ) : ?>
    <ol class="post-list">
      <?php while ( have_posts() ) : the_post(); ?>
        <li class="post-list-i">
          <?php get_template_part( 'content', get_post_format() ); ?>
        </li>
      <?php endwhile; ?>
    </ol>

    <?php //dearmonty_content_nav( 'nav-below' ); ?>

  <?php else : ?>

    <?php get_template_part( 'no-results', 'index' ); ?>

  <?php endif; ?>

</main>

<?php get_footer(); ?>