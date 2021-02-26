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
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.css', array(), '1.0.0' );
    wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.js', array(), '1.0.0', true );
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

	add_theme_support( 'align-wide' );

}
add_action( 'after_setup_theme', 'glfr_theme_support' );

//add menus 
function glfr_create_menus() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'THEMENAME' ),
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

//enqueue block assets
function glfr_enqueue_block_editor_assets() {
	// wp_enqueue_style( 'gutenberg-style', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( get_template_directory() . '/assets/css/style.css' ), 'all' );
	wp_enqueue_style( 'gutenberg-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'glfr_enqueue_block_editor_assets', 100 );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function glfr_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'Orange (Primary)', 'glfr' ),
			'slug'  => 'orange',
			'color' => '#fdb306'
		),
		array(
			'name'  => __( 'Light Green (Accent, Success)', 'glfr' ),
			'slug'  => 'light_green',
			'color' => '#93bb31'
		),
		array(
			'name'  => __( 'Dark Green (Background)', 'glfr' ),
			'slug'  => 'dark_green',
			'color' => '#12451e'
		),
		array(
			'name'  => __( 'Red (Danger)', 'glfr' ),
			'slug'  => 'red',
			'color' => '#FD3706'
		),
		array(
			'name'  => __( 'Dark Background 1', 'glfr' ),
			'slug'  => 'dark_background_1',
			'color' => '#172125 '
		),
		array(
			'name'  => __( 'Dark Background 2', 'glfr' ),
			'slug'  => 'dark_background_2',
			'color' => '#2a2828'
		)
	);

	add_theme_support( 'editor-color-palette', $editor_color_palette );


	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'glfr' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'glfr' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'glfr' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'glfr' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'glfr' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'glfr' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'glfr' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'glfr' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support( 'editor-styles' );

}

add_action( 'after_setup_theme', 'glfr_block_editor_settings' );

?>