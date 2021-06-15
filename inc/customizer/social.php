<?php
/**
 * Adds social nav options section to customizer and adds controls and settings to section.
 * 
 * These settings allow the customer to provide social media links and sort which platforms they want to display.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php
//add section
$wp_customize->add_section( "glfr_social_options", array(
    'priority' => 1,
    'title' => __( 'Social Link Options', 'glfr'),
    'description' => __( "Customize the dialog that pops up when you click the button on the bottom left of the screen.", 'glfr' ),
    'panel' => 'main_panel'
));

for ( $i = 1; $i < 6; $i++ ) {

    //dropdown
    $wp_customize->add_setting( 'glfr_social_icon_' . $i, array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'glfr_sanitize_select',
        'default' => 'facebook',
    ) );
    
    $wp_customize->add_control( 'glfr_social_icon_' . $i, array(
        'type' => 'select',
        'section' => 'glfr_social_options', // Add a default or your own section
        'label' => __( 'Social Nav Icon #' . $i ),
        'priority'  => 1 + $i,
        'choices' => array(
        'facebook' => __( 'Facebook' ),
        'instagram' => __( 'Instagram' ),
        'twitter' => __( 'Twitter' ),
        'youtube' => __( 'YouTube' ),
        'spotify' => __( 'Spotify' ),
        'email' => __( 'Email' ),
        ),
    ) );
    //link
    $wp_customize->add_setting( "glfr_social_link_" . $i, array(
        'capability' => 'edit_theme_options',
        'default' => ""
    ));
    $wp_customize->add_control( "glfr_social_link_" . $i, array(
        'label' => __( 'Social Link #' . $i, 'bggf' ),
        'section' => "glfr_social_options",
        'settings' => "glfr_social_link_" . $i,
        'priority' => 2 + $i,
        'type' => 'text'
    ));


}



?>