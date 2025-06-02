<?php

/**
 * Template Name: Сертифікат
 * @package Pet
 */

// Redirect non-logged in users
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

// Get current user info
$current_user = wp_get_current_user();
$current_date = date_i18n('d.m.Y');

// Check if user has made contributions
$has_donations = false;
$has_volunteering = false;
$has_adoptions = false;
$total_points = 0;

// Check donations (using WooCommerce orders)
$customer_orders = wc_get_orders(array(
    'customer' => $current_user->ID,
    'status' => 'completed'
));
if (!empty($customer_orders)) {
    $has_donations = true;
}

// Check volunteer applications
$volunteer_applications = get_posts(array(
    'post_type' => 'volunteer_app',
    'author' => $current_user->ID,
    'post_status' => 'publish'
));
if (!empty($volunteer_applications)) {
    $has_volunteering = true;
}

// Check adoptions
$adoptions = get_posts(array(
    'post_type' => 'adoption',
    'author' => $current_user->ID,
    'post_status' => 'publish'
));
if (!empty($adoptions)) {
    $has_adoptions = true;
}

// Get user's points
$total_points = intval(get_user_meta($current_user->ID, 'bonus_points', true));

// Check if user qualifies for certificate
$can_generate_certificate = $has_donations || $has_volunteering || $has_adoptions || $total_points >= 100;

get_header();
?>

<main id="primary" class="site-main certificate-page">
    <div class="container">
        <?php if ($can_generate_certificate) : ?>
            <div class="certificate-wrapper">
                <!-- Name Input Form -->
                <div class="name-input-section">
                    <label for="certificate-name"><?php echo esc_html__('Введіть ваше повне ім\'я для сертифікату:', 'pet'); ?></label>
                    <input type="text"
                        id="certificate-name"
                        class="certificate-name-input"
                        value="<?php echo esc_attr($current_user->display_name); ?>"
                        placeholder="<?php echo esc_attr__('Введіть ваше повне ім\'я', 'pet'); ?>">
                </div>

                <!-- Certificate Preview -->
                <div id="certificate" class="certificate">
                    <div class="certificate-inner">
                        <div class="certificate-logo">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.jpg'); ?>" alt="Petopia Logo">
                        </div>
                        <h1 class="certificate-title">Сертифікат</h1>
                        <p class="certificate-text">Цей сертифікат підтверджує, що</p>
                        <p class="certificate-name" id="preview-name"><?php echo esc_html($current_user->display_name); ?></p>
                        <p class="certificate-description">є активним учасником підтримки притулку для тварин Petopia</p>
                        <div class="certificate-footer">
                            <div class="certificate-date">
                                <p>Дата: <?php echo esc_html($current_date); ?></p>
                            </div>
                            <div class="certificate-signature">
                                <p>Команда Petopia</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Download Button -->
                <div class="certificate-actions">
                    <button id="downloadCertificate" class="btn btn-primary">
                        <i class="fas fa-download"></i> Завантажити сертифікат
                    </button>
                </div>
            </div>
        <?php else : ?>
            <div class="certificate-unavailable">
                <h2><?php echo esc_html__('Сертифікат недоступний', 'pet'); ?></h2>
                <p><?php echo esc_html__('Щоб отримати сертифікат, виконайте одну з наступних умов:', 'pet'); ?></p>
                <ul>
                    <li><?php echo esc_html__('Зробіть пожертву для притулку', 'pet'); ?></li>
                    <li><?php echo esc_html__('Станьте волонтером', 'pet'); ?></li>
                    <li><?php echo esc_html__('Візьміть тварину з притулку', 'pet'); ?></li>
                    <li><?php echo esc_html__('Наберіть 100 бонусних балів', 'pet'); ?></li>
                </ul>
                <div class="certificate-cta">
                    <a href="<?php echo esc_url(home_url('/donate')); ?>" class="btn btn-primary">
                        <?php echo esc_html__('Допомогти притулку', 'pet'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Include html2canvas -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<?php get_footer(); ?>