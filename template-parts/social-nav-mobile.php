<?php
/**
 * The template file for the social media nav on smaller devices.
 * 
 * This appears beneath the branding on smaller screens, and is hidden on larger.
 * 
 * Which social media platforms are visible and the corresponding links are chosen in the customizer.
 * They will be the same as the template-part "social-nav", which is the version for larger screens.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php if ( $social_links[0] !== "" || $social_links[1] !== "" || $social_links[2] !== "" || $social_links[3] !== "" || $social_links[4] !== "" ): ?>    
    <nav class="social-nav-mobile d-flex justify-content-center align-items-center d-lg-none pt-1 pb-5">
        <ul class="d-flex flex-row m-0">
            <?php 
            for ( $i = 1; $i < 6; $i++ ){
                $link = get_theme_mod( 'glfr_social_link_' . $i, '' );
                $icon = get_theme_mod( 'glfr_social_icon_' . $i, '' );

                if( $link !== "" ): ?>
                    <li>
                        <?php if( $link === "email" ): ?>
                        <a href="mailto:<?php echo $link; ?>" class="text-white mx-4">
                            <span class="dashicons dashicons-email"></span>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo $link; ?>" class="text-white mx-4">
                            <span class="dashicons dashicons-<?php echo $icon; ?>"></span>
                        </a>
                        <?php endif; ?>
                    </li>
                <?php endif; 
            }
            ?>
        </ul>
    </nav>
<?php endif; ?>