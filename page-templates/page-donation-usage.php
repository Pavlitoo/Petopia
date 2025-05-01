<?php

/**
 * Template Name: Використання пожертв
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Використання пожертв', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Прозорість та звітність використання ваших внесків', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="content-wrapper">
                <h2><?php echo esc_html__('Розподіл коштів', 'pet'); ?></h2>
                <div class="donation-distribution">
                    <div class="distribution-item">
                        <h3>40%</h3>
                        <p><?php echo esc_html__('Харчування', 'pet'); ?></p>
                        <ul>
                            <li>Корм для собак та котів</li>
                            <li>Спеціальне харчування</li>
                            <li>Вітаміни та добавки</li>
                        </ul>
                    </div>

                    <div class="distribution-item">
                        <h3>30%</h3>
                        <p><?php echo esc_html__('Медичне обслуговування', 'pet'); ?></p>
                        <ul>
                            <li>Ветеринарні послуги</li>
                            <li>Ліки та вакцини</li>
                            <li>Стерилізація</li>
                        </ul>
                    </div>

                    <div class="distribution-item">
                        <h3>20%</h3>
                        <p><?php echo esc_html__('Утримання притулку', 'pet'); ?></p>
                        <ul>
                            <li>Комунальні послуги</li>
                            <li>Ремонтні роботи</li>
                            <li>Обладнання</li>
                        </ul>
                    </div>

                    <div class="distribution-item">
                        <h3>10%</h3>
                        <p><?php echo esc_html__('Інші витрати', 'pet'); ?></p>
                        <ul>
                            <li>Транспортування</li>
                            <li>Адміністративні витрати</li>
                            <li>Рекламні матеріали</li>
                        </ul>
                    </div>
                </div>

                <h2><?php echo esc_html__('Звітність', 'pet'); ?></h2>
                <p><?php echo esc_html__('Щомісяця ми публікуємо детальний звіт про використання коштів:', 'pet'); ?></p>
                <ul class="report-list">
                    <li>Фінансовий звіт</li>
                    <li>Фотозвіт про витрачені кошти</li>
                    <li>Список придбаних товарів та послуг</li>
                    <li>Історії врятованих тварин</li>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>