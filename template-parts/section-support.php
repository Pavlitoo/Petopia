<?php

/**
 * Template part for displaying support section
 *
 * @package Pet
 */
?>

<section id="support" class="support-section">
    <div class="container">
        <div class="support-inner">
            <!-- Donation Form -->
            <div class="support-form">
                <h2><?php echo esc_html__('Підтримайте нас', 'pet'); ?></h2>
                <p class="support-description"><?php echo esc_html__('Ваша підтримка допоможе нам рятувати більше тварин та створювати комфортні умови для наших підопічних.', 'pet'); ?></p>

                <form id="donation-form" action="#" method="post">
                    <div class="form-group">
                        <label class="form-label"><?php echo esc_html__('Сума пожертви', 'pet'); ?></label>
                        <div class="amount-buttons">
                            <button type="button" class="amount-btn" data-amount="100">100₴</button>
                            <button type="button" class="amount-btn" data-amount="200">200₴</button>
                            <button type="button" class="amount-btn active" data-amount="500">500₴</button>
                            <button type="button" class="amount-btn" data-amount="1000">1000₴</button>
                        </div>
                        <input type="number" class="form-control" name="custom_amount" value="500">
                    </div>

                    <div class="form-group">
                        <label class="form-label"><?php echo esc_html__('Ваше ім\'я', 'pet'); ?></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-support">
                        <?php echo esc_html__('Підтримати притулок', 'pet'); ?>
                    </button>

                    <p class="rescue-coins-info">
                        <?php echo esc_html__('Ви отримаєте +50 Рятувальних монет за пожертву', 'pet'); ?>
                    </p>
                </form>
            </div>

            <!-- Other Ways to Help -->
            <div class="other-help">
                <h3><?php echo esc_html__('Інші способи допомогти', 'pet'); ?></h3>

                <div class="help-options">
                    <div class="help-option">
                        <h4>
                            <span class="help-icon">⭐</span>
                            <?php echo esc_html__('Волонтерство', 'pet'); ?>
                        </h4>
                        <p><?php echo esc_html__('Станьте волонтером та допомагайте доглядати за тваринами', 'pet'); ?></p>
                        <a href="<?php echo esc_url(home_url('/info/volunteer-guide')); ?>" class="help-link"><?php echo esc_html__('Дізнатись більше →', 'pet'); ?></a>
                    </div>

                    <div class="help-option">
                        <h4>
                            <span class="help-icon">📦</span>
                            <?php echo esc_html__('Матеріальна допомога', 'pet'); ?>
                        </h4>
                        <p><?php echo esc_html__('Допоможіть кормом, ліками та іншими необхідними речами', 'pet'); ?></p>
                        <a href="<?php echo esc_url(home_url('/info/material-needs')); ?>" class="help-link"><?php echo esc_html__('Переглянути потреби →', 'pet'); ?></a>
                    </div>

                    <div class="help-option">
                        <h4>
                            <span class="help-icon">💌</span>
                            <?php echo esc_html__('Розповсюдження інформації', 'pet'); ?>
                        </h4>
                        <p><?php echo esc_html__('Поширюйте інформацію про наших тварин у соціальних мережах', 'pet'); ?></p>
                        <a href="<?php echo esc_url(home_url('/info/share-info')); ?>" class="help-link"><?php echo esc_html__('Поділитися →', 'pet'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>