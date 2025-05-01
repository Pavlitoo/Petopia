<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <div class="container">
            <div class="error-content">
                <h1 class="page-title"><?php echo esc_html__('Ой! Сторінку не знайдено.', 'pet'); ?></h1>
                <div class="error-description">
                    <p><?php echo esc_html__('Здається, ми не можемо знайти те, що ви шукаєте. Можливо, пошук допоможе.', 'pet'); ?></p>
                </div>

                <?php get_search_form(); ?>

                <div class="error-suggestions">
                    <h2><?php echo esc_html__('Популярні розділи:', 'pet'); ?></h2>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/animals')); ?>"><?php echo esc_html__('Наші тварини', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/help')); ?>"><?php echo esc_html__('Як допомогти', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php echo esc_html__('Про нас', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php echo esc_html__('Контакти', 'pet'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
