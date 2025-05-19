<?php

/**
 * Template Name: Допомогти
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('help_header');
$donation_form = get_field('donation_form');
$help_options = get_field('help_options');
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($header['title']); ?></h1>
            <p class="page-description"><?php echo esc_html($header['description']); ?></p>
        </div>
    </section>

    <section class="support-section">
        <div class="container">
            <div class="support-inner">
                <!-- Donation Form -->
                <div class="support-form">
                    <h2><?php echo esc_html($donation_form['title']); ?></h2>
                    <p class="support-description"><?php echo esc_html($donation_form['description']); ?></p>

                    <form id="donation-form" action="#" method="post">
                        <div class="form-group">
                            <label class="form-label"><?php echo esc_html__('Сума пожертви', 'pet'); ?></label>
                            <div class="amount-buttons">
                                <?php if ($donation_form['amounts']):
                                    foreach ($donation_form['amounts'] as $amount): ?>
                                        <button type="button" class="amount-btn" data-amount="<?php echo esc_attr($amount['amount']); ?>">
                                            <?php echo esc_html($amount['amount']); ?>₴
                                        </button>
                                <?php endforeach;
                                endif; ?>
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

                    <?php if ($help_options): ?>
                        <div class="help-options">
                            <?php foreach ($help_options as $option): ?>
                                <div class="help-option">
                                    <h4>
                                        <span class="help-icon"><i class="<?php echo esc_attr($option['icon']); ?>"></i></span>
                                        <?php echo esc_html($option['title']); ?>
                                    </h4>
                                    <p><?php echo esc_html($option['description']); ?></p>
                                    <?php if ($option['link']): ?>
                                        <a href="<?php echo esc_url($option['link']['url']); ?>" class="help-link">
                                            <?php echo esc_html($option['link']['title']); ?> →
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>