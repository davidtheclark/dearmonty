<?php
/**
 * Custom template tags for this theme.
 *
 * @package dearmonty
 */

if ( ! function_exists( 'dearmonty_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dearmonty_posted_on() {
	printf( __( '<time class="entry-date" datetime="%1$s">%2$s</time>', 'dearmonty' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_date() )
	);
}
endif;

/**
 * Pagination
 */
function dearmonty_pagination($the_query) {
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
	  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	  'format' => '?paged=%#%',
	  'current' => max( 1, get_query_var('paged') ),
	  'total' => $the_query->max_num_pages,
	  'type' => 'list',
	  'mid_size' => 1,
	) );
}
