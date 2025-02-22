<?php
/**
 * Header template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-wrapper">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1 class="site-title"><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
                }
                ?>
            </div>

            <nav class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container_class' => 'primary-menu-container'
                ));
                ?>
            </nav>

            <div class="user-section">
                <?php if (is_user_logged_in()) : ?>
                    <div class="user-coins">
                        <?php 
                        $user_id = get_current_user_id();
                        $coins = get_user_meta($user_id, 'rescue_coins', true) ?: 0;
                        ?>
                        <span class="coin-amount"><?php echo esc_html($coins); ?> монет</span>
                    </div>
                    <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="logout-link">Вийти</a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>" class="login-link">Увійти</a>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>" class="register-link">Зареєструватися</a>
                <?php endif; ?>
            </div>
        </div>
    </header>