<?php

/**
 * Template Name: Історії успіху
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('stories_header');
$stories = get_field('success_stories');
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
            <div class="stories-grid">
                <?php if ($stories) : ?>
                    <?php foreach ($stories as $story) : ?>
                        <article class="success-story">
                            <div class="story-image">
                                <img src="<?php echo esc_url($story['image']); ?>" alt="<?php echo esc_attr($story['title']); ?>">
                            </div>
                            <div class="story-content">
                                <h2><?php echo esc_html($story['title']); ?></h2>
                                <p class="story-meta">
                                    <?php echo esc_html__('У притулку: ', 'pet') . esc_html($story['meta']['shelter_time']); ?> |
                                    <?php echo esc_html__('Знайшов дім: ', 'pet') . esc_html($story['meta']['adoption_date']); ?>
                                </p>
                                <div class="story-text">
                                    <?php echo wp_kses_post($story['content']); ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>