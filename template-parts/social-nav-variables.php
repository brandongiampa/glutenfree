<?php

$show_social_links;

$social_links = array(
    get_theme_mod( 'glfr_social_link_1', '' ),
    get_theme_mod( 'glfr_social_link_2', '' ),
    get_theme_mod( 'glfr_social_link_3', '' ),
    get_theme_mod( 'glfr_social_link_4', '' ),
    get_theme_mod( 'glfr_social_link_5', '' )
);

$social_icons = array(
    get_theme_mod( 'glfr_social_icon_1', '' ),
    get_theme_mod( 'glfr_social_icon_2', '' ),
    get_theme_mod( 'glfr_social_icon_3', '' ),
    get_theme_mod( 'glfr_social_icon_4', '' ),
    get_theme_mod( 'glfr_social_icon_5', '' ),
);

if ( $social_links[0] !== "" || $social_links[1] !== "" || $social_links[2] !== "" || $social_links[3] !== "" || $social_links[4] !== "" ) {
    $show_social_links = true;
}
else {
    $show_social_links = false;
}

?>