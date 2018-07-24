<?php
/**
 * CCPS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CCPS
 */

if ( ! function_exists( 'ccps_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ccps_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CCPS, use a find and replace
		 * to change 'ccps' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ccps', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'Slider_Images', 1900, 360, true );
		add_image_size( 'Blog_Images', 744, 465, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ccps' ),
			'social-menu-1' => esc_html__( 'Social Icons', 'ccps' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ccps_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ccps_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ccps_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ccps_content_width', 640 );
}
add_action( 'after_setup_theme', 'ccps_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ccps_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ccps' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ccps' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ccps_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ccps_scripts() {

	$localLink = get_stylesheet_directory_uri() . '/MDB-Pro';

	$link = "https://fonts.googleapis.com/css?family=";
	$link .= "Lato:300,300i,400,400i,700,700i";
	wp_enqueue_style( 'ccps-googlefonts', $link, array(), '0.0.1' );

	// MDB & Boostrap
	wp_enqueue_style( 'ccps-mdb-bootstrap', get_stylesheet_directory_uri() . '/mdb-bootstrap.css' );

	// Custom Stylesheets
	wp_enqueue_style( 'ccps-style', get_stylesheet_uri() );

	// JS
	$fldr = "/js/";
	$ext = ".js";
	$fldr = "/js/min/";
	$ext = ".min.js";

	// jQuery
	wp_enqueue_script( 'ccps-jsquery', $localLink . "/js/jquery-3.3.1.min.js", array(), '3.3.1', true );

	// Custom JS
	wp_enqueue_script( 'ccps-custom', get_template_directory_uri() . "{$fldr}custom{$ext}", array(), '0.0.1', true );

	// Popper JS
	wp_enqueue_script( 'ccps-popper', $localLink . "/js/popper.min.js", array(), '0.0.1', true );

	// Bootstrap JS
	wp_enqueue_script( 'ccps-bootstrap', $localLink . "/js/bootstrap.min.js", array(), '0.0.1', true );

	// MDB JS
	wp_enqueue_script( 'ccps-MDB', $localLink . "/js/mdb.min.js", array(), '0.0.1', true );

	wp_localize_script( 'ccps-custom', 'ajaxObj', array(
		'ajaxURL'	=> admin_url( 'admin-ajax.php' ),
		'nonce'		=> wp_create_nonce( 'wp_rest' ),
		'siteURL'	=> get_site_url()
	));

	wp_enqueue_script( 'ccps-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ccps-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ccps_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Bootstrap Navigation
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require "inc/phpajaxcalls.php";
require "inc/pagination.php";
require "inc/ava-shortcodes.php";
require "inc/cpt.php";

function add_allowed_origins( $origins ) {
	$origins[] = 'http://localhost:7884';
	$origins[] = 'http://localhost';
	return $origins;
}
add_filter( 'allowed_http_origins', 'add_allowed_origins' );


if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array (
		'page_title'	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug'		=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}