<?php if ( is_search() || is_archive() || is_home() ): ?>
    <div class="col-12 col-lg-9 pr-lg-5">
        <div class="content">
            <?php get_template_part( 'template-parts/title' ); ?>
            <ul class="m-0 post-list">
                <?php get_template_part( 'template-parts/blog-card-loop' ); ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    <div class="col-12 col-lg-9 pr-lg-5">
        <div class="content">
            <?php get_template_part( 'template-parts/title' ); ?>
            <?php the_content(); ?>
        </div>
    </div>
<?php endif; ?>