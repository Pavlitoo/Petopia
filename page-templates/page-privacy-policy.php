<?php

/**
 * Template Name: Політика конфіденційності
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('privacy_header');
$sections = get_field('privacy_sections');
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($header['title']); ?></h1>
            <p class="page-description"><?php echo esc_html($header['description']); ?></p>
        </div>
    </section>

    <section class="privacy-content">
        <div class="container">
            <div class="privacy-wrapper">
                <?php if ($sections) : ?>
                    <div class="privacy-navigation">
                        <h2><?php echo esc_html__('Зміст', 'pet'); ?></h2>
                        <ul class="privacy-nav">
                            <?php foreach ($sections as $index => $section) : ?>
                                <li>
                                    <a href="#section-<?php echo esc_attr($index); ?>">
                                        <?php echo esc_html($section['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="privacy-sections">
                        <?php foreach ($sections as $index => $section) : ?>
                            <div id="section-<?php echo esc_attr($index); ?>" class="privacy-section">
                                <h2><?php echo esc_html($section['title']); ?></h2>
                                <div class="section-content">
                                    <?php echo wp_kses_post($section['content']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>