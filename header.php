<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package dearmonty
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title('|'); ?></title>
	<meta property="og:title" content="<?php echo get_bloginfo( 'title' ); ?>">
  <meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets-dist/images/dearmonty-logo.png">
  <meta property="og:url" content="<?php echo get_bloginfo( 'url' ); ?>">
  <meta property="og:type" content="website">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets-dist/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<script src="<?php echo get_template_directory_uri(); ?>/assets-dist/js/modernizr-custom.js"></script>

	<?php // skip nav styling and JS fix from http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links ?>
	<style>#skip-nav{display:block;background-color:#fff;padding:1em;position:absolute;top:0;left:-9999px;}#skip-nav:focus{left:0;}</style>
	<script>window.addEventListener("hashchange",function(e){var t=document.getElementById(location.hash.substring(1));if(t){if(!/^(?:a|select|input|button|textarea)$/i.test(t.tagName)){t.tabIndex=-1}t.focus()}},false)</script>

	<?php // grunticon ?>
	<script>/* grunticon Stylesheet Loader | https://github.com/filamentgroup/grunticon | (c) 2012 Scott Jehl, Filament Group, Inc. | MIT license. */window.grunticon=function(e){if(e&&3===e.length){var t=window,n=!(!t.document.createElementNS||!t.document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||window.opera&&-1===navigator.userAgent.indexOf("Chrome")),o=function(o){var r=t.document.createElement("link"),a=t.document.getElementsByTagName("script")[0];r.rel="stylesheet",r.href=e[o&&n?0:o?1:2],a.parentNode.insertBefore(r,a)},r=new t.Image;r.onerror=function(){o(!1)},r.onload=function(){o(1===r.width&&1===r.height)},r.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}};grunticon(["<?php echo get_template_directory_uri(); ?>/assets-dist/grunticon/icons.data.svg.css", "<?php echo get_template_directory_uri(); ?>/assets-dist/grunticon/icons.data.png.css", "<?php echo get_template_directory_uri(); ?>/assets-dist/grunticon/icons.fallback.css"]);
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="page">

		<?php do_action( 'before' ); ?>

		<header id="header" class="site-header cc row" role="banner">

			<a id="skip-nav" href="#site-body">Skip to content</a>

			<a id="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo get_template_directory_uri(); ?>/assets-dist/images/dearmonty-logo.png" alt="DearMonty: No-nonsense real estate advice">
			</a>

			<div id="nav-container" class="row">

				<nav id="nav-inner" role="navigation">
				  <?php wp_nav_menu( array(
				    'theme_location' => 'header_primary',
				    'menu_class' => 'nav nav-primary',
				    'container' => ''
				  )); ?>
				  <?php wp_nav_menu( array(
				    'theme_location' => 'header_secondary',
				    'menu_class' => 'nav nav-secondary',
				    'container' => ''
				  )); ?>
				</nav>

				<form method="get" id="header-search" class="search-form" action="<?php echo esc_url( home_url( '/search' ) ); ?>" role="search">
					<label for="header-search-input" class="hide-visually">Search</label>
					<input id="header-search-input" type="search" name="q" class="search-input" placeholder="Search">
					<button id="header-search-submit" class="search-submit" type="submit">
				    <span class="icon grunticon-search-gray"></span>
				    <span class="hide-visually">Submit</span>
				  </button>
				</form>

			</div>

		</header>

		<div id="site-body">