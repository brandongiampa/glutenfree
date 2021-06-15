<?php
/**
 * The template file for individual cards displaying meta info or posts (and linking them) 
 * in archives, search pages, etc.
 * 
 * Is in format of li tags, to be included in another page's ul tags.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<li class="blog-list-item">
    <a href="<?php the_permalink(); ?>" class="blog-link">
        <div class="blog-list-item row py-4">
            <div class="posts-thumbnail col-12 col-md-6 col-lg-4 p-2 d-flex justify-content-center align-items-center">
                <?php 
                    if ( has_post_thumbnail() ): the_post_thumbnail( 'medium' );
                    else: ?>
                        <img src="<?php echo get_template_directory_uri() . '/resources/beermug.jpg'; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php
                    endif;
                    ?>
            </div>
            <div class="posts-description col-12 col-md-6 col-lg-8 p-3">
                    <?php
                    
                    $tags = get_the_tags( get_the_ID() ); 

                    if ( $tags ){
                        foreach ( $tags as $tag ){ ?>
                            <small class="blog-tag text-primary font-italic">
                                #<?php echo $tag->name; ?>
                            </small>
                        <?php } //end foreach 
                    }
                    else { ?>
                        <small class="blog-tag text-primary font-italic">
                            #<?php echo get_bloginfo( 'name' ); ?>
                        </small>
                    <?php } //end if ?>
                    <h2><?php the_title(); ?></h2>
                    <small class="post-author">
                        by <?php echo get_the_author(); ?>
                    </small>
                    <?php the_excerpt(); ?>
                    <small class="meta" style="color: <?php echo get_theme_mod( 'gfbs_dark_color', GFBS_DEFAULT_DARK_COLOR ); ?>">Posted <?php echo get_the_date(); ?></small>
            </div>
        </div>
    </a>
</li>