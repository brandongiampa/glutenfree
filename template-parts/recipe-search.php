<?php
/**
 * The template file for a searchbar that appears only on the archive for "recipes" so
 * page visitors can quickly navigate through recipes.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<form id="recipe-search-form" method="get" aria-label="recipe-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <input 
        id="recipe-search-input"
        type="search" 
        placeholder="Search in Recipes" 
        aria-label="recipe-search-input" 
        class="form-control border-0 bg-light"
        name="s"
    >
    <button id="recipe-search-button" type="submit" class="btn btn-primary mt-2" disabled>Filter</button>
</form>