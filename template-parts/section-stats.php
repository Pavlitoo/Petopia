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
                <div class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('pet_stats_rescued', '150')); ?>">0</div>
                <div class="stat-label"><?php echo esc_html__('Врятованих тварин', 'pet'); ?></div>
            </div>

            <div class="stat-item">
                <div class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('pet_stats_adopted', '100')); ?>">0</div>
                <div class="stat-label"><?php echo esc_html__('Знайшли дім', 'pet'); ?></div>
            </div>

            <div class="stat-item">
                <div class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('pet_stats_volunteers', '50')); ?>">0</div>
                <div class="stat-label"><?php echo esc_html__('Волонтерів', 'pet'); ?></div>
            </div>

            <div class="stat-item">
                <div class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('pet_stats_donors', '200')); ?>">0</div>
                <div class="stat-label"><?php echo esc_html__('Донорів', 'pet'); ?></div>
            </div>
        </div>
    </div>
</section>