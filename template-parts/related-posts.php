<?php
/**
 * The template file for the related posts section at the bottom of posts.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php 

$glfr_cats = wp_get_post_categories( get_the_id() );

$rp_query = new WP_Query( array(
    'cat' => $glfr_cats[ 0 ],
    'posts_per_page' => 2,
    "post__not_in" => array( get_the_id() )
    ) );
?>
<?php 
if ( $rp_query->have_posts() ):?>
    <aside class="related-posts">
        <h1 class="text-center mt-5 mb-4">Related Posts</h1>
        <ul class="post-list">
            <?php
            while ( $rp_query->have_posts() ): $rp_query->the_post(); ?>
            
                    <?php get_template_part( 'template-parts/related-posts-card-loop' ); ?>
                
            <?php endwhile; ?>
        
        </ul>
    </aside>
    <?php
    wp_reset_postdata();
endif;
    ?>