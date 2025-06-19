<?php

/**
 * Template Name: Наші тварини
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Наші тварини', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Познайомтеся з нашими чотирилапими друзями, які шукають свій дім', 'pet'); ?></p>
        </div>
    </section>

    <section class="animals-section">
        <div class="container">
            <form class="animal-filters" id="animal-filters">
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

            <div class="animals-grid">
                <?php
                $args = array(
                    'post_type' => 'animal',
                    'posts_per_page' => -1 // Show all animals
                );

                $animals_query = new WP_Query($args);

                if ($animals_query->have_posts()) :
                    while ($animals_query->have_posts()) :
                        $animals_query->the_post();
                        get_template_part('template-parts/content', 'animal');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-animals">' . esc_html__('Наразі немає тварин для показу.', 'pet') . '</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('animal-filters');
            const animalCards = document.querySelectorAll('.animal-card');
            const clearFiltersBtn = document.querySelector('.clear-filters');

            function filterAnimals() {
                const type = filterForm.querySelector('[name="animal_type"]').value;
                const size = filterForm.querySelector('[name="animal_size"]').value;
                const health = filterForm.querySelector('[name="animal_health"]').value;

                animalCards.forEach(card => {
                    const matchType = !type || card.dataset.type === type;
                    const matchSize = !size || card.dataset.size === size.toLowerCase();
                    const matchHealth = !health || card.dataset.health === health;

                    if (matchType && matchSize && matchHealth) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Add event listeners to filter controls
            filterForm.querySelectorAll('select').forEach(select => {
                select.addEventListener('change', filterAnimals);
            });

            // Clear filters
            clearFiltersBtn.addEventListener('click', function() {
                filterForm.reset();
                animalCards.forEach(card => card.style.display = '');
            });
        });
    </script>
</main>

<?php get_footer(); ?>