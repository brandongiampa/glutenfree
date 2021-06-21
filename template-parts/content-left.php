<?php
/**
 * The template file for main content on pages where the sidebar-right is active.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php if ( is_search() || is_archive() || is_home() ): ?>
    <div class="col-12 col-lg-9 pr-lg-5">
        <div class="content">
            <?php get_template_part( 'template-parts/title' ); ?>
            <ul class="m-0 post-list">
                <?php get_template_part( 'template-parts/blog-card-loop' ); ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    <div class="col-12 col-lg-9 pr-lg-5">
        <div class="content">
            <?php                         
            $tags = get_the_tags( get_the_ID() ); 

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
                <small class="blog-tag text-primary font-italic">
                    #<?php echo get_bloginfo( 'name' ); ?>
                </small>
            <?php } //end if ?>
            <?php get_template_part( 'template-parts/title' ); ?>
            <?php the_content(); ?>
        </div>
    </div>
<?php endif; ?>