<?php

/**
 * The template for displaying the footer
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="footer-widget">
                <div class="footer-logo">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else :
                    ?>
                        <h2 class="footer-site-title"><?php bloginfo('name'); ?></h2>
                    <?php endif; ?>
                </div>
                <div class="footer-description">
                    <?php echo get_bloginfo('description'); ?>
                </div>
            </div>

            <div class="footer-widget">
                <h3><?php _e('Швидкі посилання', 'petopia'); ?></h3>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                    )
                );
                ?>
            </div>

            <div class="footer-widget">
                <h3><?php _e('Контакти', 'petopia'); ?></h3>
                <address class="footer-address">
                    <?php if (function_exists('get_field') && get_field('address', 'option')) : ?>
                        <p><?php echo get_field('address', 'option'); ?></p>
                    <?php else : ?>
                        <p>вул. Прикладна, 123<br>м. Київ, 01234</p>
                    <?php endif; ?>

                    <?php if (function_exists('get_field') && get_field('phone', 'option')) : ?>
                        <p><?php _e('Телефон:', 'petopia'); ?> <a href="tel:<?php echo get_field('phone', 'option'); ?>"><?php echo get_field('phone', 'option'); ?></a></p>
                    <?php else : ?>
                        <p><?php _e('Телефон:', 'petopia'); ?> <a href="tel:+380441234567">+38 (044) 123-45-67</a></p>
                    <?php endif; ?>

                    <?php if (function_exists('get_field') && get_field('email', 'option')) : ?>
                        <p><?php _e('Email:', 'petopia'); ?> <a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a></p>
                    <?php else : ?>
                        <p><?php _e('Email:', 'petopia'); ?> <a href="mailto:info@petopia.example.com">info@petopia.example.com</a></p>
                    <?php endif; ?>
                </address>
            </div>

            <div class="footer-widget">
                <div class="footer-logo">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else :
                    ?>
                        <h2 class="footer-site-title"><?php bloginfo('name'); ?></h2>
                    <?php endif; ?>
                </div>
                <div class="footer-description">
                    <p>Притулок для тварин "Petopia" — це місце, де втрачені душі знаходять другий шанс на щасливе життя. Ми працюємо з 2015 року, надаючи допомогу та притулок тваринам, які цього потребують.</p>
                    <p><strong>Години роботи:</strong><br>
                        Пн-Пт: 10:00 - 18:00<br>
                        Сб-Нд: 10:00 - 16:00</p>
                </div>
            </div>
        </div>

        <div class="footer-social">
            <h3><?php _e('Слідкуйте за нами', 'petopia'); ?></h3>
            <div class="social-icons">
                <a href="#" class="social-icon facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon youtube" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Усі права захищено.', 'petopia'); ?></p>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>