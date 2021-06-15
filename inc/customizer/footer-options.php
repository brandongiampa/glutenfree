<?php
/**
 * Adds footer options section to customizer and adds controls and settings to section.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php
//add section
$wp_customize->add_section( "glfr_footer_options", array(
    'priority' => 5,
    'title' => __( 'Footer Options', 'glfr'),
    'description' => __( "Customize the footer.", 'glfr' ),
    'panel' => 'main_panel'
));

//copyright
$wp_customize->add_setting( "glfr_show_copyright", array(
    'default' => true
));
$wp_customize->add_control( "glfr_show_copyright", array(
    'label' => __( 'Show site copyright?', 'glfr' ),
    'section' => "glfr_footer_options",
    'settings' => "glfr_show_copyright",
    'priority' => 1,
    'type' => 'checkbox',
    'sanitize_callback' => 'glfr_sanitize_checkbox'
));

//privacy policy
$wp_customize->add_setting( "glfr_show_privacy_policy", array(
    'default' => true
));
$wp_customize->add_control( "glfr_show_privacy_policy", array(
    'label' => __( 'Show privacy policy link?', 'glfr' ),
    'section' => "glfr_footer_options",
    'settings' => "glfr_show_privacy_policy",
    'priority' => 2,
    'type' => 'checkbox',
    'sanitize_callback' => 'glfr_sanitize_checkbox'
));
$wp_customize->add_setting( "glfr_privacy_policy_url", array(
    'default' => get_bloginfo( 'url' ) . "/privacy-policy"
));
$wp_customize->add_control( "glfr_privacy_policy_url", array(
    'label' => __( 'Privacy Policy Link.', 'glfr' ),
    'section' => "glfr_footer_options",
    'settings' => "glfr_privacy_policy_url",
    'priority' => 3,
    'type' => 'text'
));

?>