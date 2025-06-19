<?php

/**
 * Template part for displaying animals section
 * @package Pet
 */
?>

<section id="animals" class="animals-section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html__('Наші тварини', 'pet'); ?></h2>
            <p><?php echo esc_html__('Знайдіть нового друга серед наших хвостатиків', 'pet'); ?></p>
        </div>

        <?php pet_display_animals(6); ?>

        <div class="see-more-btn">
            <a href="<?php echo esc_url(home_url('/animals')); ?>" class="btn btn-outline">
                <?php echo esc_html__('Переглянути всіх тварин', 'pet'); ?>
            </a>
        </div>
    </div>
</section>