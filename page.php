<?php
/**
 * The single page template file
 *
 * This overrides index.php for all individual page entries.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 2.3
 */
?>
<?php get_header(); ?>
<?php if ( have_posts() ): ?>
    <?php while ( have_posts() ): the_post(); ?>
        <main class="container">
            <div class="row">
                <div class="<?php glfr_make_content_class(); //makes col-md-9 if sidebar is active ?>"> 
                    <div class="content">
                        <header class="py-5 content-header content-header-page">
                            <?php get_template_part( 'template-parts/title' ); ?>
                        </header>
                        <div class="content-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php if ( is_active_sidebar( 'blog_right' ) ): ?>
                    <?php get_template_part( 'template-parts/sidebar-right' ); ?>
                <?php endif; ?>
            </div>
        </main>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>