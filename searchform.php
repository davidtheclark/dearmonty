<?php
/**
 * The template for displaying search forms in dearmonty
 *
 * @package dearmonty
 */
?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/search' ) ); ?>" role="search">
	<label for="searchInput">
    Search
  </label>
	<input id="q" type="search" class="search-input" name="q">
	<button id="searchSubmit" type="submit" class="search-submit">Submit</button>
</form>