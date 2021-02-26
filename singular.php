<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
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
                <div class="col-12 col-9-md">
                    <h1><?php the_title(); ?></h1>
                    <div class="content"><?php the_content(); ?></div>
                </div>
                <div class="col-12 col-3-lg">
                    <?php dynamic_sidebar( 'blog_right' ); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="content">
                <h1 class="text-center text-lg-left"><?php the_title(); ?></h1>    
                <?php the_content(); ?>
            </div>
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