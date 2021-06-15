<?php
/**
 * The template file for the site's logo to appear slightly large on the front/home pages
 * on larger screens.
 * 
 * This is per customer request.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<div id="branding-large" class="bg-primary px-3 py-2 my-4 rounded">
    <a href="<?php echo get_bloginfo( 'url' ); ?>">
        <?php
        if ( the_custom_logo() ){
            the_custom_logo();
        }
        else { ?>
            <img src="<?php echo get_template_directory_uri() . '/resources/logo.png'; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        <?php
        }
        ?>
    </a>
</div>