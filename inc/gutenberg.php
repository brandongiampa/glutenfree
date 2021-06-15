<?php
/**
 * These functions are all related to Gutenberg. This file is included in functions.php.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */

 /**
 * Table of Contents:
 * Enqueue Block Editor Assets
 * Block Editor Settings
 * Make Recent Posts Array
 */
?>

<?php

/** 
 * Enqueue style for Gutenberg page, and 
 * Cheating to register block type for customer and localize script to access on front end.
**/
function glfr_enqueue_block_editor_assets() {
	// wp_enqueue_style( 'gutenberg-style', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( get_template_directory() . '/assets/css/style.css' ), 'all' );
	wp_enqueue_style( 'gutenberg-style', get_template_directory_uri() . '/dist/bootstrap.css', array(), '1.0.2', 'all' );

	wp_register_script( 
		'glfr-gutenberg-custom-blocks',  
		get_template_directory_uri() . '/gutenberg/blocks.js',
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-api' ],
		 "1.2.2",
		 true
	);
	wp_enqueue_script( 'glfr-gutenberg-custom-blocks' );
	wp_localize_script( 'glfr-gutenberg-custom-blocks', 'glfr_wp', array(
		'recent_posts'			=>	glfr_make_recent_posts_array(),
		'post_categories'		=>	get_categories()
	) );
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

function glfr_make_recent_posts_array() {

	require_once( get_template_directory() . "/classes/class-glfr-recent-post.php" );

	$output = array();
	$categories = get_categories();

	//get recent posts for each category, max 8
	foreach( $categories as $category ) {

		$posts = wp_get_recent_posts( array( 
			'numberposts'	=> 8,
			'post_status'	=> 'publish',
			'category'		=> get_cat_ID( $category->name )
		) );
		
		foreach( $posts as $post ) {

			$recent_post = new GLFR_Recent_Post( $post, $category->name );

			array_push( $output, $recent_post );

		}
	}	

	//get recent posts for category: "all"
	$posts = wp_get_recent_posts( array( 
		'numberposts'	=> 8,
		'post_status'	=> 'publish'
	) );
		
	foreach( $posts as $post ) {

		$recent_post = new GLFR_Recent_Post( $post, 'All' );

		array_push( $output, $recent_post );

	}

	return $output;

}
?>