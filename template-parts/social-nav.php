<?php if ( $social_links[0] !== "" || $social_links[1] !== "" || $social_links[2] !== "" || $social_links[3] !== "" || $social_links[4] !== "" ): ?>    
    <nav class="social-nav position-absolute d-none d-lg-block">
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
        <!-- <ul class="d-flex flex-row m-0">
            <li>
                <a href="https://facebook.com" class="text-white mr-5">
                    <span class="dashicons dashicons-facebook"></span>
                </a>
            </li>
            <li>
                <a href="https://instagram.com" class="text-white mr-5">
                    <span class="dashicons dashicons-instagram"></span>
                </a>
            </li>
            <li>
                <a href="https://spotify.com" class="text-white mr-5">
                    <span class="dashicons dashicons-spotify"></span>
                </a>
            </li>
        </ul> -->
    </nav>
<?php endif; ?>