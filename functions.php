<?php

/**
 * Pet Theme functions and definitions
 *
 * @package Pet
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define theme constants
define('PET_THEME_VERSION', '1.0.0');
define('PET_THEME_URI', get_template_directory_uri());
define('PET_THEME_DIR', get_template_directory());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function pet_setup()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register menu locations
    register_nav_menus(array(
        'primary' => esc_html__('Головне меню', 'pet'),
        'footer_1' => esc_html__('Швидкі посилання', 'pet'),
        'footer_2' => esc_html__('Інформація', 'pet'),
        'footer_3' => esc_html__('Графік роботи', 'pet'),
    ));

    // Switch default core markup to valid HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('pet_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo.
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    // Add support for post comments
    add_post_type_support('animal', 'comments');
}
add_action('after_setup_theme', 'pet_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function pet_content_width()
{
    $GLOBALS['content_width'] = apply_filters('pet_content_width', 1200);
}
add_action('after_setup_theme', 'pet_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function pet_scripts()
{
    // Enqueue Google Fonts
    wp_enqueue_style('pet-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');

    // Enqueue main stylesheet
    wp_enqueue_style('pet-style', PET_THEME_URI . '/assets/css/style.css', array(), PET_THEME_VERSION);

    // Enqueue responsive stylesheet
    wp_enqueue_style('pet-responsive', PET_THEME_URI . '/assets/css/responsive.css', array(), PET_THEME_VERSION);

    // Enqueue main JavaScript file
    wp_enqueue_script('pet-main', PET_THEME_URI . '/assets/js/main.js', array('jquery'), PET_THEME_VERSION, true);

    // Enqueue Counter Up library
    wp_enqueue_script('waypoints', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', array('jquery'), '4.0.1', true);
    wp_enqueue_script('counterup', 'https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js', array('jquery', 'waypoints'), '1.0.0', true);

    // If donation form is present on the page
    if (is_front_page()) {
        wp_enqueue_script('pet-donations', PET_THEME_URI . '/assets/js/donations.js', array('jquery'), PET_THEME_VERSION, true);
    }

    // Add help.js for the help page
    if (is_page_template('page-help.php')) {
        wp_enqueue_script('pet-help', get_template_directory_uri() . '/assets/js/help.js', array('jquery'), '1.0.0', true);
    }

    // Enqueue animal.js for single animal pages
    if (is_singular('animal')) {
        wp_enqueue_script('pet-animal', get_template_directory_uri() . '/assets/js/animal.js', array('jquery'), PET_THEME_VERSION, true);

        // Localize the script with necessary data
        wp_localize_script('pet-animal', 'petAnimalData', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('pet-animal-nonce'),
            'shareTitle' => get_the_title(),
            'shareUrl' => get_permalink()
        ));
    }

    // If it's a singular post/page and comments are open
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'pet_scripts');

/**
 * Include required files.
 */
