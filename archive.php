<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

	<div class="container container-padded">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							echo 'Category: ' . single_cat_title( '', false );

						elseif ( is_tag() ) :
							echo 'Tag: ' . single_tag_title( '', false );

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							echo 'Author: ' . get_the_author( '', false );

							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						else :
							echo 'Archives';

						endif;
					?>
				</h1>

				<?php
					if ( is_category() ) :
						// show an optional category description
						$category_description = category_description();
						if ( ! empty( $category_description ) ) :
							echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
						endif;

					elseif ( is_tag() ) :
						// show an optional tag description
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) ) :
							echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						endif;

					endif;
				?>

			</header><!-- .page-header -->

			<ol class="post-list">
	      <?php while ( have_posts() ) : the_post(); ?>
	        <li class="post-in-list">
	          <?php get_template_part( 'content', 'index' ); ?>
	        </li>
	      <?php endwhile; ?>
	    </ol>

	    <?php dearmonty_pagination($wp_query); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>