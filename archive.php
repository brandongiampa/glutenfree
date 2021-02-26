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
<?php 
    // $title;

    // if ( is_category() ) {
    //     $title = 'Category: ';
    // }
    // else if ( is_author() ) {
    //     $title = 'Author: ';
    // }
    // else {
    //     $title = 'Query: ';
    // }
    // $title .= get_the_category();
    // print_r( get_the_category() );
?>
<div class="container">
    <h1 class="archive-h1">
        <?php 
        if ( is_home() ){
            echo 'Blog';
        }
        else if ( is_author() ) {
            echo get_the_author();
        }
        else if ( is_archive() ) {
            echo get_the_archive_title();
        }
        else if ( is_search() ) {
            echo 'Query: ' . get_search_query();
        }
        else {
            echo 'Blog';
        }
        ?>
    </h1>
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