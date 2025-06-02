<?php

/**
 * The template for displaying the footer
 *
 * @package Pet
 */
?>

<footer class="site-footer">
    <div class="container">
        <!-- Logo та основна інформація -->
        <div class="footer-top">
            <div class="footer-about">
                <div class="footer-logo">
                    <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link">
                            <span class="custom-logo-text">Petopia</span>
                        </a>
                    <?php endif; ?>
                </div>
                <p class="footer-text"><?php echo esc_html__('Притулок для тварин, де кожен хвостик знаходить свій дім', 'pet'); ?></p>

                <!-- Соціальні мережі -->
                <div class="footer-social">
                    <a href="#" aria-label="Facebook" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/petopia.ua/" aria-label="Instagram" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Telegram" class="social-icon telegram"><i class="fab fa-telegram"></i></a>
                    <a href="#" aria-label="YouTube" class="social-icon youtube"><i class="fab fa-youtube"></i></a>
                </div>

                <!-- Контактна інформація -->
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html__('вул. Юліана Матвійчука, 83а Полтава, 36000', 'pet'); ?></p>
                    <p><i class="fas fa-phone"></i> <a href="tel:+380 99 707 1385">+380 99 707 1385</a></p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:pasalugovij@gmail.com">pasalugovij@gmail.com</a></p>
                </div>
            </div>

            <!-- Колонки з посиланнями -->
            <div class="footer-links-wrapper">
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
                        <li><a href="<?php echo esc_url(home_url('/adoption-rules')); ?>"><?php echo esc_html__('Правила всиновлення', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/volunteer-guide')); ?>"><?php echo esc_html__('Гайд для волонтерів', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/donation-usage')); ?>"><?php echo esc_html__('Використання пожертв', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/success-stories')); ?>"><?php echo esc_html__('Історії успіху', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/material-needs')); ?>"><?php echo esc_html__('Матеріальні потреби', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/share-info')); ?>"><?php echo esc_html__('Поширення інформації', 'pet'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/faq')); ?>"><?php echo esc_html__('Питання та відповіді', 'pet'); ?></a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h3 class="footer-title"><?php echo esc_html__('Графік роботи', 'pet'); ?></h3>
                    <ul class="footer-hours">
                        <li><span class="day"><?php echo esc_html__('Пн-Пт:', 'pet'); ?></span> <span class="hours">9:00 - 18:00</span></li>
                        <li><span class="day"><?php echo esc_html__('Сб:', 'pet'); ?></span> <span class="hours">10:00 - 16:00</span></li>
                        <li><span class="day"><?php echo esc_html__('Нд:', 'pet'); ?></span> <span class="hours">10:00 - 15:00</span></li>
                    </ul>

                    <!-- Кнопка підтримки -->
                    <div class="footer-cta">
                        <a href="<?php echo esc_url(home_url('/donate')); ?>" class="support-button">
                            <?php echo esc_html__('Підтримати притулок', 'pet'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Підпис та законні посилання -->
        <div class="footer-bottom">
            <!-- Copyright та додаткові посилання -->
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> Petopia. <?php echo esc_html__('Всі права захищені', 'pet'); ?></p>
                <div class="footer-legal">
                    <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php echo esc_html__('Політика конфіденційності', 'pet'); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>



</body>

</html>