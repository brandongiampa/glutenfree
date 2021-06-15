<?php
/**
 * The template file for titles at the top of everything except front-page or home.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>
<?php 
$h1_class = "mx-auto my-4 my-lg-5";

if ( !is_archive() && !is_search() ) {
    $h1_class .= " p-4 p-lg-0"; 
}

?>
<h1 class="<?php echo $h1_class; ?>">
<?php 
    if ( is_home() ){
        echo 'Blog';
    }
    else if ( is_author() ) {
        echo get_the_author();
    }
    else if ( is_archive() ) {
        echo get_the_archive_title();
    }
    else if ( is_search() ) {
        echo 'Query: ' . get_search_query();
    }
    else if ( is_single() || is_product() || is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
        the_title();
    }
    else {
        echo 'Blog';
    }
?>
</h1>