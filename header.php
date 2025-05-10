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
                <div class="site-logo">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . esc_url(home_url('/')) . '">Petopia</a>';
                    }
                    ?>
                </div>

                <button class="mobile-menu-btn" aria-label="Меню">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="main-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'container' => false,
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>

    <div class="mobile-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'container' => false,
        ));
        ?>
    </div>
    <div class="mobile-menu-overlay"></div>