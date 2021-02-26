<?php
/**
 * The template file for search results
 *
 * This will provide a paginated list of blog entries that fall under the requested query.
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
    <h1 class="archive-h1"><?php echo 'Query: ' . get_search_query(); ?></h1>
    <?php if ( is_active_sidebar( 'blog_right' ) ): ?>
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="content">
                    <ul class="post-list">
                        <?php get_template_part( 'template-parts/blog-card-loop' ); ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <?php dynamic_sidebar( 'blog-right' ); ?>
            </div>
        </div>
    <?php else: ?>
        <div class="content">
            <ul class="post-list">
                <?php if ( have_posts() ): ?>
                    <?php while ( have_posts() ): the_post(); ?>
                        <?php get_template_part( 'template-parts/blog-card-loop' ); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="p-4">
        <?php the_posts_pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>