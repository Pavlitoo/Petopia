<?php

/**
 * Template part for displaying animals
 * @package Pet
 */

$animal_meta = array(
    'type' => get_field('animal_type'),
    'age_group' => get_field('animal_age_group'),
    'age' => get_field('animal_age'),
    'gender' => get_field('animal_gender'),
    'breed' => get_field('animal_breed'),
    'size' => get_field('animal_size'),
    'health' => get_field('animal_health'),
    'tag' => get_field('animal_tag')
);

// Translate health status
$health_labels = array(
    'healthy' => __('Здоровий', 'pet'),
    'treatment' => __('На лікуванні', 'pet'),
    'special_needs' => __('Особливі потреби', 'pet'),
    'chronic' => __('Хронічні захворювання', 'pet')
);

// Age group mapping
$age_group_labels = array(
    'baby' => __('До 1 року', 'pet'),
    'young' => __('1-3 роки', 'pet'),
    'adult' => __('3-7 років', 'pet'),
    'senior' => __('7+ років', 'pet')
);
?>

<article class="animal-card"
    data-type="<?php echo esc_attr($animal_meta['type']); ?>"
    data-age-group="<?php echo esc_attr($animal_meta['age_group']); ?>"
    data-size="<?php echo esc_attr(strtolower($animal_meta['size'])); ?>"
    data-health="<?php echo esc_attr($animal_meta['health']); ?>">



    <div class="animal-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        <?php endif; ?>
        <?php if ($animal_meta['tag']) : ?>
            <span class="animal-tag"><?php echo esc_html($animal_meta['tag']); ?></span>
        <?php endif; ?>
    </div>

    <div class="animal-info">
        <h3 class="animal-name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="animal-meta">
            <?php if ($animal_meta['age_group']) : ?>
                <span class="animal-meta-item">
                    <?php echo esc_html($age_group_labels[$animal_meta['age_group']] ?? $animal_meta['age_group']); ?>
                </span>
            <?php endif; ?>

            <?php if ($animal_meta['gender']) : ?>
                <span class="animal-meta-item">
                    <?php echo esc_html($animal_meta['gender'] === 'male' ? __('Хлопчик', 'pet') : __('Дівчинка', 'pet')); ?>
                </span>
            <?php endif; ?>

            <?php if ($animal_meta['size']) : ?>
                <span class="animal-meta-item"><?php echo esc_html($animal_meta['size']); ?></span>
            <?php endif; ?>

            <?php if ($animal_meta['health']) : ?>
                <span class="animal-meta-item">
                    <?php echo esc_html(isset($health_labels[$animal_meta['health']]) ? $health_labels[$animal_meta['health']] : $animal_meta['health']); ?>
                </span>
            <?php endif; ?>
        </div>

        <div class="animal-description">
            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php echo esc_html__('Детальніше', 'pet'); ?></a>
    </div>
</article>