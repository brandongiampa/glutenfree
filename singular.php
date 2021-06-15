<?php
/**
 * The single page or post template file
 *
 * This overrides index.php for all individual pages and blog entries.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */

get_header();
?>

<?php if ( have_posts() ): ?>

    <?php while ( have_posts() ): the_post(); ?>

    <div class="container">
        <?php if ( is_active_sidebar( 'blog_right' ) ): ?>
            <div class="row">
                <?php get_template_part( 'template-parts/content-left' ); ?>   
                <?php get_template_part( 'template-parts/sidebar-right' ); ?>
            </div>
        <?php else: ?>
            <?php get_template_part( 'template-parts/content-no-sidebar' ); ?>
        <?php endif; ?>
        <hr>
        <?php if ( is_single() && ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ): ?>
            <?php get_template_part( 'template-parts/related-posts' ); ?>
            <div class="p-3">
                <hr>
            </div>
            <section class="comments-section">
                <?php 
                comments_template();
                ?>
            </section>
        <?php endif; ?>
    </div><!--end container-->
    <?php endwhile; ?>

<?php else: ?>
    <?php get_template_part( 'template-parts/no-content' ); ?>

<?php endif; ?>

<?php get_footer(); ?>