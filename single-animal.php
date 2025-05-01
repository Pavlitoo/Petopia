<?php

/**
 * The template for displaying single animal posts
 *
 * @package Pet
 */

get_header();

// Translate tag values to Ukrainian
$tag_translations = array(
    'urgent' => 'Терміново',
    'special_needs' => 'Особливі потреби',
    'senior' => 'Старший вік'
);
?>

<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('animal-single'); ?>>
        <div class="container">
            <div class="animal-single-inner">
                <div class="animal-single-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                    <?php
                    $tag = get_post_meta(get_the_ID(), 'animal_tag', true);
                    if ($tag && isset($tag_translations[$tag])) : ?>
                        <span class="animal-tag"><?php echo esc_html($tag_translations[$tag]); ?></span>
                    <?php endif; ?>
                </div>

                <div class="animal-single-content">
                    <h1 class="animal-single-title"><?php the_title(); ?></h1>

                    <?php
                    $animal_meta = pet_get_animal_meta();
                    if (!empty($animal_meta)) : ?>
                        <div class="animal-single-meta">
                            <?php if ($animal_meta['age']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Вік', 'pet'); ?>:</span>
                                    <span class="meta-value"><?php echo esc_html($animal_meta['age']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($animal_meta['gender']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Стать', 'pet'); ?>:</span>
                                    <span class="meta-value">
                                        <?php echo esc_html($animal_meta['gender'] === 'male' ? __('Хлопчик', 'pet') : __('Дівчинка', 'pet')); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <?php if ($animal_meta['breed']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Порода', 'pet'); ?>:</span>
                                    <span class="meta-value"><?php echo esc_html($animal_meta['breed']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($animal_meta['size']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Розмір', 'pet'); ?>:</span>
                                    <span class="meta-value"><?php echo esc_html($animal_meta['size']); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="animal-single-description">
                        <?php the_content(); ?>
                    </div>

                    <div class="animal-single-actions">
                        <button class="btn btn-primary btn-adopt" data-animal-id="<?php echo get_the_ID(); ?>">
                            <?php echo esc_html__('Прихистити', 'pet');
                            wp_localize_script('pet-animal', 'petAnimalData', array(
                                'ajaxUrl' => admin_url('admin-ajax.php'),
                                'nonce' => wp_create_nonce('pet-adoption-nonce'),
                                'shareTitle' => get_the_title(),
                                'shareUrl' => get_permalink()
                            )); ?>

                        </button>
                        <button class="btn btn-outline share-btn">
                            <?php echo esc_html__('Поділитися', 'pet'); ?>
                        </button>
                    </div>
                </div>
            </div>



            <div class="animal-comments-container">
                <?php
                // Comments section - використовуємо конкретний шлях та явно вказуємо використовувати шаблон
                comments_template('/comments.php', true);
                ?>
            </div>

            <?php
            // Display related animals
            $args = array(
                'post_type' => 'animal',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand'
            );
            $related_animals = new WP_Query($args);

            if ($related_animals->have_posts()) : ?>
                <div class="related-animals">
                    <h2><?php echo esc_html__('Інші тварини', 'pet'); ?></h2>
                    <div class="animals-grid">
                        <?php while ($related_animals->have_posts()) : $related_animals->the_post(); ?>
                            <?php get_template_part('template-parts/content', 'animal'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </article>
</main>

<?php
get_footer();
?>