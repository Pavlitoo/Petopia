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

        <form class="animal-filters">
            <div class="filters-grid">
                <div class="filter-group">
                    <h4><?php echo esc_html__('Тип тварини', 'pet'); ?></h4>
                    <select name="animal_type" class="form-control">
                        <option value=""><?php echo esc_html__('Всі тварини', 'pet'); ?></option>
                        <option value="dog"><?php echo esc_html__('Собаки', 'pet'); ?></option>
                        <option value="cat"><?php echo esc_html__('Коти', 'pet'); ?></option>
                    </select>
                </div>

                <div class="filter-group">
                    <h4><?php echo esc_html__('Розмір', 'pet'); ?></h4>
                    <select name="animal_size" class="form-control">
                        <option value=""><?php echo esc_html__('Будь-який розмір', 'pet'); ?></option>
                        <option value="Маленький"><?php echo esc_html__('Маленький', 'pet'); ?></option>
                        <option value="Середній"><?php echo esc_html__('Середній', 'pet'); ?></option>
                        <option value="Великий"><?php echo esc_html__('Великий', 'pet'); ?></option>
                    </select>
                </div>

                <div class="filter-group">
                    <h4><?php echo esc_html__('Стан здоров\'я', 'pet'); ?></h4>
                    <select name="animal_health" class="form-control">
                        <option value=""><?php echo esc_html__('Будь-який стан', 'pet'); ?></option>
                        <option value="healthy"><?php echo esc_html__('Здоровий', 'pet'); ?></option>
                        <option value="treatment"><?php echo esc_html__('На лікуванні', 'pet'); ?></option>
                        <option value="special_needs"><?php echo esc_html__('Особливі потреби', 'pet'); ?></option>
                        <option value="chronic"><?php echo esc_html__('Хронічні захворювання', 'pet'); ?></option>
                    </select>
                </div>
            </div>

            <div class="filter-actions">
                <button type="button" class="clear-filters"><?php echo esc_html__('Очистити фільтри', 'pet'); ?></button>
            </div>
        </form>

        <?php pet_display_animals(6); ?>

        <div class="see-more-btn">
            <a href="<?php echo esc_url(home_url('/animals')); ?>" class="btn btn-outline">
                <?php echo esc_html__('Переглянути всіх тварин', 'pet'); ?>
            </a>
        </div>
    </div>
</section>