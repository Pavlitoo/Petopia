<?php

/**
 * Template part for displaying the statistics section
 *
 * @package Pet
 */
?>

<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(get_field('rescued_animals', 'option')); ?></div>
                <div class="stat-label"><?php echo esc_html__('Врятованих тварин', 'pet'); ?></div>
            </div>

            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(get_field('volunteers', 'option')); ?></div>
                <div class="stat-label"><?php echo esc_html__('Волонтерів', 'pet'); ?></div>
            </div>

            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(get_field('adopted_animals', 'option')); ?></div>
                <div class="stat-label"><?php echo esc_html__('Прилаштованих тварин', 'pet'); ?></div>
            </div>

            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(get_field('donors', 'option')); ?></div>
                <div class="stat-label"><?php echo esc_html__('Донорів', 'pet'); ?></div>
            </div>
        </div>
    </div>
</section>