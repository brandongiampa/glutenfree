<?php
/**
 * The page specifically for recipe archives.
 *
 * This will provide a paginated list of recipe posts. 
 * In addition, there is a search box with multiple dropdowns specific to gluten free recipes.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */

get_header();
?>
<div class="container">
    <?php if ( is_active_sidebar( 'blog_right' ) ): ?>
        <div class="row">
            <?php get_template_part( 'template-parts/recipe-search' ); ?>
            <?php get_template_part( 'template-parts/content-left' ); ?>
            <?php get_template_part( 'template-parts/sidebar-right' ); ?>
        </div>
    <?php else: ?>
        <?php get_template_part( 'template-parts/recipe-search' ); ?>
        <?php get_template_part( 'template-parts/content-no-sidebar' ); ?>
    <?php endif; ?>
    <div class="p-4">
        <?php the_posts_pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>