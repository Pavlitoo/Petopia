<?php

/**
 * Template part for displaying the about section
 *
 * @package Pet
 */

$about = get_field('about_section', 'option');
?>

<section class="about-section">
    <div class="container">
        <div class="about-inner">
            <div class="about-content">
                <h2><?php echo esc_html($about['about_title']); ?></h2>
                <div class="about-text">
                    <?php echo wp_kses_post($about['about_content']); ?>
                </div>
                <div class="about-actions">
                    <?php
                    $button = $about['about_button'];
                    if ($button && $button['url']) : ?>
                        <a href="<?php echo esc_url($button['url']); ?>"
                            class="btn btn-primary"
                            <?php echo $button['target'] ? 'target="' . esc_attr($button['target']) . '"' : ''; ?>>
                            <?php echo esc_html($button['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($about['about_image']) : ?>
                <div class="about-image">
                    <img src="<?php echo esc_url($about['about_image']); ?>" alt="<?php echo esc_attr($about['about_title']); ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>