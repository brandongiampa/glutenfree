<?php
/**
 * The template file for the list of tags located above the main H1 of posts.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php $tags = get_the_tags( get_the_ID() ); ?>
<div class="tags">
    <?php 
    if ( $tags ){
        foreach ( $tags as $tag ){ ?>
            <a href="<?php get_tag_link( $tag ); ?>">
                <span class="blog-tag text-primary font-italic">
                    #<?php echo $tag->name; ?>
                </span>
            </a>
        <?php } //end foreach 
    }
    else { ?>
        <a href="">
            <span class="blog-tag text-primary font-italic">
                #<?php echo get_bloginfo( 'name' ); ?>
            </span>
        </a>
    <?php }
    ?>
</div>

