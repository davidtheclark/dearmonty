<?php
/**
 * The template for displaying search forms in dearmonty
 *
 * @package dearmonty
 */
?>

<form method="get" id="search-form" class="search-form" action="<?php echo esc_url( home_url( '/search' ) ); ?>" role="search">
	<label for="search-input" class="hide-visually">Search</label>
	<input id="search-input" type="search" class="search-input" name="q" placeholder="Search">
	<button id="search-submit" type="submit" class="search-submit">
    <span class="grunticon-search"></span>
    <span class="hide-visually">Submit</span>
  </button>
</form>