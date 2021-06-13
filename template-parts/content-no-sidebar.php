<?php if ( is_search() || is_archive() ): ?>
    <div class="content">
        <?php get_template_part( 'template-parts/title' ); ?>
        <ul class="post-list">
            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ): the_post(); ?>
                    <?php get_template_part( 'template-parts/blog-card-loop' ); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="content">
        <?php get_template_part( 'template-parts/title' ); ?>
        <?php the_content(); ?>
    </div>
<?php endif; ?>