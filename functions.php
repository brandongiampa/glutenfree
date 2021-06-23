<?php
/**
 * Gluten Free theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */

/**
 * Table of Contents:
 * Unique ID Function
 * Register Navwalker
 * Enqueue Scripts
 * Theme Supports
 * Register Menus
 * Register Sidebars
 * Gutenberg-related Functions
 * WooCommerce-related functions
 * Header Class
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
?>

<?php

/**
 * Unique ID
 * This function builds IDs for Gutenberg Blocks and Sidebar Widgets (glfr_unique_id)
*/
function glfr_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Register Custom Navigation Walker
 * This is external code that allows for hoverable menu items in Bootstrap nav menus.
*/
function register_navwalker(){
	require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Enqueue Scripts for Public HTML
*/
function glfr_enqueue_scripts() {
    wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Bungee&family=Oswald:wght@200;400;500;&display=swap', array() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.css', array(), '1.0.1' );
    wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.js', array(), '1.0.2', true );
	
	//add category as javascript obj on recipe archive page for recipe filtering
	if ( glfr_is_recipe_archive() ) {
		
		include_once( get_template_directory() . "/classes/class-glfr-recipe-card.php" );

		global $wp_query;

		$max_recipe_posts = get_theme_mod( 'max_recipe_posts', 1000 );
		$recipe_posts_per_page = get_option( 'posts_per_page' );

		$recipe_query = new WP_Query( array(
			'category_name'				=>				'Recipes',
			'posts_per_page'			=>				$max_recipe_posts
		) );

		$recipe_posts = $recipe_query->posts;
		$recipe_tags = array();

		foreach( $recipe_posts as $post ) {

			$tag_array = get_the_tags( $post->ID );
			array_push( $recipe_tags, $tag_array );

		}

		wp_localize_script( 'bootstrap', 'glfr_recipes', array( 
			'default_query'		=>				$wp_query,
			'full_query'		=>				$recipe_posts, //$recipe_query_results,		
			'posts_per_page'	=>				$recipe_posts_per_page,
			'tags'				=>				$recipe_tags,
			'blog_name'			=>				get_bloginfo( 'name' )
		 ) );
	}
}
add_action( 'wp_enqueue_scripts', 'glfr_enqueue_scripts' );

/**
 * Theme Supports
*/
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

/**
 * Add Menus
*/
function glfr_create_menus() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'glfr' ),
	) );
}
add_action( 'init', 'glfr_create_menus' );

/**
 * Register Sidebars
*/

function glfr_register_sidebars() {

	register_sidebar( array(
		'name' => 'Page Right',
		'id' => 'blog_right',
		'description' => __( 'Widget area located at right column of pages and posts.', 'glfr' ),
	));

	register_sidebar( array(
		'name' => 'Modal (Clicked)',
		'id' => 'modal_clicked',
		'description' => __( 'Widget area that pops up when user clicks button fixed at lower right-hand corner.', 'glfr' ),
	));

}
add_action( 'widgets_init', 'glfr_register_sidebars' );
/**
 * Gutenberg-related functions and actions
*/

function glfr_set_up_gutenberg() {
	require_once get_template_directory() . "/inc/gutenberg.php";
}
add_action( 'after_setup_theme', 'glfr_set_up_gutenberg' );

/**
 * WooCommerce-related functions and actions
*/
//make sure WC page content is wrapped in Bootstrap container, this echoes the opening HTML tag...
function glfr_wc_open_container() {
	echo '<div class="container wc-container">';
}
add_action( 'woocommerce_before_main_content', 'glfr_wc_open_container' );

//...and this closes the container HTML tag
function glfr_wc_close_container() {
	echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'glfr_wc_close_container' );

//on shop & product archive pages echo mobile-only sidebar beneath title
function glfr_echo_shop_mobile_nav() {

	if ( is_product_category() ) {

		echo '<div class="d-flex justify-content-center align-items-center d-lg-none mb-5 mb-lg-0">';
		wc_product_dropdown_categories(
			apply_filters(
				'woocommerce_product_categories_widget_dropdown_args',
				// wp_parse_args(
				// 	$dropdown_args,
					array(
						'show_count'         => $count,
						'hierarchical'       => $hierarchical,
						'show_uncategorized' => 0,
						'selected'           => single_cat_title( '', false ),
					)
				// )
			)
		);

		wp_enqueue_script( 'selectWoo' );
		wp_enqueue_style( 'select2' );

		wc_enqueue_js(
			"
			jQuery( '.dropdown_product_cat' ).change( function() {
				if ( jQuery(this).val() != '' ) {
					var this_page = '';
					var home_url  = '" . esc_js( home_url( '/' ) ) . "';
					if ( home_url.indexOf( '?' ) > 0 ) {
						this_page = home_url + '&product_cat=' + jQuery(this).val();
					} else {
						this_page = home_url + '?product_cat=' + jQuery(this).val();
					}
					location.href = this_page;
				} else {
					location.href = '" . esc_js( wc_get_page_permalink( 'shop' ) ) . "';
				}
			});

			if ( jQuery().selectWoo ) {
				var wc_product_cat_select = function() {
					jQuery( '.dropdown_product_cat' ).selectWoo( {
						placeholder: '" . esc_js( __( 'Select a category', 'woocommerce' ) ) . "',
						minimumResultsForSearch: 5,
						width: '100%',
						allowClear: true,
						language: {
							noResults: function() {
								return '" . esc_js( _x( 'No matches found', 'enhanced select', 'woocommerce' ) ) . "';
							}
						}
					} );
				};
				wc_product_cat_select();
			}
		"
		);
		echo '</div>';

	}

}
add_action( 'woocommerce_before_shop_loop', 'glfr_echo_shop_mobile_nav', 10 );

