<?php
/**
 * The template file for the modal sidebar. Includes the HTML for both the button to open the modal
 * and the modal itself.
 * 
 * The current customer is using this for a contact form, so the button has a "mail" symbol hard-coded in.
 * I may make this customizable if another customer uses this theme.
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

<?php if ( is_active_sidebar( 'modal_clicked' ) && get_theme_mod( 'show_modal' , true ) ): ?>
    <div id="modal-trigger-div" class="position-fixed">
        <button type="button" class="btn btn-light rounded-circle p-3" data-toggle="modal" data-target=".modal-click">
            <span class="dashicons dashicons-email text-dark"></span>
        </button>
    </div>
    <div class="modal fade modal-click" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-2 pt-1 pb-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <ul class="text-dark m-0 p-4 position-relative">
                    <?php dynamic_sidebar( 'modal_clicked' ); ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
