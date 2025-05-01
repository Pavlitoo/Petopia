<?php

/**
 * Template Name: Контакти
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Контакти', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Зв\'яжіться з нами будь-яким зручним способом', 'pet'); ?></p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="contact-inner">
                <div class="contact-info">
                    <h2 class="contact-title"><?php echo esc_html__('Як зв\'язатися з нами', 'pet'); ?></h2>
                    <p class="contact-description"><?php echo esc_html__('Маєте питання або хочете детальніше дізнатися про наших підопічних? Зв\'яжіться з нами будь-яким зручним способом.', 'pet'); ?></p>

                    <div class="info-list">
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <div class="info-content">
                                <h4><?php echo esc_html__('Адреса', 'pet'); ?></h4>
                                <p>вул. Капуча 42, м. Київ, 03056</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📞</span>
                            <div class="info-content">
                                <h4><?php echo esc_html__('Телефон', 'pet'); ?></h4>
                                <p>+38 (044) 123-45-67</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">✉️</span>
                            <div class="info-content">
                                <h4><?php echo esc_html__('Email', 'pet'); ?></h4>
                                <p>info@petopia.org.ua</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/petopia.ua/?utm_source=ig_web_button_share_sheet" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <div class="form-card">
                        <h3><?php echo esc_html__('Надіслати повідомлення', 'pet'); ?></h3>
                        <form class="contact-form" action="#" method="post">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name"><?php echo esc_html__('Ваше ім\'я', 'pet'); ?></label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject"><?php echo esc_html__('Тема', 'pet'); ?></label>
                                <select id="subject" name="subject" required>
                                    <option value=""><?php echo esc_html__('Оберіть тему', 'pet'); ?></option>
                                    <option value="adoption"><?php echo esc_html__('Усиновлення', 'pet'); ?></option>
                                    <option value="volunteer"><?php echo esc_html__('Волонтерство', 'pet'); ?></option>
                                    <option value="donation"><?php echo esc_html__('Пожертва', 'pet'); ?></option>
                                    <option value="other"><?php echo esc_html__('Інше', 'pet'); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message"><?php echo esc_html__('Повідомлення', 'pet'); ?></label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo esc_html__('Надіслати', 'pet'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <div class="map-wrapper">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162757.72583917422!2d30.392608824587416!3d50.402033740964946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf4ee15a4505%3A0x764931d2170146fe!2z0JrQuNGX0LIsIDAyMDAw!5e0!3m2!1suk!2sua!4v1699887149070!5m2!1suk!2sua"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
