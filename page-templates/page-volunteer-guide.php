<?php

/**
 * Template Name: Гайд для волонтерів
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Гайд для волонтерів', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Як стати частиною нашої команди', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="content-wrapper">
                <h2><?php echo esc_html__('Напрямки волонтерства', 'pet'); ?></h2>
                <div class="volunteer-options">
                    <div class="option-card">
                        <h3><?php echo esc_html__('Догляд за тваринами', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Допомога у годуванні, вигулі та соціалізації тварин', 'pet'); ?></p>
                        <ul>
                            <li>Прибирання вольєрів</li>
                            <li>Годування тварин</li>
                            <li>Вигул собак</li>
                            <li>Грумінг</li>
                        </ul>
                    </div>

                    <div class="option-card">
                        <h3><?php echo esc_html__('Медична допомога', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Асистування ветеринарам та догляд за хворими тваринами', 'pet'); ?></p>
                        <ul>
                            <li>Допомога ветеринару</li>
                            <li>Видача ліків</li>
                            <li>Перев'язки</li>
                        </ul>
                    </div>

                    <div class="option-card">
                        <h3><?php echo esc_html__('PR та комунікації', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Допомога у просуванні притулку та пошуку нових власників', 'pet'); ?></p>
                        <ul>
                            <li>Ведення соціальних мереж</li>
                            <li>Фото- та відеозйомка</li>
                            <li>Організація заходів</li>
                        </ul>
                    </div>
                </div>

                <h2><?php echo esc_html__('Як стати волонтером', 'pet'); ?></h2>
                <ol class="steps-list">
                    <li>Заповніть анкету волонтера</li>
                    <li>Пройдіть співбесіду з координатором</li>
                    <li>Відвідайте ознайомчий тренінг</li>
                    <li>Оберіть напрямок роботи</li>
                    <li>Приступайте до волонтерства</li>
                </ol>

                <div class="cta-block">
                    <h3><?php echo esc_html__('Готові приєднатися?', 'pet'); ?></h3>
                    <p><?php echo esc_html__('Заповніть анкету, і ми зв\'яжемося з вами протягом 24 годин', 'pet'); ?></p>
                    <a href="#volunteer-form" class="btn btn-primary"><?php echo esc_html__('Стати волонтером', 'pet'); ?></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>