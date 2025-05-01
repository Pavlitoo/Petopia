<div class="animal-card">
    <div class="animal-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
    </div>
    <div class="animal-details">
        <h3 class="animal-name"><?php the_title(); ?></h3>

        <div class="animal-meta">
            <?php if (get_post_meta(get_the_ID(), 'animal_age', true)) : ?>
                <span class="animal-age"><?php echo get_post_meta(get_the_ID(), 'animal_age', true); ?></span>
            <?php endif; ?>

            <?php if (get_post_meta(get_the_ID(), 'animal_breed', true)) : ?>
                <span class="animal-breed"><?php echo get_post_meta(get_the_ID(), 'animal_breed', true); ?></span>
            <?php endif; ?>
        </div>

        <div class="animal-excerpt"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('Детальніше', 'petopia'); ?></a>
    </div>
</div>