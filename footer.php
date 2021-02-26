<?php get_template_part( 'template-parts/modal-clicked' ); ?>
<footer class="d-flex flex-column justify-content-center align-items-center py-4 bg-dark">
    <?php if ( get_theme_mod( 'glfr_show_copyright', true ) ): ?>
    <p class="fw-lighter fst-italic p-0 m-0 copyright">&copy;2021 <?php echo get_bloginfo( 'name' ); ?> </p>
    <?php endif; ?>
    <?php if ( get_theme_mod( 'glfr_show_privacy_policy', true ) ): ?>
    <br>
    <p class="fw-lighter fst-italic p-0 m-0 privacy-policy">
    View our <a class="text-info" href="<?php echo get_theme_mod( 'glfr_privacy_policy_url', get_bloginfo( 'url' ) . "/privacy-policy" ); ?>">privacy policy</a>.
    </p>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>

</body>
</html>