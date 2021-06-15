<?php
/**
 * The template file for a searchbar that appears only on the archive for "recipes" so
 * page visitors can quickly navigate through recipes.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<form action="<?php echo $_SERVER[ 'PHP_SELF' ]; ?>">
    <?php if ( isset( $_GET[ 'c' ] ) ) {
        echo $_GET[ 'c' ];
    } ?>
</form>