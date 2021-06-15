<?php
/**
 * The template file for sidebar-right, which appears on blogs and archives to encourage site traffic
 * by facilitating site navigation. 
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<div class="col-12 col-lg-3 bg-dark d-flex flex-column align-items-center p-4 mx-0 mt-5">
    <hr class="d-lg-none">
    <ul class="d-flex flex-column align-items-start mx-auto p-0 sidebar-right">
        <?php dynamic_sidebar( 'blog_right' ); ?>
    </ul>
</div>