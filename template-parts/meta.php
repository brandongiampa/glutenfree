<?php
/**
 * The template file for the list of tags located above the main H1 of posts.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>
<div class="meta">
<?php if ( get_theme_mod( 'display_post_dates' , true ) ): //can customize whether to display post date for infrequent bloggers ?>
    <i>
    Posted 
    <a href="<?php glfr_echo_date_archive_url(); ?>">
        <date>
        <?php the_date(); ?>
        </date>
    </a>
<?php endif; ?>
    by 
    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'id' ) ); //link to author archive ?>">
        <?php echo get_the_author_meta( 'display_name' ); ?>
    </a> 
    in 
    <?php
    glfr_make_categories_link_meta_list( get_the_category() ); //in functions.php, echos list of links to category archives divided by commas
    ?>
    </i>
</div>