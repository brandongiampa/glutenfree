<?php

function glfr_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function glfr_enqueue_scripts() {
    wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Bungee&family=Oswald:wght@200;300;400;500;600;700&display=swap', array() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.css', array(), '1.0.1' );
    wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.js', array(), '1.0.2', true );
}
add_action( 'wp_enqueue_scripts', 'glfr_enqueue_scripts' );

function glfr_theme_support() {

	//include customizer file 
	require_once get_template_directory() . '/inc/customizer.php';

	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => '1a1919',
		)
	);

	// Set content-width.
	// global $content_width;
	// if ( ! isset( $content_width ) ) {
	// 	$content_width = 580;
	// }
    
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'glfr-fullscreen', 1980, 9999 );

    	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

    	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	// add_theme_support( 'align-wide' );

	if ( class_exists( 'woocommerce' )) {
		add_theme_support( 'woocommerce' );
	}

}
add_action( 'after_setup_theme', 'glfr_theme_support' );

//add menus 
function glfr_create_menus() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'glfr' ),
	) );
}
add_action( 'init', 'glfr_create_menus' );

function glfr_register_sidebars() {
	register_sidebar( array(
		'name' => 'Page Right',
		'id' => 'blog_right',
		'description' => __( 'Widget area located at right column of pages and posts.', 'glfr' ),
		// 'before_widget' => $beforeWidget,
		// 'after_widget' => $afterWidget,
		// 'before_title' => $beforeTitle,
		// 'after_title' => $afterTitle,
	));
	register_sidebar( array(
		'name' => 'Modal (Clicked)',
		'id' => 'modal_clicked',
		'description' => __( 'Widget area that pops up when user clicks button fixed at lower right-hand corner.', 'glfr' ),
		// 'before_widget' => $beforeWidget,
		// 'after_widget' => $afterWidget,
		// 'before_title' => $beforeTitle,
		// 'after_title' => $afterTitle,
	));
}
add_action( 'widgets_init', 'glfr_register_sidebars' );

//gutenberg-related functions and actions
function glfr_set_up_gutenberg() {
	require_once get_template_directory() . "/inc/gutenberg.php";
}
add_action( 'after_setup_theme', 'glfr_set_up_gutenberg' );

function glfr_wc_open_container() {
	echo '<div class="container wc-container">';
}
add_action( 'woocommerce_before_main_content', 'glfr_wc_open_container' );

function glfr_wc_close_container() {
	echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'glfr_wc_close_container' );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

?>