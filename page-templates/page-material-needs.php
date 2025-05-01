<?php

/**
 * Template Name: Матеріальні потреби
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Матеріальні потреби', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Список необхідних речей для наших підопічних', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="needs-grid">
                <div class="need-category">
                    <h2><?php echo esc_html__('Харчування', 'pet'); ?></h2>
                    <ul class="needs-list">
                        <li>Сухий корм для собак</li>
                        <li>Сухий корм для котів</li>
                        <li>Консерви для собак</li>
                        <li>Консерви для котів</li>
                        <li>Ласощі для тренувань</li>
                    </ul>
                </div>

                <div class="need-category">
                    <h2><?php echo esc_html__('Медикаменти', 'pet'); ?></h2>
                    <ul class="needs-list">
                        <li>Антибіотики</li>
                        <li>Протипаразитарні засоби</li>
                        <li>Вітаміни</li>
                        <li>Перев'язувальні матеріали</li>
                        <li>Шприци</li>
                    </ul>
                </div>

                <div class="need-category">
                    <h2><?php echo esc_html__('Гігієна', 'pet'); ?></h2>
                    <ul class="needs-list">
                        <li>Наповнювач для котів</li>
                        <li>Пелюшки</li>
                        <li>Миючі засоби</li>
                        <li>Дезінфектори</li>
                        <li>Рушники</li>
                    </ul>
                </div>

                <div class="need-category">
                    <h2><?php echo esc_html__('Спорядження', 'pet'); ?></h2>
                    <ul class="needs-list">
                        <li>Повідці</li>
                        <li>Нашийники</li>
                        <li>Миски</li>
                        <li>Лежаки</li>
                        <li>Переноски</li>
                    </ul>
                </div>
            </div>

            <div class="delivery-info">
                <h2><?php echo esc_html__('Як передати допомогу', 'pet'); ?></h2>
                <div class="delivery-options">
                    <div class="option">
                        <h3><?php echo esc_html__('Особисто', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Ви можете привезти речі безпосередньо до притулку в робочі години', 'pet'); ?></p>
                    </div>
                    <div class="option">
                        <h3><?php echo esc_html__('Доставка', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Замовити доставку на адресу притулку через службу доставки', 'pet'); ?></p>
                    </div>
                    <div class="option">
                        <h3><?php echo esc_html__('Волонтери', 'pet'); ?></h3>
                        <p><?php echo esc_html__('Наші волонтери можуть забрати речі за вашою адресою', 'pet'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>