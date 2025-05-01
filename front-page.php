<?php

/**
 * The template for displaying the front page
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-inner">
                <div class="hero-content">
                    <h1 class="hero-title"><?php echo esc_html__('Подаруйте дім, врятуйте життя', 'pet'); ?></h1>
                    <p class="hero-description"><?php echo esc_html__('Притулок Petopia робить усе можливе, щоб врятувати життя безпритульних тварин. Допоможіть нашим чотирилапим друзям знайти новий дім!', 'pet'); ?></p>
                    <div class="hero-buttons">
                        <a href="#animals" class="btn btn-primary"><?php echo esc_html__('Шукаю друга', 'pet'); ?></a>
                        <a href="#support" class="btn btn-outline"><?php echo esc_html__('Зробити пожертву', 'pet'); ?></a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-dog.jpeg'); ?>" alt="<?php echo esc_attr__('Собака шукає дім', 'pet'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <?php
                $rescued_animals = get_field('rescued_animals', 'option') ? get_field('rescued_animals', 'option') : 142;
                $volunteers = get_field('volunteers', 'option') ? get_field('volunteers', 'option') : 65;
                $adopted_animals = get_field('adopted_animals', 'option') ? get_field('adopted_animals', 'option') : 328;
                $donors = get_field('donors', 'option') ? get_field('donors', 'option') : 562;
                ?>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html($rescued_animals); ?></div>
                    <div class="stat-label"><?php echo esc_html__('Врятованих тварин', 'pet'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html($volunteers); ?></div>
                    <div class="stat-label"><?php echo esc_html__('Волонтерів', 'pet'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html($adopted_animals); ?></div>
                    <div class="stat-label"><?php echo esc_html__('Прилаштованих тварин', 'pet'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html($donors); ?></div>
                    <div class="stat-label"><?php echo esc_html__('Донорів', 'pet'); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Animals Section -->
    <?php get_template_part('template-parts/section', 'animals'); ?>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-inner">
                <div class="about-content">
                    <h2><?php echo esc_html__('Про притулок Petopia', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Притулок Petopia був заснований у 2015 році групою волонтерів, які прагнули дати безпритульним тваринам другий шанс на щасливе життя. З часом наш притулок виріс у велике співтовариство людей, яких об\'єднує любов до тварин.', 'pet'); ?></p>
                    <p><?php echo esc_html__('Ми забезпечуємо не тільки притулок для тварин, які опинилися на вулиці, але й надаємо їм медичний догляд, харчування і, найголовніше, ласку та турботу. Ми віримо, що кожна тварина заслуговує на люблячий дім.', 'pet'); ?></p>
                    <p><?php echo esc_html__('Притулок існує виключно завдяки пожертвам і допомозі волонтерів. Ми завжди раді будь-якій допомозі — від фінансових внесків до волонтерської роботи чи просто поширення інформації про наших тварин.', 'pet'); ?></p>
                    <div class="about-actions">
                        <a href="#" class="btn btn-primary"><?php echo esc_html__('Стати волонтером', 'pet'); ?></a>
                    </div>
                </div>
                <div class="about-image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/volunteer.jpeg'); ?>" alt="<?php echo esc_attr__('Волонтери Petopia', 'pet'); ?>">
                    <p class="image-caption"><?php echo esc_html__('Волонтери з собаками', 'pet'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rescue Coins Section -->
    <?php get_template_part('template-parts/section', 'rescue-coins'); ?>

    <!-- Support Section -->
    <?php get_template_part('template-parts/section', 'support'); ?>

</main>

<?php
get_footer();
