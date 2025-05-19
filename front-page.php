<?php

/**
 * The template for displaying the front page
 *
 * @package Pet
 */

get_header();

// Get hero section fields
$hero = get_field('hero_section', 'option');
$about = get_field('about_section', 'option');
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-inner">
                <div class="hero-content">
                    <h1 class="hero-title"><?php echo esc_html($hero['hero_title']); ?></h1>
                    <p class="hero-description"><?php echo esc_html($hero['hero_description']); ?></p>
                    <div class="hero-buttons">
                        <a href="#animals" class="btn btn-primary"><?php echo esc_html($hero['hero_button_primary']); ?></a>

                    </div>
                </div>
                <div class="hero-image">
                    <?php if ($hero['hero_image']) : ?>
                        <img src="<?php echo esc_url($hero['hero_image']); ?>" alt="<?php echo esc_attr($hero['hero_title']); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <?php get_template_part('template-parts/section', 'stats'); ?>

    <!-- Animals Section -->
    <?php get_template_part('template-parts/section', 'animals'); ?>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-inner">
                <div class="about-content">
                    <h2><?php echo esc_html($about['about_title']); ?></h2>
                    <div class="about-text">
                        <?php echo wp_kses_post($about['about_content']); ?>
                    </div>
                    <?php if ($about['about_button']) : ?>
                        <div class="about-actions">
                            <a href="<?php echo esc_url($about['about_button']['url']); ?>" class="btn btn-primary">
                                <?php echo esc_html($about['about_button']['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="about-image">
                    <?php if ($about['about_image']) : ?>
                        <img src="<?php echo esc_url($about['about_image']); ?>" alt="<?php echo esc_attr($about['about_title']); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Rescue Coins Section -->
    <?php get_template_part('template-parts/section', 'rescue-coins'); ?>

    <!-- Support Section -->
    <?php get_template_part('template-parts/section', 'support'); ?>

</main>

<?php
get_footer();
