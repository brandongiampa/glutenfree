<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
 
$glfr_unique_id = glfr_unique_id( 'search-form-' );
$glfr_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';

$placeholder = get_theme_mod( 'search_placeholder', "Search " . get_bloginfo( 'name' ) );

?>
<form method="get" aria-label="<?php echo $glfr_aria_label; ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <div class="p-1 bg-light rounded rounded-pill shadow-sm search-bg">
        <div class="input-group">
            <input 
                id="<?php echo esc_attr( $glfr_unique_id ); ?>"
                type="search" 
                placeholder="<?php echo $placeholder; ?>" 
                aria-label="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'glfr' ); ?>" 
                class="form-control border-0 bg-light"
                name="s"
            >
            <div class="input-group-append">
            <button id="<?php echo $glfr_unique_id . '-submit'; ?>" type="submit" class="btn btn-link text-primary">
                <div class="dashicons dashicons-search"></div>
            </button>
            </div>
        </div>
    </div>
</form>