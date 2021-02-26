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
        <h1>
            <?php the_title(); ?>
        </h1>
        <div class="content"><?php the_content(); ?></div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>