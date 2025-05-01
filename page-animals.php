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
                            <option value="small"><?php echo esc_html__('Маленький', 'pet'); ?></option>
                            <option value="medium"><?php echo esc_html__('Середній', 'pet'); ?></option>
                            <option value="large"><?php echo esc_html__('Великий', 'pet'); ?></option>
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