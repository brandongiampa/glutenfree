<?php
/**
 * Header file for the Gluten Free WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage gluten_free
 * @since Gluten Free 1.0
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="<?php glfr_make_header_class(); ?>">
        <div class="bg-dark">
            <div class="container header-top d-flex flex-row bg-dark justify-content-center align-items-center position-relative p-2">
                <?php get_template_part( 'template-parts/social-nav' ); ?>
                <?php 
                    //large logo for home page
                    if ( is_front_page() || is_home()  ) {
                        get_template_part( 'template-parts/branding-large' );
                    }
                    //regular logo for others
                    else {
                        get_template_part( 'template-parts/branding' );
                    }
                ?>    
                <div class="searchbar-1 position-absolute d-none d-lg-block">
                    <?php get_search_form(); ?> 
                </div>
            </div>
            <div class="flex justify-content-center align-items-center">
                <?php get_template_part( 'template-parts/social-nav-mobile' ); ?>
            </div>
        </div>
        <?php get_template_part( 'template-parts/nav-menu' ); ?>
        <?php 
            $nav_mobile_class = "searchbar-mobile d-flex d-lg-none p-4 justify-content-center align-items-center"; 
            
            if ( !is_front_page() ) {
                $nav_mobile_class .= " mb-3";
            }
        ?>
        <div class="<?php echo $nav_mobile_class; ?>">
            <?php get_search_form(); ?>
        </div>
    </header>