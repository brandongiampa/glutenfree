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