/**
* Filter to style nav menu on left side of shop page with bootstrap classes and convert title to link
*
*/
function glfr_add_shop_nav_bootstrap_classes( $str ) {

	$str = str_replace( '<li class="cat-item', '<li class="list-group-item bg-dark cat-item', $str );
	$str = str_replace( 'current-cat', 'current-cat bg-primary', $str );
	$str = str_replace( '<a aria-current', '<a class="text-primary" aria-current', $str );
	$str = str_replace( '<a href', '<a class="text-light" href', $str );
	$str = str_replace( 'Shop<ul>', '<a class="text-light" href="' . get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">Shop</a><ul>', $str );

	return $str;

}

// If shop sidebar-left is active, this creates row and sets up sidebar
function glfr_open_wc_shop_pc_nav_row_tag() {

	if ( is_shop() || is_product_category() ) {

		try {

			$list_args = array();
			$list_args['title_li']                   = 'ALL ITEMS';
			$list_args['show_option_none']           = __( 'No product categories exist.', 'woocommerce' );
			$list_args['current_category']           = get_queried_object_id();
			$list_args['style'] 					 = 'list';
			$list_args['taxonomy'] 					 = 'product_cat';

			add_filter( 'wp_list_categories', 'glfr_add_shop_nav_bootstrap_classes' );

			echo '<div class="row">';
				echo '<div class="col-3 col-lg d-none d-lg-block">';					 
					echo '<ul class="list-group product-categories bg-dark text-light p-0 pl-4 pt-4 m-0">';
						wp_list_categories( $list_args );
					echo '</ul>';
				echo '</div>';
				echo '<div class="col col-lg-9">';

		}
		catch ( WP_Error $e ) {
			error_log( $e->getMessage() );
		}

		remove_filter( 'wp_list_categories', 'glfr_add_shop_nav_bootstrap_classes' );

	}

}
add_action( 'woocommerce_before_shop_loop', 'glfr_open_wc_shop_pc_nav_row_tag' );

//this closes the above html
function glfr_close_wc_shop_pc_nav_row_tag() {

	if ( is_active_sidebar( 'shop-left' ) && is_shop() ) {

		echo "</div></div>";

	}

}
add_action( 'woocommerce_after_shop_loop', 'glfr_close_wc_shop_pc_nav_row_tag' );

//remove annoying sidebar that appears after WC content
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

//this distinguishes between page types so that the branding appears larger at home/front pages
function glfr_make_header_class() {
	if ( is_front_page() || is_home() ){
		echo "header-large";
	}
	else {
		echo "header-small";
	}
}

function glfr_make_content_class() {

	if ( is_active_sidebar( 'blog_right' ) ) {

		echo "col col-lg-9 pr-lg-5";

	}
	else {

		echo "col";

	}

}

function glfr_make_categories_link_meta_list( $category_array ) {

	if ( sizeof( $category_array ) < 1 ) { // make sure array has entries

		return false;

	}

	$output_array = array(); //empty array to implode later to make list with commas

	foreach ( $category_array as $category ) {

		$name = $category->name;
		$url = get_category_link( $category->term_id );

		$str = "";
		$str .= '<a href="' . $url . '">';
			$str .= $name;
		$str .= '</a>';

		$output_array[] = $str;

	}

	echo implode( $output_array, ", " );
	return true;

}

function glfr_echo_date_archive_url() {

	$date = get_the_date( 'Y-m-j' );
	$arr = explode( "-", $date );
	$year = $arr[ 0 ];
	$month = $arr[ 1 ];
	$day = $arr[ 2 ];

	echo get_day_link( $year, $month, $day );
	return true;

}

function glfr_make_social_links_array() {

	$output = array();

	for ( $i = 1; $i <= 5; $i++ ) {

		$link = get_theme_mod( 'glfr_social_link_' . $i );
		$icon = get_theme_mod( 'glfr_social_icon_' . $i );

		if ( $link && $icon && $link !== "" && $icon !== "" ) {

			$assoc = array(

				'link'		=>		$link,
				'icon'		=>		$icon

			);
	
			$output[] = $assoc;

		}

	}

	return sizeof( $output ) > 0 ? $output : false ;

}

function glfr_is_recipe_archive() {

	if ( ! is_archive() ) {

		return false;

	}

	$category_obj = get_the_category();
	$category_name = $category_obj[ 'name' ];

	if ( ! $category_name === 'Recipes' ) {

		return false;

	}

	return true;

}

?>