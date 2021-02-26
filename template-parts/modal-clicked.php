<?php if ( is_active_sidebar( 'modal_clicked' ) && get_theme_mod( 'show_modal' , true ) ): ?>
    <div id="modal-trigger-div" class="position-fixed">
        <button type="button" class="btn btn-light rounded-circle p-3" data-toggle="modal" data-target=".modal-click">
            <span class="dashicons dashicons-email text-primary"></span>
        </button>
    </div>
    <div class="modal fade modal-click" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <ul class="text-dark m-0 p-4">
                    <?php dynamic_sidebar( 'modal_clicked' ); ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