require PET_THEME_DIR . '/inc/template-functions.php';
require PET_THEME_DIR . '/inc/customizer.php';
require PET_THEME_DIR . '/inc/custom-post-types.php';
require PET_THEME_DIR . '/inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
function pet_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
        /* translators: %s: post date. */
        esc_html_x('Posted on %s', 'post date', 'pet'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function pet_posted_by()
{
    $byline = sprintf(
        /* translators: %s: post author. */
        esc_html_x('by %s', 'post author', 'pet'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Handle adoption form submission
 */
function pet_handle_adoption_form()
{
    check_ajax_referer('pet-adoption-nonce', 'nonce');

    if (!isset($_POST['animal_id']) || !isset($_POST['name']) || !isset($_POST['email'])) {
        wp_send_json_error(array('message' => 'Missing required fields'));
        return;
    }

    $animal_id = intval($_POST['animal_id']);
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Create adoption post
    $adoption_data = array(
        'post_title'    => sprintf('Заявка на %s від %s', get_the_title($animal_id), $name),
        'post_type'     => 'adoption',
        'post_status'   => 'publish'
    );

    $post_id = wp_insert_post($adoption_data);

    if (is_wp_error($post_id)) {
        wp_send_json_error(array('message' => 'Error creating adoption request'));
        return;
    }

    // Save meta data
    update_post_meta($post_id, 'adoption_animal', $animal_id);
    update_post_meta($post_id, 'adoption_name', $name);
    update_post_meta($post_id, 'adoption_phone', $phone);
    update_post_meta($post_id, 'adoption_email', $email);
    update_post_meta($post_id, 'adoption_message', $message);
    update_post_meta($post_id, 'adoption_status', 'new');

    // Send success response
    wp_send_json_success(array(
        'message' => 'Заявку успішно відправлено'
    ));
}
add_action('wp_ajax_pet_adoption_form', 'pet_handle_adoption_form');
add_action('wp_ajax_nopriv_pet_adoption_form', 'pet_handle_adoption_form');



/**
 * Add adoption status column to admin list
 */
function pet_add_adoption_columns($columns)
{
    $columns['adoption_status'] = __('Статус', 'pet');
    $columns['adoption_animal'] = __('Тварина', 'pet');
    $columns['adoption_contact'] = __('Контакти', 'pet');
    return $columns;
}
add_filter('manage_adoption_posts_columns', 'pet_add_adoption_columns');

/**
 * Fill adoption status column
 */
function pet_fill_adoption_columns($column, $post_id)
{
    switch ($column) {
        case 'adoption_status':
            $status = get_field('adoption_status', $post_id);
            $statuses = array(
                'new' => 'Нова',
                'in_progress' => 'В обробці',
                'approved' => 'Схвалено',
                'rejected' => 'Відхилено'
            );
            echo isset($statuses[$status]) ? esc_html($statuses[$status]) : '';
            break;

        case 'adoption_animal':
            $animal_id = get_post_meta($post_id, 'adoption_animal', true);
            if ($animal_id) {
                $animal = get_post($animal_id);
                if ($animal) {
                    echo '<a href="' . esc_url(get_edit_post_link($animal_id)) . '">' .
                        esc_html($animal->post_title) . '</a>';
                }
            }
            break;

        case 'adoption_contact':
            $name = get_field('adoption_name', $post_id);
            $phone = get_field('adoption_phone', $post_id);
            $email = get_field('adoption_email', $post_id);
            echo esc_html($name) . '<br>';
            echo esc_html($phone) . '<br>';
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            break;
    }
}
add_action('manage_adoption_posts_custom_column', 'pet_fill_adoption_columns', 10, 2);


/**
 * Переконуємося, що тип запису "animal" підтримує коментарі
 * Додайте цей код до файлу functions.php
 */
function pet_ensure_animal_post_type_supports_comments()
{
    // Якщо animal вже зареєстрований, додаємо підтримку коментарів
    if (post_type_exists('animal')) {
        add_post_type_support('animal', 'comments');
    }
}
add_action('init', 'pet_ensure_animal_post_type_supports_comments', 11); // Пріоритет 11, щоб викликати після реєстрації типу запису

/**
 * Додаємо функцію для діагностики проблем з коментарями
 */
function pet_debug_comments()
{
    if (is_singular('animal')) {
        echo '<!-- Debug: ';
        echo 'comments_open: ' . (comments_open() ? 'true' : 'false') . ', ';
        echo 'get_comments_number: ' . get_comments_number() . ', ';
        echo 'post_type_supports_comments: ' . (post_type_supports('animal', 'comments') ? 'true' : 'false');
        echo ' -->';
    }
}
add_action('wp_footer', 'pet_debug_comments');

/**
 * Переконуємося, що коментарі відкриті для всіх нових тварин
 */
function pet_enable_comments_for_animals($post_id, $post, $update)
{
    // Перевіряємо, чи це тип запису "animal"
    if ($post->post_type === 'animal') {
        // Якщо коментарі закриті, відкриваємо їх
        if ($post->comment_status === 'closed') {
            wp_update_post(array(
                'ID' => $post_id,
                'comment_status' => 'open'
            ));
        }
    }
}
add_action('wp_insert_post', 'pet_enable_comments_for_animals', 10, 3);
