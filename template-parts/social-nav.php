<?php
/**
 * The template file for the social media nav on larger devices.
 * 
 * This appears at the left of the navbar on larger screens, and is hidden on smaller.
 * 
 * Which social media platforms are visible and the corresponding links are chosen in the customizer.
 * They will be the same as the template-part "social-nav-mobile", which is the version for smaller screens.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>
<?php $social_links = glfr_make_social_links_array(); ?>
<?php if ( $social_links ): ?>    
    <nav class="social-nav position-absolute d-none d-lg-block">
        <ul class="d-flex flex-row m-0">
        <?php 
        foreach ( $social_links as $social_link ){ 

            $link = $social_link[ 'link' ];
            $icon = $social_link[ 'icon' ];
            ?>
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

            <?php } ?>
        </ul>
    </nav>
<?php endif; ?>