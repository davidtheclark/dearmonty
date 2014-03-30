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
	<!-- CHECK META CONTENT -->
	<title>
		<?php echo get_bloginfo( 'title' ); ?>
	</title>
	<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
	<meta property="og:title" content="<?php echo get_bloginfo( 'title' ); ?>">
  <meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <meta property="og:image" content="">
  <meta property="og:url" content="<?php echo get_bloginfo( 'url' ); ?>">
  <meta property="og:type" content="website">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets-dist/css/main.css">

	<!-- Don't forget to replace Modernizr's full dev script with a custom build! -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets-dist/js/modernizr-dev.js"></script>

	<style>#skipNav{display: block;background-color:#fff;padding:1em;position: absolute;top: 0;left: -9999px;}#skipNav:focus{left:0;}</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="page">

		<?php do_action( 'before' ); ?>

		<header class="site-header" role="banner">

			<div class="container container-padded">

				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>

				<a id="skipNav" href="#siteBody">Skip navigation</a>
				<nav class="site-nav-c" role="navigation">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => 'site-nav',
						'container' => ''
					)); ?>
				</nav>

			</div>

		</header>

		<div id="siteBody" class="site-body">