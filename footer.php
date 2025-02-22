<?php
/**
 * Footer template
 */
?>
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-widgets">
                <div class="footer-widget contact-info">
                    <h3>Контакти</h3>
                    <p>Адреса: вул. Примірна, 123</p>
                    <p>Телефон: +380123456789</p>
                    <p>Email: info@pritulok.com</p>
                </div>

                <div class="footer-widget quick-links">
                    <h3>Швидкі посилання</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'container' => false
                    ));
                    ?>
                </div>

                <div class="footer-widget social-media">
                    <h3>Ми в соціальних мережах</h3>
                    <div class="social-links">
                        <a href="#" class="social-link facebook">Facebook</a>
                        <a href="#" class="social-link instagram">Instagram</a>
                        <a href="#" class="social-link telegram">Telegram</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="copyright">
                    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Всі права захищені.
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>