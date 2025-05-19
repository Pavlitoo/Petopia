<?php

/**
 * Template Name: Правила всиновлення
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('adoption_header');
$process = get_field('adoption_process');
$requirements = get_field('requirements');
$documents = get_field('documents');
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
                <h2><?php echo esc_html__('Процес всиновлення', 'pet'); ?></h2>
                <div class="steps-grid">
                    <?php if ($process) : ?>
                        <?php foreach ($process as $step) : ?>
                            <div class="step-item">
                                <span class="step-number"><?php echo esc_html($step['step_number']); ?></span>
                                <h3><?php echo esc_html($step['step_title']); ?></h3>
                                <p><?php echo esc_html($step['step_description']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <h2><?php echo esc_html__('Вимоги до майбутніх власників', 'pet'); ?></h2>
                <ul class="requirements-list">
                    <?php if ($requirements) : ?>
                        <?php foreach ($requirements as $requirement) : ?>
                            <li>
                                <strong><?php echo esc_html($requirement['requirement_title']); ?></strong>
                                <p><?php echo esc_html($requirement['requirement_description']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <h2><?php echo esc_html__('Необхідні документи', 'pet'); ?></h2>
                <ul class="documents-list">
                    <?php if ($documents) : ?>
                        <?php foreach ($documents as $document) : ?>
                            <li>
                                <strong><?php echo esc_html($document['document_title']); ?></strong>
                                <p><?php echo esc_html($document['document_description']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>