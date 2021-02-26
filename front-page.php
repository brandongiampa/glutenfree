<?php
/**
 * The template file for home pages with a dedicated front page.
 *
 * This is for sites that opt out of having blog entries listed on the home page.
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
        <div class="content"><?php the_content(); ?></div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>