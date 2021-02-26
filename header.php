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
<?php print_r( $social_links ); ?>
<header>
    <div class="bg-dark">
        <div class="container header-top d-flex flex-row bg-dark justify-content-center align-items-center position-relative p-2">
            <?php get_template_part( 'template-parts/social-nav' ); ?>
            <?php 
                if ( is_front_page() || is_home()  ) {
                    get_template_part( 'template-parts/branding-large' );
                }
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu( array(
            'theme_location'  => 'primary',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse justify-content-lg-center',
            'container_id'    => 'navbarsExample08',
            'menu_class'      => 'navbar-nav m-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </nav>
    <div class="searchbar-mobile d-lg-none p-4 d-flex justify-content-center align-items-center">
        <?php get_search_form(); ?>
    </div>
</header>