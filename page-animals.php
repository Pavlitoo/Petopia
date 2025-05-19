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

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'animal',
                'posts_per_page' => 9,
                'paged' => $paged
            );

            $animals_query = new WP_Query($args);

            if ($animals_query->have_posts()) :
            ?>
                <div class="animals-grid">
                    <?php
                    while ($animals_query->have_posts()) :
                        $animals_query->the_post();
                        get_template_part('template-parts/content', 'animal');
                    endwhile;
                    ?>
                </div>

                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $animals_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '&larr; ' . __('Попередня', 'pet'),
                        'next_text' => __('Наступна', 'pet') . ' &rarr;'
                    ));
                    ?>
                </div>

            <?php
            else :
                echo '<p class="no-animals">' . esc_html__('Наразі немає тварин для показу.', 'pet') . '</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>