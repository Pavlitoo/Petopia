<?php

/**
 * Pet Theme Customizer
 *
 * @package Pet
 */

function pet_customize_register($wp_customize)
{
    // Colors Section
    $wp_customize->add_section('pet_colors', array(
        'title'    => __('Кольори сайту', 'pet'),
        'priority' => 30,
    ));

    // Primary Color
    $wp_customize->add_setting('pet_primary_color', array(
        'default'           => '#FF751F',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_primary_color', array(
        'label'    => __('Основний колір', 'pet'),
        'section'  => 'pet_colors',
        'settings' => 'pet_primary_color',
    )));

    // Secondary Color
    $wp_customize->add_setting('pet_secondary_color', array(
        'default'           => '#E3F5F6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_secondary_color', array(
        'label'    => __('Додатковий колір', 'pet'),
        'section'  => 'pet_colors',
        'settings' => 'pet_secondary_color',
    )));

    // Button Color
    $wp_customize->add_setting('pet_button_color', array(
        'default'           => '#FF751F',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_button_color', array(
        'label'    => __('Колір кнопок', 'pet'),
        'section'  => 'pet_colors',
        'settings' => 'pet_button_color',
    )));

    // Button Text Color
    $wp_customize->add_setting('pet_button_text_color', array(
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_button_text_color', array(
        'label'    => __('Колір тексту кнопок', 'pet'),
        'section'  => 'pet_colors',
        'settings' => 'pet_button_text_color',
    )));

    // Header Section
    $wp_customize->add_section('pet_header', array(
        'title'    => __('Налаштування шапки', 'pet'),
        'priority' => 35,
    ));

    // Header Background Color
    $wp_customize->add_setting('pet_header_bg_color', array(
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_header_bg_color', array(
        'label'    => __('Колір фону шапки', 'pet'),
        'section'  => 'pet_header',
    )));

    // Header Text Color
    $wp_customize->add_setting('pet_header_text_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_header_text_color', array(
        'label'    => __('Колір тексту в шапці', 'pet'),
        'section'  => 'pet_header',
    )));

    // Header Height
    $wp_customize->add_setting('pet_header_height', array(
        'default'           => '20',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('pet_header_height', array(
        'label'    => __('Висота шапки (px)', 'pet'),
        'section'  => 'pet_header',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 100,
            'step' => 1,
        ),
    ));

    // Logo Size
    $wp_customize->add_setting('pet_logo_size', array(
        'default'           => '60',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('pet_logo_size', array(
        'label'    => __('Розмір логотипу (px)', 'pet'),
        'section'  => 'pet_header',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 20,
            'max'  => 200,
            'step' => 1,
        ),
    ));

    // Typography Section
    $wp_customize->add_section('pet_typography', array(
        'title'    => __('Типографія', 'pet'),
        'priority' => 40,
    ));

    // Heading Font Size
    $wp_customize->add_setting('pet_heading_font_size', array(
        'default'           => '32',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('pet_heading_font_size', array(
        'label'    => __('Розмір заголовків (px)', 'pet'),
        'section'  => 'pet_typography',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 16,
            'max'  => 72,
            'step' => 1,
        ),
    ));

    // Body Font Size
    $wp_customize->add_setting('pet_body_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('pet_body_font_size', array(
        'label'    => __('Розмір основного тексту (px)', 'pet'),
        'section'  => 'pet_typography',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ));

    // Content Section
    $wp_customize->add_section('pet_content', array(
        'title'    => __('Контент', 'pet'),
        'priority' => 45,
    ));

    // Hero Title
    $wp_customize->add_setting('pet_hero_title', array(
        'default'           => __('Подаруйте дім, врятуйте життя', 'pet'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('pet_hero_title', array(
        'label'    => __('Заголовок головного банера', 'pet'),
        'section'  => 'pet_content',
        'type'     => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('pet_hero_description', array(
        'default'           => __('Допоможіть нашим чотирилапим друзям знайти новий дім!', 'pet'),
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('pet_hero_description', array(
        'label'    => __('Опис головного банера', 'pet'),
        'section'  => 'pet_content',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'pet_customize_register');

/**
 * Output Customizer CSS
 */
function pet_customizer_css()
{
?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr(get_theme_mod('pet_primary_color', '#FF751F')); ?>;
            --secondary-color: <?php echo esc_attr(get_theme_mod('pet_secondary_color', '#E3F5F6')); ?>;
            --button-color: <?php echo esc_attr(get_theme_mod('pet_button_color', '#FF751F')); ?>;
            --button-text-color: <?php echo esc_attr(get_theme_mod('pet_button_text_color', '#FFFFFF')); ?>;
            --heading-font-size: <?php echo esc_attr(get_theme_mod('pet_heading_font_size', '32')); ?>px;
            --body-font-size: <?php echo esc_attr(get_theme_mod('pet_body_font_size', '16')); ?>px;
        }

        .site-header {
            background-color: <?php echo esc_attr(get_theme_mod('pet_header_bg_color', '#FFFFFF')); ?>;
            padding: <?php echo esc_attr(get_theme_mod('pet_header_height', '20')); ?>px 0;
        }

        .site-header .nav-menu a {
            color: <?php echo esc_attr(get_theme_mod('pet_header_text_color', '#333333')); ?>;
        }

        .site-logo img {
            max-height: <?php echo esc_attr(get_theme_mod('pet_logo_size', '60')); ?>px;
        }

        .btn-primary {
            background-color: var(--button-color);
            color: var(--button-text-color);
        }

        .btn-primary:hover {
            background-color: <?php echo esc_attr(pet_adjust_brightness(get_theme_mod('pet_button_color', '#FF751F'), -20)); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'pet_customizer_css');

/**
 * Helper function to adjust brightness of a color
 */
function pet_adjust_brightness($hex, $steps)
{
    // Remove # if present
    $hex = ltrim($hex, '#');

    // Convert to RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Adjust brightness
    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));

    // Convert back to hex
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}
