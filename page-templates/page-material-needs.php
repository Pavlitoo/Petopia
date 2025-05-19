<?php

/**
 * Template Name: Матеріальні потреби
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('needs_header');
$categories = get_field('needs_categories');
$delivery = get_field('delivery_info');
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($header['title']); ?></h1>
            <p class="page-description"><?php echo esc_html($header['description']); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="needs-grid">
                <?php if ($categories) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <div class="need-category">
                            <h2><?php echo esc_html($category['title']); ?></h2>
                            <?php if ($category['items']) : ?>
                                <ul class="needs-list">
                                    <?php foreach ($category['items'] as $item) : ?>
                                        <li class="need-item priority-<?php echo esc_attr($item['priority']); ?>">
                                            <strong><?php echo esc_html($item['name']); ?></strong>
                                            <p><?php echo esc_html($item['description']); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if ($delivery) : ?>
                <div class="delivery-info">
                    <h2><?php echo esc_html($delivery['title']); ?></h2>
                    <div class="delivery-options">
                        <?php if ($delivery['options']) : ?>
                            <?php foreach ($delivery['options'] as $option) : ?>
                                <div class="option">
                                    <h3><?php echo esc_html($option['title']); ?></h3>
                                    <p><?php echo esc_html($option['description']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>