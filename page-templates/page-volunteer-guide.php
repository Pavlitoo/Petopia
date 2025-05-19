<?php

/**
 * Template Name: Гайд для волонтерів
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('volunteer_header');
$directions = get_field('volunteer_directions');
$becoming_volunteer = get_field('becoming_volunteer');
$cta = get_field('volunteer_cta');
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

                <!-- Rest of the content -->
                <h2><?php echo esc_html__('Напрямки волонтерства', 'pet'); ?></h2>
                <div class="volunteer-options">
                    <?php if ($directions) : ?>
                        <?php foreach ($directions as $direction) : ?>
                            <div class="option-card">
                                <h3><?php echo esc_html($direction['direction_title']); ?></h3>
                                <p><?php echo esc_html($direction['direction_description']); ?></p>
                                <?php if ($direction['tasks']) : ?>
                                    <ul>
                                        <?php foreach ($direction['tasks'] as $task) : ?>
                                            <li><?php echo esc_html($task['task']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <h2><?php echo esc_html__('Як стати волонтером', 'pet'); ?></h2>
                <ol class="steps-list">
                    <?php if ($becoming_volunteer) : ?>
                        <?php foreach ($becoming_volunteer as $step) : ?>
                            <li>
                                <h3><?php echo esc_html($step['step_title']); ?></h3>
                                <p><?php echo esc_html($step['step_description']); ?></p>
                            </li>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>

                <?php if ($cta) : ?>
                    <div class="volunteer-cta">
                        <h3><?php echo esc_html($cta['title']); ?></h3>
                        <p><?php echo esc_html($cta['description']); ?></p>
                    </div>

                    <!-- Volunteer form section -->
                    <div class="volunteer-form-section">
                        <h2><?php echo esc_html__('Стати волонтером', 'pet'); ?></h2>
                        <form id="volunteer-application-form" class="volunteer-form">
                            <?php wp_nonce_field('volunteer_nonce', 'security'); ?>

                            <div class="form-group">
                                <label for="name"><?php echo esc_html__("Ваше ім'я", 'pet'); ?> *</label>
                                <input type="text" id="name" name="name" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone"><?php echo esc_html__('Телефон', 'pet'); ?> *</label>
                                <input type="tel" id="phone" name="phone" required placeholder="+380XXXXXXXXX">
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="experience"><?php echo esc_html__('Досвід роботи з тваринами', 'pet'); ?> *</label>
                                <textarea id="experience" name="experience" rows="4" required></textarea>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="availability"><?php echo esc_html__('Доступний час для волонтерства', 'pet'); ?> *</label>
                                <select id="availability" name="availability" required>
                                    <option value=""><?php echo esc_html__('Оберіть...', 'pet'); ?></option>
                                    <option value="weekdays"><?php echo esc_html__('Будні дні', 'pet'); ?></option>
                                    <option value="weekends"><?php echo esc_html__('Вихідні', 'pet'); ?></option>
                                    <option value="flexible"><?php echo esc_html__('Гнучкий графік', 'pet'); ?></option>
                                </select>
                                <span class="error-message"></span>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <?php echo esc_html__('Відправити заявку', 'pet'); ?>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>






            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>