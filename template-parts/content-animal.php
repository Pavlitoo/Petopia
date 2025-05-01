<?php

/**
 * Template part for displaying animals
 *
 * @package Pet
 */


$tag = get_post_meta(get_the_ID(), 'animal_tag', true);

// Get animal type, age group, gender, and size for filtering
$type = get_post_meta(get_the_ID(), 'animal_type', true);
$age_group = get_post_meta(get_the_ID(), 'animal_age_group', true);
$gender = get_post_meta(get_the_ID(), 'animal_gender', true);
$size = get_post_meta(get_the_ID(), 'animal_size', true);
?>

<article class="animal-card"
    data-type="<?php echo esc_attr($type); ?>"
    data-age="<?php echo esc_attr($age_group); ?>"
    data-gender="<?php echo esc_attr($gender); ?>"
    data-size="<?php echo esc_attr($size); ?>">

    <div class="animal-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        <?php endif; ?>
        <?php if ($tag) : ?>
            <span class="animal-tag"><?php echo esc_html($tag); ?></span>
        <?php endif; ?>
    </div>

    <div class="animal-info">
        <h3 class="animal-name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="animal-meta">
            <?php if ($animal_meta['age']) : ?>
                <span class="animal-meta-item"><?php echo esc_html($animal_meta['age']); ?></span>
            <?php endif; ?>

            <?php if ($animal_meta['gender']) : ?>
                <span class="animal-meta-item">
                    <?php echo esc_html($animal_meta['gender'] === 'male' ? __('Хлопчик', 'pet') : __('Дівчинка', 'pet')); ?>
                </span>
            <?php endif; ?>

            <?php if ($animal_meta['breed']) : ?>
                <span class="animal-meta-item"><?php echo esc_html($animal_meta['breed']); ?></span>
            <?php endif; ?>
        </div>

        <div class="animal-description">
            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php echo esc_html__('Детальніше', 'pet'); ?></a>
    </div>
</article>