<?php
/**
 * Theme functions and definitions
 */

// Визначення констант теми
define('THEME_VERSION', '1.0.0');
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

/**
 * Налаштування теми
 */
function animal_shelter_setup() {
    // Додавання базової підтримки теми
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Реєстрація меню
    register_nav_menus(array(
        'primary' => 'Головне меню',
        'footer'  => 'Футер меню'
    ));
}
add_action('after_setup_theme', 'animal_shelter_setup');

/**
 * Підключення стилів та скриптів
 */
function animal_shelter_scripts() {
    // Стилі
    wp_enqueue_style('animal-shelter-style', get_stylesheet_uri(), array(), THEME_VERSION);
    wp_enqueue_style('animal-shelter-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');
    
    // Скрипти
    wp_enqueue_script('animal-shelter-navigation', THEME_URI . '/assets/js/navigation.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script('animal-shelter-filters', THEME_URI . '/assets/js/filters.js', array('jquery'), THEME_VERSION, true);
    
    // Локалізація скриптів
    wp_localize_script('animal-shelter-filters', 'animalShelterData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('animal_shelter_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'animal_shelter_scripts');

/**
 * Реєстрація користувацького типу запису для тварин
 */
function register_animal_post_type() {
    $labels = array(
        'name'               => 'Тварини',
        'singular_name'      => 'Тварина',
        'menu_name'          => 'Тварини',
        'add_new'           => 'Додати тварину',
        'add_new_item'      => 'Додати нову тварину',
        'edit_item'         => 'Редагувати тварину',
        'new_item'          => 'Нова тварина',
        'view_item'         => 'Переглянути тварину',
        'search_items'      => 'Шукати тварин',
        'not_found'         => 'Тварин не знайдено',
        'not_found_in_trash'=> 'В кошику тварин не знайдено'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'animals'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-pets',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('animal', $args);
}
add_action('init', 'register_animal_post_type');

/**
 * Реєстрація таксономій для тварин
 */
function register_animal_taxonomies() {
    // Таксономія для типу тварини
    register_taxonomy('animal_type', 'animal', array(
        'hierarchical'      => true,
        'labels'           => array(
            'name'              => 'Типи тварин',
            'singular_name'     => 'Тип тварини',
            'search_items'      => 'Шукати типи',
            'all_items'         => 'Всі типи',
            'edit_item'         => 'Редагувати тип',
            'update_item'       => 'Оновити тип',
            'add_new_item'      => 'Додати новий тип',
            'new_item_name'     => 'Назва нового типу',
            'menu_name'         => 'Типи тварин'
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'animal-type')
    ));

    // Таксономія для віку
    register_taxonomy('animal_age', 'animal', array(
        'hierarchical'      => true,
        'labels'           => array(
            'name'              => 'Вік',
            'singular_name'     => 'Вік',
            'menu_name'         => 'Вік'
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'animal-age')
    ));

    // Таксономія для розміру
    register_taxonomy('animal_size', 'animal', array(
        'hierarchical'      => true,
        'labels'           => array(
            'name'              => 'Розмір',
            'singular_name'     => 'Розмір',
            'menu_name'         => 'Розмір'
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'animal-size')
    ));
}
add_action('init', 'register_animal_taxonomies');

/**
 * Система монет користувача
 */
function register_user_coins_system() {
    // Додавання поля монет до профілю користувача
    add_action('show_user_profile', 'add_user_coins_field');
    add_action('edit_user_profile', 'add_user_coins_field');
    
    // Збереження поля монет
    add_action('personal_options_update', 'save_user_coins_field');
    add_action('edit_user_profile_update', 'save_user_coins_field');
}
add_action('init', 'register_user_coins_system');

function add_user_coins_field($user) {
    $coins = get_user_meta($user->ID, 'rescue_coins', true);
    ?>
    <h3>Рятувальні монети</h3>
    <table class="form-table">
        <tr>
            <th><label for="rescue_coins">Кількість монет</label></th>
            <td>
                <input type="number" name="rescue_coins" id="rescue_coins" 
                       value="<?php echo esc_attr($coins); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
    <?php
}

function save_user_coins_field($user_id) {
    if (current_user_can('edit_user', $user_id)) {
        update_user_meta($user_id, 'rescue_coins', $_POST['rescue_coins']);
    }
}

/**
 * Функції для роботи з донатами
 */
function process_donation() {
    // Перевірка nonce
    if (!isset($_POST['donation_nonce']) || !wp_verify_nonce($_POST['donation_nonce'], 'process_donation')) {
        wp_send_json_error('Invalid nonce');
    }

    $amount = floatval($_POST['amount']);
    $user_id = get_current_user_id();
    
    // Нарахування монет (1 гривня = 1 монета)
    $current_coins = get_user_meta($user_id, 'rescue_coins', true);
    $new_coins = $current_coins + $amount;
    update_user_meta($user_id, 'rescue_coins', $new_coins);
    
    // Запис донату в базу
    $donation = array(
        'post_title'    => 'Donation from User ' . $user_id,
        'post_status'   => 'publish',
        'post_type'     => 'donation'
    );
    
    $donation_id = wp_insert_post($donation);
    add_post_meta($donation_id, 'amount', $amount);
    add_post_meta($donation_id, 'user_id', $user_id);
    
    wp_send_json_success(array(
        'message' => 'Дякуємо за ваш донат!',
        'new_coins' => $new_coins
    ));
}
add_action('wp_ajax_process_donation', 'process_donation');

/**
 * Функції для фільтрації тварин
 */
function filter_animals() {
    // Перевірка nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'animal_shelter_nonce')) {
        wp_send_json_error('Invalid nonce');
    }

    $args = array(
        'post_type' => 'animal',
        'posts_per_page' => -1,
        'tax_query' => array()
    );

    // Додавання параметрів фільтрації
    if (!empty($_POST['type'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'animal_type',
            'field'    => 'slug',
            'terms'    => $_POST['type']
        );
    }

    if (!empty($_POST['age'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'animal_age',
            'field'    => 'slug',
            'terms'    => $_POST['age']
        );
    }

    if (!empty($_POST['size'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'animal_size',
            'field'    => 'slug',
            'terms'    => $_POST['size']
        );
    }

    $query = new WP_Query($args);
    $html = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ob_start();
            get_template_part('template-parts/content', 'animal-card');
            $html .= ob_get_clean();
        }
    } else {
        $html = '<p>Тварин не знайдено</p>';
    }

    wp_reset_postdata();
    wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_filter_animals', 'filter_animals');
add_action('wp_ajax_nopriv_filter_animals', 'filter_animals');