<?php

/**
 * Template Name: FAQ
 *
 * @package Pet
 */

get_header();

// Get FAQ categories from ACF
$faq_categories = get_field('faq_categories');
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Часті запитання', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Відповіді на найпоширеніші запитання про наш притулок', 'pet'); ?></p>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <?php if ($faq_categories) : ?>
                <div class="faq-categories">
                    <?php foreach ($faq_categories as $index => $category) : ?>
                        <button class="faq-category <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-category="<?php echo esc_attr($category['slug']); ?>">
                            <?php echo esc_html($category['name']); ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div class="faq-list">
                    <?php foreach ($faq_categories as $index => $category) : ?>
                        <div class="faq-category-content <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-category="<?php echo esc_attr($category['slug']); ?>">
                            <?php if ($category['questions']) : ?>
                                <?php foreach ($category['questions'] as $question) : ?>
                                    <div class="faq-item">
                                        <div class="faq-question">
                                            <h3><?php echo esc_html($question['question']); ?></h3>
                                            <span class="faq-icon">+</span>
                                        </div>
                                        <div class="faq-answer">
                                            <?php echo wp_kses_post($question['answer']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="no-faq"><?php echo esc_html__('Наразі немає доданих питань.', 'pet'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>