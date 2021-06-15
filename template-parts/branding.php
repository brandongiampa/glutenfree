<?php
/**
 * The template file for branding on: 
 * 1) Smaller screens
 * 2) Everything except the front page or home page of larger screens.
 * (The customer requested the logo display prominently when possible.)
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<div id="branding" class="bg-primary px-3 py-2 my-4 rounded">
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