<?php

/**
 * Template Name: Правила всиновлення
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Правила всиновлення', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Важлива інформація для майбутніх власників', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="content-wrapper">
                <h2><?php echo esc_html__('Процес всиновлення', 'pet'); ?></h2>
                <div class="steps-grid">
                    <div class="step-item">
                        <span class="step-number">1</span>
                        <h3><?php echo esc_html__('Вибір тварини', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Оберіть тварину на сайті та заповніть форму для знайомства', 'pet'); ?></p>
                    </div>

                    <div class="step-item">
                        <span class="step-number">2</span>
                        <h3><?php echo esc_html__('Знайомство', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Відвідайте притулок для особистого знайомства з твариною', 'pet'); ?></p>
                    </div>

                    <div class="step-item">
                        <span class="step-number">3</span>
                        <h3><?php echo esc_html__('Підготовка до всиновлення', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Підготуйте необхідні документи та облаштуйте домівку', 'pet'); ?></p>
                    </div>

                    <div class="step-item">
                        <span class="step-number">4</span>
                        <h3><?php echo esc_html__('Всиновлення', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Підпишіть договір та забирайте нового друга додому', 'pet'); ?></p>
                    </div>
                </div>

                <h2><?php echo esc_html__('Вимоги до майбутніх власників', 'pet'); ?></h2>
                <ul class="requirements-list">
                    <li>Вік від 21 року</li>
                    <li>Наявність документів, що посвідчують особу</li>
                    <li>Згода всіх членів родини</li>
                    <li>Стабільний дохід</li>
                    <li>Готовність до відповідальності за тварину</li>
                </ul>

                <h2><?php echo esc_html__('Необхідні документи', 'pet'); ?></h2>
                <ul class="documents-list">
                    <li>Паспорт</li>
                    <li>ІПН</li>
                    <li>Документ, що підтверджує місце проживання</li>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>