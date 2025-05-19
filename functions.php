<?php

/**
 * Pet Theme functions and definitions
 *
 * @package Pet
 */

if (!defined('ABSPATH')) {
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
    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

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
 * WooCommerce specific scripts & stylesheets.
 */
function pet_woocommerce_scripts()
{
    wp_enqueue_style('pet-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), PET_THEME_VERSION);

    $font_path   = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
            font-family: "star";
            src: url("' . $font_path . 'star.eot");
            src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
                url("' . $font_path . 'star.woff") format("woff"),
                url("' . $font_path . 'star.ttf") format("truetype"),
                url("' . $font_path . 'star.svg#star") format("svg");
            font-weight: normal;
            font-style: normal;
        }';

    wp_add_inline_style('pet-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'pet_woocommerce_scripts');

/**
 * Add 'woocommerce-active' class to the body tag.
 */
function pet_woocommerce_active_body_class($classes)
{
    $classes[] = 'woocommerce-active';
    return $classes;
}
add_filter('body_class', 'pet_woocommerce_active_body_class');

/**
 * Related Products Args.
 */
function pet_woocommerce_related_products_args($args)
{
    $defaults = array(
        'posts_per_page' => 3,
        'columns'        => 3,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}
add_filter('woocommerce_output_related_products_args', 'pet_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('pet_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     */
    function pet_woocommerce_wrapper_before()
    {
?>
        <main id="primary" class="site-main">
            <div class="container">
            <?php
        }
    }
    add_action('woocommerce_before_main_content', 'pet_woocommerce_wrapper_before');

    if (!function_exists('pet_woocommerce_wrapper_after')) {
        /**
         * After Content.
         */
        function pet_woocommerce_wrapper_after()
        {
            ?>
            </div>
        </main>
    <?php
        }
    }
    add_action('woocommerce_after_main_content', 'pet_woocommerce_wrapper_after');

    /**
     * Sample implementation of the WooCommerce Mini Cart.
     */
    if (!function_exists('pet_woocommerce_cart_link_fragment')) {
        /**
         * Cart Fragments.
         */
        function pet_woocommerce_cart_link_fragment($fragments)
        {
            ob_start();
            pet_woocommerce_cart_link();
            $fragments['a.cart-contents'] = ob_get_clean();

            return $fragments;
        }
    }
    add_filter('woocommerce_add_to_cart_fragments', 'pet_woocommerce_cart_link_fragment');

    if (!function_exists('pet_woocommerce_cart_link')) {
        /**
         * Cart Link.
         */
        function pet_woocommerce_cart_link()
        {
    ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'pet'); ?>">
            <?php
            $item_count_text = sprintf(
                /* translators: number of items in the mini cart. */
                _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'pet'),
                WC()->cart->get_cart_contents_count()
            );
            ?>
            <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
        </a>
    <?php
        }
    }

    if (!function_exists('pet_woocommerce_header_cart')) {
        /**
         * Display Header Cart.
         */
        function pet_woocommerce_header_cart()
        {
            if (is_cart()) {
                $class = 'current-menu-item';
            } else {
                $class = '';
            }
    ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr($class); ?>">
                <?php pet_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = array(
                    'title' => '',
                );
                the_widget('WC_Widget_Cart', $instance);
                ?>
            </li>
        </ul>
<?php
        }
    }

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

        // Add contact form script
        if (is_page_template('page-contact.php')) {
            wp_enqueue_script('pet-contact', get_template_directory_uri() . '/assets/js/contact.js', array('jquery'), '1.0.0', true);
            wp_localize_script('pet-contact', 'petData', array(
                'ajaxUrl' => admin_url('admin-ajax.php')
            ));
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
     * Enqueue adoption form scripts
     */
    function pet_enqueue_adoption_scripts()
    {
        if (is_singular('animal')) {
            wp_enqueue_script('pet-animal', get_template_directory_uri() . '/assets/js/animal.js', array('jquery'), '1.0.0', true);
            wp_localize_script('pet-animal', 'petAdoptionData', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('pet_adoption_nonce')
            ));
        }
    }
    add_action('wp_enqueue_scripts', 'pet_enqueue_adoption_scripts');

    /**
     * Add nonce field and honeypot to forms
     */
    function pet_add_form_protection()
    {
        wp_nonce_field('pet_form_nonce', 'form_nonce');
        echo '<div class="honeypot-field" style="display:none !important;">';
        echo '<input type="text" name="website" value="" autocomplete="off">';
        echo '</div>';
    }

    /**
     * Validate form submission
     */
    function pet_validate_form_submission($data)
    {
        // Verify nonce
        if (!isset($_POST['form_nonce']) || !wp_verify_nonce($_POST['form_nonce'], 'pet_form_nonce')) {
            return new WP_Error('invalid_nonce', 'Помилка перевірки безпеки');
        }

        // Check honeypot
        if (!empty($_POST['website'])) {
            return new WP_Error('spam_detected', 'Виявлено спам');
        }

        // Validate required fields
        $required_fields = array('name', 'email', 'phone');
        foreach ($required_fields as $field) {
            if (empty($data[$field])) {
                return new WP_Error('missing_field', sprintf('Поле %s є обов\'язковим', $field));
            }
        }

        // Validate email
        if (!is_email($data['email'])) {
            return new WP_Error('invalid_email', 'Невірний формат email');
        }

        // Validate phone (Ukrainian format)
        if (!preg_match('/^\+?3?8?(0\d{9})$/', $data['phone'])) {
            return new WP_Error('invalid_phone', 'Невірний формат телефону');
        }

        return true;
    }

    /**
     * Handle adoption form submission
     */
    function pet_handle_adoption_form()
    {
        check_ajax_referer('pet_form_nonce', 'form_nonce');

        $data = array(
            'name' => sanitize_text_field($_POST['name']),
            'email' => sanitize_email($_POST['email']),
            'phone' => sanitize_text_field($_POST['phone']),
            'message' => sanitize_textarea_field($_POST['message']),
            'animal_id' => intval($_POST['animal_id'])
        );

        // Create adoption post
        $post_id = wp_insert_post(array(
            'post_title' => sprintf('Заявка на %s від %s', get_the_title($data['animal_id']), $data['name']),
            'post_type' => 'adoption',
            'post_status' => 'publish'
        ));

        if (is_wp_error($post_id)) {
            wp_send_json_error(array('message' => 'Помилка створення заявки'));
            return;
        }

        // Save meta data
        update_post_meta($post_id, 'adoption_animal', $data['animal_id']);
        update_post_meta($post_id, 'adoption_name', $data['name']);
        update_post_meta($post_id, 'adoption_phone', $data['phone']);
        update_post_meta($post_id, 'adoption_email', $data['email']);
        update_post_meta($post_id, 'adoption_message', $data['message']);
        update_post_meta($post_id, 'adoption_status', 'new');

        // Send notification email
        $admin_email = get_option('admin_email');
        $subject = sprintf('Нова заявка на прихисток: %s', get_the_title($data['animal_id']));
        $message = sprintf(
            "Нова заявка на прихисток:\n\nТварина: %s\nІм'я: %s\nТелефон: %s\nEmail: %s\n\nПовідомлення:\n%s",
            get_the_title($data['animal_id']),
            $data['name'],
            $data['phone'],
            $data['email'],
            $data['message']
        );

        wp_mail($admin_email, $subject, $message);

        wp_send_json_success(array('message' => 'Заявку успішно відправлено'));
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

    function pet_enqueue_share_scripts()
    {
        if (is_page_template('page-templates/page-share-info.php')) {
            wp_enqueue_script('pet-share-stories', get_template_directory_uri() . '/assets/js/share-stories.js', array('jquery'), '1.0.0', true);
        }
    }
    add_action('wp_enqueue_scripts', 'pet_enqueue_share_scripts');

    function pet_handle_volunteer_application()
    {
        // Verify nonce
        check_ajax_referer('volunteer_nonce', 'security');

        // Get and sanitize form data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $experience = sanitize_textarea_field($_POST['experience']);
        $availability = sanitize_text_field($_POST['availability']);

        // Validate required fields
        if (empty($name) || empty($email) || empty($phone) || empty($experience) || empty($availability)) {
            wp_send_json_error(array('message' => 'Всі поля є обов\'язковими'));
            return;
        }

        // Create post
        $post_data = array(
            'post_title'    => wp_strip_all_tags($name),
            'post_type'     => 'volunteer_app',
            'post_status'   => 'publish'
        );

        $post_id = wp_insert_post($post_data);

        if (!is_wp_error($post_id)) {
            // Save meta data
            update_post_meta($post_id, 'volunteer_name', $name);
            update_post_meta($post_id, 'volunteer_email', $email);
            update_post_meta($post_id, 'volunteer_phone', $phone);
            update_post_meta($post_id, 'volunteer_experience', $experience);
            update_post_meta($post_id, 'volunteer_availability', $availability);

            // Send email notification
            $to = get_option('admin_email');
            $subject = sprintf('Нова заявка на волонтерство від %s', $name);
            $message = sprintf(
                "Нова заявка на волонтерство:\n\nІм'я: %s\nEmail: %s\nТелефон: %s\nДоступність: %s\n\nДосвід:\n%s",
                $name,
                $email,
                $phone,
                $availability,
                $experience
            );

            wp_mail($to, $subject, $message);

            wp_send_json_success(array(
                'message' => 'Заявку успішно відправлено'
            ));
        } else {
            wp_send_json_error(array(
                'message' => 'Помилка створення заявки'
            ));
        }

        wp_die();
    }
    add_action('wp_ajax_pet_volunteer_application', 'pet_handle_volunteer_application');
    add_action('wp_ajax_nopriv_pet_volunteer_application', 'pet_handle_volunteer_application');



    /**
     * Enqueue volunteer form script
     */
    function pet_enqueue_volunteer_scripts()
    {
        if (is_page_template('page-templates/page-volunteer-guide.php')) {
            wp_enqueue_script('pet-volunteer-form', get_template_directory_uri() . '/assets/js/volunteer-form.js', array('jquery'), '1.0.0', true);
            wp_localize_script('pet-volunteer-form', 'volunteerData', array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('volunteer_nonce')
            ));
        }
    }
    add_action('wp_enqueue_scripts', 'pet_enqueue_volunteer_scripts');



    /**
     * Handle contact form submission
     */
    function pet_handle_contact_form()
    {
        // Verify nonce
        if (!check_ajax_referer('pet_contact_nonce', 'security', false)) {
            wp_send_json_error(array('message' => 'Помилка перевірки безпеки'));
            return;
        }

        // Validate required fields
        $required_fields = array('name', 'email', 'subject', 'message');
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                wp_send_json_error(array('message' => 'Усі поля є обов\'язковими'));
                return;
            }
        }

        // Sanitize input data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        // Create post data
        $post_data = array(
            'post_title'    => wp_strip_all_tags($name),
            'post_content'  => $message,
            'post_status'   => 'publish',
            'post_type'     => 'contact_submission'
        );

        // Insert the post into the database
        $post_id = wp_insert_post($post_data);

        if (!is_wp_error($post_id)) {
            // Save additional meta data
            update_post_meta($post_id, 'contact_email', $email);
            update_post_meta($post_id, 'contact_subject', $subject);

            // Send email notification
            $to = get_option('admin_email');
            $email_subject = 'Нове повідомлення з контактної форми';
            $email_message = sprintf(
                "Нове повідомлення з контактної форми:\n\nІм'я: %s\nEmail: %s\nТема: %s\n\nПовідомлення:\n%s",
                $name,
                $email,
                $subject,
                $message
            );

            wp_mail($to, $email_subject, $email_message);

            wp_send_json_success(array('message' => 'Повідомлення успішно надіслано'));
        } else {
            wp_send_json_error(array('message' => 'Помилка збереження повідомлення'));
        }
    }
    add_action('wp_ajax_pet_contact_form', 'pet_handle_contact_form');
    add_action('wp_ajax_nopriv_pet_contact_form', 'pet_handle_contact_form');

    function pet_enqueue_contact_scripts()
    {
        if (is_page_template('page-contact.php')) {
            wp_enqueue_script('pet-contact', get_template_directory_uri() . '/assets/js/contact.js', array('jquery'), '1.0.1', true);
            wp_localize_script('pet-contact', 'contactData', array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('pet_contact_nonce')
            ));
        }
    }
    add_action('wp_enqueue_scripts', 'pet_enqueue_contact_scripts');

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Налаштування сайту',
            'menu_title' => 'Налаштування сайту',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }





    /**
     * Remove related products from the sidebar
     */
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    /**
     * Move related products to the bottom
     */
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 20);

    /**
     * Customize related products count and columns
     */
    function pet_related_products_args($args)
    {
        $args['posts_per_page'] = 3; // Number of related products
        $args['columns'] = 3; // Number of columns
        return $args;
    }
    add_filter('woocommerce_output_related_products_args', 'pet_related_products_args');

    /**
     * Modify related products heading
     */
    function pet_change_related_products_title()
    {
        return 'Супутні товари';
    }
    add_filter('woocommerce_product_related_products_heading', 'pet_change_related_products_title');





    /**
     * Підключення функціоналу "Поділитися" з покращеним відстеженням помилок
     * Додайте цей код у файл functions.php вашої теми
     */
    function pet_enqueue_share_functionality()
    {
        // Перевіряємо, чи знаходимось на сторінці тварини
        if (is_singular('animal')) {
            // Підключаємо jQuery, якщо ще не підключено
            wp_enqueue_script('jquery');

            // Підключаємо JavaScript файл
            wp_enqueue_script(
                'pet-share-script',
                get_template_directory_uri() . '/assets/js/share.js',
                array('jquery'),
                filemtime(get_template_directory() . '/assets/js/share.js'), // Для запобігання кешування при змінах
                true
            );

            // Підключаємо локалізацію для перекладу
            wp_localize_script('pet-share-script', 'petShareData', array(
                'copySuccess' => __('Посилання скопійовано!', 'pet'),
                'copyFail' => __('Не вдалося скопіювати посилання. Спробуйте ще раз.', 'pet'),
                'ajaxurl' => admin_url('admin-ajax.php')
            ));

            // Підключаємо стилі для повідомлення
            wp_add_inline_style('pet-main-style', '
            .share-notification {
                position: fixed;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border-radius: 4px;
                z-index: 9999;
                display: none;
                font-size: 14px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.2);
                text-align: center;
                min-width: 200px;
            }
        ');
        }
    }
    add_action('wp_enqueue_scripts', 'pet_enqueue_share_functionality');

    /**
     * AJAX обробник для реєстрації помилок копіювання (опціонально для діагностики)
     */
    function pet_log_copy_error()
    {
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'pet_copy_nonce')) {
            wp_send_json_error('Invalid nonce');
            exit;
        }

        $error = isset($_POST['error']) ? sanitize_text_field($_POST['error']) : 'Unknown error';
        $browser = isset($_POST['browser']) ? sanitize_text_field($_POST['browser']) : 'Unknown browser';

        // Тут можна логувати помилки для аналізу
        error_log("Copy error: {$error} in {$browser}");

        wp_send_json_success('Error logged');
    }
    add_action('wp_ajax_pet_log_copy_error', 'pet_log_copy_error');
    add_action('wp_ajax_nopriv_pet_log_copy_error', 'pet_log_copy_error');





    // Додавання JavaScript і CSS для функціоналу поширення
    function pet_share_enqueue_scripts()
    {
        if (is_page_template('page-share-info.php')) {
            // Реєстрація і підключення JavaScript
            wp_enqueue_script('share-stories', get_template_directory_uri() . '/assets/js/share-stories.js', array(), '1.0.0', true);

            // Реєстрація і підключення CSS
            wp_enqueue_style('share-modal', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

            // Додавання змінних для JavaScript
            $success_stories_page = get_page_by_path('success-stories'); // Змініть на свій slug сторінки
            $success_stories_url = $success_stories_page ? get_permalink($success_stories_page) : home_url();

            wp_localize_script('share-stories', 'petShareData', array(
                'successStoriesUrl' => $success_stories_url,
                'siteUrl' => site_url(),
                'homeUrl' => home_url()
            ));
        }
    }
    add_action('wp_enqueue_scripts', 'pet_share_enqueue_scripts');

    /**
     * Функція для отримання URL сторінки історій успіху
     *
     * @return string URL сторінки історій успіху
     */
    function pet_get_success_stories_url()
    {
        // Спочатку спробуємо знайти за slug'ом
        $success_stories_page = get_page_by_path('success-stories'); // Змініть на свій slug

        // Якщо не знайдено, спробуємо знайти за шаблоном
        if (!$success_stories_page) {
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-success-stories.php'
            ));

            if (!empty($pages)) {
                $success_stories_page = $pages[0];
            }
        }

        // Повертаємо URL сторінки або домашньої сторінки, якщо не знайдено
        return $success_stories_page ? get_permalink($success_stories_page) : home_url();
    }
