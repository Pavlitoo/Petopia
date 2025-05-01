<?php
/**
 * Template part for displaying rescue coins section
 *
 * @package Pet
 */
?>

<section class="coins-section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html__('Система "Рятувальних монет"', 'pet'); ?></h2>
            <p><?php echo esc_html__('Заробляйте монети та обмінюйте їх на винагороди', 'pet'); ?></p>
        </div>

        <div class="coins-grid">
            <div class="coin-card">
                <div class="coin-icon">🎯</div>
                <h3 class="coin-title"><?php echo esc_html__('Допомагайте', 'pet'); ?></h3>
                <p class="coin-description"><?php echo esc_html__('За кожну допомогу притулку ви отримуєте монети', 'pet'); ?></p>
            </div>

            <div class="coin-card">
                <div class="coin-icon">💰</div>
                <h3 class="coin-title"><?php echo esc_html__('Збирайте', 'pet'); ?></h3>
                <p class="coin-description"><?php echo esc_html__('Накопичуйте монети на своєму балансі', 'pet'); ?></p>
            </div>

            <div class="coin-card">
                <div class="coin-icon">🎁</div>
                <h3 class="coin-title"><?php echo esc_html__('Обмінюйте', 'pet'); ?></h3>
                <p class="coin-description"><?php echo esc_html__('Обмінюйте монети на цікаві винагороди', 'pet'); ?></p>
            </div>
        </div>
    </div>
</section>