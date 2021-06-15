<?php
/**
 * Adds modal options section to customizer and adds controls and settings to section.
 * 
 * The affects how "modal nav" works.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php
//add section
$wp_customize->add_section( "modal_options", array(
    'priority' => 2,
    'title' => __( 'Modal Options', 'glfr'),
    'description' => __( "Customize the dialog that pops up when you click the button on the bottom left of the screen.", 'glfr' ),
    'panel' => 'main_panel'
));

//show
$wp_customize->add_setting( "show_modal", array(
    'default' => true
));
$wp_customize->add_control( "show_modal", array(
    'label' => __( 'Show Modal?', 'glfr' ),
    'section' => "modal_options",
    'settings' => "show_modal",
    'priority' => 1,
    'type' => 'checkbox',
    'sanitize_callback' => 'glfr_sanitize_checkbox'
));

?>