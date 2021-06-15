<?php
/**
 * The template file for the menu button ("hamburger") on the navbar, which opens the menu hidden on the left side.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php 
        $navbar_class = "navbar navbar-expand-lg navbar-light bg-light"; 

        if ( !is_front_page() ){
            $navbar_class .= " mb-lg-5";
        }
    ?>
    <nav class="<?php echo $navbar_class; ?>">
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