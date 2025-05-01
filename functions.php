<?php

/**
 * Petopia functions and definitions
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

// Підключення стилів та скриптів
function petopia_scripts()
{
    wp_enqueue_style('petopia-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_script('petopia-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), _S_VERSION, true);

    if (is_front_page()) {
        wp_enqueue_script('petopia-slider', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), _S_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'petopia_scripts');

// Реєстрація меню
function petopia_register_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => esc_html__('Primary Menu', 'petopia'),
            'footer-menu' => esc_html__('Footer Menu', 'petopia'),
        )
    );
}
add_action('init', 'petopia_register_menus');

// Підтримка функцій WordPress
function petopia_setup()
{
    // Додаємо підтримку для різних функцій WordPress
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'petopia_setup');

// Реєстрація сайдбара
function petopia_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'petopia'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'petopia'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'petopia_widgets_init');

// Створення кастомного типу запису для тварин
function petopia_register_animal_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Тварини',
            'singular_name' => 'Тварина',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-pets',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'animals'),
    );
    register_post_type('animal', $args);
}
add_action('init', 'petopia_register_animal_post_type');









// Додаємо метабокс для деталей тварини
function petopia_animal_details_metabox()
{
    add_meta_box(
        'animal_details',
        __('Деталі тварини', 'petopia'),
        'petopia_animal_details_callback',
        'animal',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'petopia_animal_details_metabox');

// Функція відображення полів
function petopia_animal_details_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'animal_details_nonce');

    // Отримуємо значення, якщо вони вже існують
    $animal_age = get_post_meta($post->ID, 'animal_age', true);
    $animal_breed = get_post_meta($post->ID, 'animal_breed', true);
    $animal_gender = get_post_meta($post->ID, 'animal_gender', true);
    $animal_size = get_post_meta($post->ID, 'animal_size', true);
    $animal_personality = get_post_meta($post->ID, 'animal_personality', true);
    $animal_health = get_post_meta($post->ID, 'animal_health', true);

?>
    <table class="form-table">
        <tr>
            <th><label for="animal_age"><?php _e('Вік', 'petopia'); ?></label></th>
            <td><input type="text" id="animal_age" name="animal_age" value="<?php echo esc_attr($animal_age); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="animal_breed"><?php _e('Порода', 'petopia'); ?></label></th>
            <td><input type="text" id="animal_breed" name="animal_breed" value="<?php echo esc_attr($animal_breed); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="animal_gender"><?php _e('Стать', 'petopia'); ?></label></th>
            <td>
                <select id="animal_gender" name="animal_gender">
                    <option value=""><?php _e('Виберіть стать', 'petopia'); ?></option>
                    <option value="Чоловіча" <?php selected($animal_gender, 'Чоловіча'); ?>><?php _e('Чоловіча', 'petopia'); ?></option>
                    <option value="Жіноча" <?php selected($animal_gender, 'Жіноча'); ?>><?php _e('Жіноча', 'petopia'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="animal_size"><?php _e('Розмір', 'petopia'); ?></label></th>
            <td>
                <select id="animal_size" name="animal_size">
                    <option value=""><?php _e('Виберіть розмір', 'petopia'); ?></option>
                    <option value="Малий" <?php selected($animal_size, 'Малий'); ?>><?php _e('Малий', 'petopia'); ?></option>
                    <option value="Середній" <?php selected($animal_size, 'Середній'); ?>><?php _e('Середній', 'petopia'); ?></option>
                    <option value="Великий" <?php selected($animal_size, 'Великий'); ?>><?php _e('Великий', 'petopia'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="animal_personality"><?php _e('Характер', 'petopia'); ?></label></th>
            <td><textarea id="animal_personality" name="animal_personality" rows="4" class="large-text"><?php echo esc_textarea($animal_personality); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="animal_health"><?php _e('Здоров\'я', 'petopia'); ?></label></th>
            <td><textarea id="animal_health" name="animal_health" rows="4" class="large-text"><?php echo esc_textarea($animal_health); ?></textarea></td>
        </tr>
    </table>
<?php
}

// Зберігаємо дані
function petopia_save_animal_details($post_id)
{
    // Перевіряємо nonce
    if (!isset($_POST['animal_details_nonce']) || !wp_verify_nonce($_POST['animal_details_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // Перевіряємо автозбереження
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Перевіряємо права доступу
    if ('animal' == $_POST['post_type'] && !current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Зберігаємо значення полів
    $fields = array('animal_age', 'animal_breed', 'animal_gender', 'animal_size', 'animal_personality', 'animal_health');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        } else {
            delete_post_meta($post_id, $field);
        }
    }
}
add_action('save_post', 'petopia_save_animal_details');
