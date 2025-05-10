<?php

/**
 * The template for displaying the footer
 *
 * @package Pet
 */
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-about">
                <div class="footer-logo">Petopia</div>
                <p class="footer-text"><?php echo esc_html__('Притулок для тварин, де кожен хвостик знаходить свій дім', 'pet'); ?></p>
            </div>

            <div class="footer-links">
                <h3 class="footer-title"><?php echo esc_html__('Швидкі посилання', 'pet'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_1',
                    'container' => false,
                    'menu_class' => 'footer-menu',
                    'fallback_cb' => function () {
                        echo '<ul class="footer-menu">
                            <li><a href="' . esc_url(home_url('/')) . '">Головна</a></li>
                            <li><a href="' . esc_url(home_url('/animals')) . '">Наші тварини</a></li>
                            <li><a href="' . esc_url(home_url('/about')) . '">Про нас</a></li>
                            <li><a href="' . esc_url(home_url('/help')) . '">Допомогти</a></li>
                        </ul>';
                    }
                ));
                ?>
            </div>

            <div class="footer-links">
                <h3 class="footer-title"><?php echo esc_html__('Інформація', 'pet'); ?></h3>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/info/adoption-rules')); ?>">Правила всиновлення</a></li>
                    <li><a href="<?php echo esc_url(home_url('/info/volunteer-guide')); ?>">Гайд для волонтерів</a></li>
                    <li><a href="<?php echo esc_url(home_url('/info/donation-usage')); ?>">Використання пожертв</a></li>
                    <li><a href="<?php echo esc_url(home_url('/info/success-stories')); ?>">Історії успіху</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h3 class="footer-title"><?php echo esc_html__('Графік роботи', 'pet'); ?></h3>
                <ul class="footer-menu">
                    <li>Пн-Пт: 9:00 - 18:00</li>
                    <li>Сб: 10:00 - 16:00</li>
                    <li>Нд: 10:00 - 15:00</li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> Petopia. <?php echo esc_html__('Всі права захищені', 'pet'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>