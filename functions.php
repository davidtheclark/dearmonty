<?php
/**
 * dearmonty functions and definitions
 *
 * @package dearmonty
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'dearmonty_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function dearmonty_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/template-tags.php' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dearmonty' ),
		'footer' => 'Footer Menu'
	) );

	/**
	 * Enable support for Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // dearmonty_setup
add_action( 'after_setup_theme', 'dearmonty_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function dearmonty_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dearmonty' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'dearmonty_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function dearmonty_scripts() {

	if (!is_admin()) add_action("wp_enqueue_scripts", "the_scripts", 11);
	function the_scripts() {
		global $wp_scripts;
		// load third-party libs
		wp_enqueue_script('jquery');
		wp_register_script( 'libs', get_template_directory_uri() . '/assets-dist/js/libs.js', array(), false, true);
		// load compiled app
		wp_register_script( 'app', get_template_directory_uri() . '/assets-dist/js/app.js', array('libs'), false, true);
	 	wp_enqueue_script('app');
	}
}
add_action( 'wp_enqueue_scripts', 'dearmonty_scripts' );

/**
 * Custom post types
 */

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'testimonial',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' )
			),
		'public' => true,
		'exclude_from_search' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);
}