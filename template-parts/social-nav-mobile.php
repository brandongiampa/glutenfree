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