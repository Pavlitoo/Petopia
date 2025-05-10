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
                    <h4><?php echo esc_html__('Вік', 'pet'); ?></h4>
                    <select name="animal_age" class="form-control">
                        <option value=""><?php echo esc_html__('Будь-який вік', 'pet'); ?></option>
                        <option value="baby"><?php echo esc_html__('До 1 року', 'pet'); ?></option>
                        <option value="young"><?php echo esc_html__('1-3 роки', 'pet'); ?></option>
                        <option value="adult"><?php echo esc_html__('3-7 років', 'pet'); ?></option>
                        <option value="senior"><?php echo esc_html__('7+ років', 'pet'); ?></option>
                    </select>
                </div>

                <div class="filter-group">
                    <h4><?php echo esc_html__('Стать', 'pet'); ?></h4>
                    <select name="animal_gender" class="form-control">
                        <option value=""><?php echo esc_html__('Будь-яка стать', 'pet'); ?></option>
                        <option value="male"><?php echo esc_html__('Хлопчик', 'pet'); ?></option>
                        <option value="female"><?php echo esc_html__('Дівчинка', 'pet'); ?></option>
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
            </div>

            <div class="filter-actions">
                <button type="button" class="clear-filters"><?php echo esc_html__('Очистити фільтри', 'pet'); ?></button>
            </div>
        </form>

        <?php pet_display_animals(6); ?>

        <div class="see-more-btn">
            <a href="<?php echo esc_url(home_url('/наші-тварини')); ?>" class="btn btn-outline">
                <?php echo esc_html__('Переглянути всіх тварин', 'pet'); ?>
            </a>
        </div>
    </div>
</section>