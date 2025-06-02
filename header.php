<?php

/**
 * The header for our theme
 *
 * @package Pet
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-content">
            <div class="paw-print-loader"></div>
            <p>Завантаження...</p>
        </div>
    </div>

    <header class="site-header">
        <div class="container">
            <div class="header-inner">
                <div class="site-branding">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                        <span class="logo-text">Petopia</span>
                    </a>
                </div>

                <nav class="main-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'container' => false,
                    ));
                    ?>
                </nav>

                <div class="header-actions">
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="account-link">
                        <i class="fas fa-user"></i>
                    </a>

                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                </div>

                <button class="mobile-menu-btn" aria-label="Відкрити меню" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <div class="mobile-menu">
        <div class="mobile-menu-content">
            <button class="mobile-menu-close" aria-label="Закрити меню">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'mobile-nav-menu',
                'container' => false,
            ));
            ?>
        </div>

        <div class="mobile-menu-footer">
            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="mobile-action-link">
                <i class="fas fa-user"></i>
                <span>Особистий кабінет</span>
            </a>
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="mobile-action-link">
                <i class="fas fa-shopping-cart"></i>
                <span>Кошик</span>
                <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
                    <span class="mobile-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>