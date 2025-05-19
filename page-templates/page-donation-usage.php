<?php

/**
 * Template Name: Використання пожертв
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('donation_header');
$distribution = get_field('donation_distribution');
$reporting = get_field('reporting');
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
            <div class="content-wrapper">
                <h2><?php echo esc_html__('Розподіл коштів', 'pet'); ?></h2>
                <div class="donation-distribution">
                    <?php if ($distribution) : ?>
                        <?php foreach ($distribution as $category) : ?>
                            <div class="distribution-item">
                                <h3><?php echo esc_html($category['percentage']); ?>%</h3>
                                <p><?php echo esc_html($category['title']); ?></p>
                                <?php if ($category['items']) : ?>
                                    <ul>
                                        <?php foreach ($category['items'] as $item) : ?>
                                            <li><?php echo esc_html($item['item']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php if ($reporting) : ?>
                    <h2><?php echo esc_html($reporting['title']); ?></h2>
                    <p><?php echo esc_html($reporting['description']); ?></p>
                    <?php if ($reporting['report_types']) : ?>
                        <ul class="report-list">
                            <?php foreach ($reporting['report_types'] as $report) : ?>
                                <li><?php echo esc_html($report['report_type']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>