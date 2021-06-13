<?php
/**
 * The template file for blog archives
 *
 * This will provide a paginated list of blog entries that fall under the requested category, author, etc.
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
            <?php get_template_part( 'template-parts/content-left' ); ?>
            <?php get_template_part( 'template-parts/sidebar-right' ); ?>
        </div>
    <?php else: ?>
        <?php get_template_part( 'template-parts/content-no-sidebar' ); ?>
    <?php endif; ?>
    <div class="p-4">
        <?php the_posts_pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>