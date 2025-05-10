<?php

/**
 * Template Name: Про нас
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Про нас', 'pet'); ?></h1>
        </div>
    </section>

    <section class="about-content-section">
        <div class="container">
            <div class="about-content-inner">
                <div class="about-text">
                    <h2><?php echo esc_html__('Наша місія', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Притулок Petopia був заснований у 2015 році з метою надання допомоги безпритульним тваринам. Наша місія - рятувати, лікувати та знаходити нові домівки для покинутих тварин.', 'pet'); ?></p>
                    <h2><?php echo esc_html__('Наша історія', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Ми почали з маленької команди волонтерів, які щодня працювали над покращенням умов життя тварин. Зараз ми маємо великий притулок, де проживає понад 200 тварин.', 'pet'); ?></p>
                    <h2><?php echo esc_html__('Наші цінності', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Ми віримо, що кожна тварина заслуговує на любов і турботу. Наша команда працює над тим, щоб забезпечити найкращі умови для наших підопічних.', 'pet'); ?></p>
                    <h2><?php echo esc_html__('Приєднуйтесь до нас', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Ваша підтримка дуже важлива для нас. Ви можете допомогти, ставши волонтером або зробивши пожертву на наші потреби.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/допомогти')); ?>" class="btn btn-primary"><?php echo esc_html__('Допомогти', 'pet'); ?></a>

                </div>

                <div class="about-image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/petopia.png'); ?>" alt="<?php echo esc_attr__('Притулок Petopia', 'pet'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/petopia2.jpg'); ?>" alt="<?php echo esc_attr__('Притулок Petopia', 'pet'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pet.jpg'); ?>" alt="<?php echo esc_attr__('Притулок Petopia', 'pet'); ?>">
                </div>
            </div>
        </div>
    </section>

    <h2><?php echo esc_html__('Що ми робимо', 'pet'); ?></h2>
    <div class="services-grid">
        <div class="service-item">
            <span class="service-icon">🏥</span>
            <h3><?php echo esc_html__('Медична допомога', 'pet'); ?></h3>
            <p><?php echo esc_html__('Надаємо повний спектр ветеринарних послуг нашим підопічним', 'pet'); ?></p>
        </div>

        <div class="service-item">
            <span class="service-icon">🏠</span>
            <h3><?php echo esc_html__('Притулок', 'pet'); ?></h3>
            <p><?php echo esc_html__('Забезпечуємо безпечне та комфортне середовище для тварин', 'pet'); ?></p>
        </div>

        <div class="service-item">
            <span class="service-icon">❤️</span>
            <h3><?php echo esc_html__('Прилаштування', 'pet'); ?></h3>
            <p><?php echo esc_html__('Допомагаємо тваринам знайти люблячі родини', 'pet'); ?></p>
        </div>
    </div>

    <section class="team-section">
        <div class="container">
            <h2><?php echo esc_html__('Наша команда', 'pet'); ?></h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/director.png'); ?>" alt="<?php echo esc_attr__('Член команди', 'pet'); ?>">
                    <h3>Марія Петренко</h3>
                    <p class="member-role"><?php echo esc_html__('Директор притулку', 'pet'); ?></p>
                </div>

                <div class="team-member">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/veterenar.png'); ?>" alt="<?php echo esc_attr__('Член команди', 'pet'); ?>">
                    <h3>Олександр Коваленко</h3>
                    <p class="member-role"><?php echo esc_html__('Головний ветеринар', 'pet'); ?></p>
                </div>

                <div class="team-member">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/volunter.jpg'); ?>" alt="<?php echo esc_attr__('Член команди', 'pet'); ?>">
                    <h3>Анна Мельник</h3>
                    <p class="member-role"><?php echo esc_html__('Координатор волонтерів', 'pet'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo esc_html__('Приєднуйтесь до нас!', 'pet'); ?></h2>
                <p><?php echo esc_html__('Станьте частиною нашої команди волонтерів та допомагайте рятувати тварин', 'pet'); ?></p>
                <a href="/volunteer-guide/" class="btn btn-primary"><?php echo esc_html__('Стати волонтером', 'pet'); ?></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>