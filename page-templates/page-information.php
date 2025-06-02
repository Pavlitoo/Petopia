<?php

/**
 * Template Name: Інформація
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Інформація', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Корисна інформація про наш притулок та процес всиновлення тварин', 'pet'); ?></p>
        </div>
    </section>

    <section class="info-section">
        <div class="container">
            <div class="info-grid">
                <!-- Adoption Rules -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3><?php echo esc_html__('Правила всиновлення', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Дізнайтеся про процес та вимоги до майбутніх власників наших тварин.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/adoption-rules')); ?>" class="btn btn-outline">
                        <?php echo esc_html__('Детальніше', 'pet'); ?>
                    </a>
                </div>

                <!-- Donation Usage -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3><?php echo esc_html__('Використання пожертв', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Прозорий звіт про те, як ми використовуємо ваші пожертви для допомоги тваринам.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/donation-usage')); ?>" class="btn btn-outline">
                        <?php echo esc_html__('Детальніше', 'pet'); ?>
                    </a>
                </div>

                <!-- Volunteer Guide -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3><?php echo esc_html__('Гайд для волонтерів', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Інформація для тих, хто хоче стати частиною нашої команди волонтерів.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/volunteer-guide')); ?>" class="btn btn-outline">
                        <?php echo esc_html__('Детальніше', 'pet'); ?>
                    </a>
                </div>

                <!-- Material Needs -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3><?php echo esc_html__('Матеріальні потреби', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Список необхідних речей та матеріалів для наших підопічних.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/material-needs')); ?>" class="btn btn-outline">
                        <?php echo esc_html__('Детальніше', 'pet'); ?>
                    </a>
                </div>

                <!-- Share Info -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3><?php echo esc_html__('Поширення інформації', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Допоможіть нам знайти домівки для наших тварин, поширюючи інформацію.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/share-info')); ?>" class="btn btn-outline">
                        <?php echo esc_html__('Детальніше', 'pet'); ?>
                    </a>
                </div>

                <!-- FAQ -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3><?php echo esc_html__('Часті запитання', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Відповіді на найпоширеніші запитання про притулок та всиновлення.', 'pet'); ?></p>
                    <a href="<?php echo esc_url(home_url('/faq')); ?>" class="btn btn-outline">
                        <?php echo esc_html__('Детальніше', 'pet'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>