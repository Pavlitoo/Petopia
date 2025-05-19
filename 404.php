<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404">
        <div class="container">
            <div class="error-content">
                <div class="error-image">
                    <img src="<?php echo esc_url('https://images.pexels.com/photos/406014/pexels-photo-406014.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); ?>" alt="Sad dog">
                </div>
                <div class="error-text">
                    <h1>404</h1>
                    <h2><?php echo esc_html__('Ой! Сторінку не знайдено.', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Здається, ми не можемо знайти те, що ви шукаєте. Можливо, пошук допоможе.', 'pet'); ?></p>

                    <div class="error-search">
                        <?php get_search_form(); ?>
                    </div>

                    <div class="error-suggestions">
                        <h3><?php echo esc_html__('Популярні розділи:', 'pet'); ?></h3>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/animals')); ?>"><?php echo esc_html__('Наші тварини', 'pet'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/help')); ?>"><?php echo esc_html__('Як допомогти', 'pet'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php echo esc_html__('Про нас', 'pet'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php echo esc_html__('Контакти', 'pet'); ?></a></li>
                        </ul>
                    </div>

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php echo esc_html__('Повернутися на головну', 'pet'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>