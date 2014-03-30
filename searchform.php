<?php
/**
 * The template for displaying search forms in dearmonty
 *
 * @package dearmonty
 */
?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="searchInput">
    Search
  </label>
	<input id="searchInput" type="search" class="search-input" name="searchInput">
	<input id="searchSubmit" type="submit" class="search-submit" value="Submit" />
</form>
