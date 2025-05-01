<?php

/**
 * The header for our theme
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
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else :
                    ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->

                <div class="header-cta">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('help'))); ?>" class="btn btn-primary"><?php _e('Допомогти', 'petopia'); ?></a>
                </div>
            </div>
        </header><!-- #masthead -->

        <div id="content" class="site-content">