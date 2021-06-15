<?php
/**
 * The customizer template file, included in functions.php to set up the
 * customizer.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php

//function adding content to customizer, organizing .php files to be included.
function glfr_customize_register( $wp_customize ) {

    //add panel
    $wp_customize->add_panel( 'main_panel', array(
        'priority' => 0,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Gluten Free', 'glfr') ,
        'description' => __( 'Edit your custom theme!', 'glfr' )
    ));

    //sections 
    require_once get_template_directory() . '/inc/customizer/social.php';
    require_once get_template_directory() . '/inc/customizer/modal.php';
    require_once get_template_directory() . '/inc/customizer/footer-options.php';
    
}
add_action( 'customize_register', 'glfr_customize_register' );

//checkbox sanitization function
function glfr_sanitize_checkbox( $input ){
    //returns true if checkbox is checked
    return ( isset( $input ) ? true : false );
}

//select sanitization function
function glfr_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

?>