<?php
/**
 * The template file for content on pages where the sidebar-right is not active.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php if ( is_search() || is_archive() ): ?>
    <div class="content">
        <?php get_template_part( 'template-parts/title' ); ?>
        <ul class="post-list">
            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ): the_post(); ?>
                    <?php get_template_part( 'template-parts/blog-card-loop' ); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="content">
        <?php get_template_part( 'template-parts/title' ); ?>
        <?php the_content(); ?>
    </div>
<?php endif; ?>