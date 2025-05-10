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

                    <div class="contact-cards">
                        <div class="contact-card">
                            <div class="card-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="card-content">
                                <h4>Адреса</h4>
                                <p>вул. Юліана Матвійчука, 83а<br>Полтава, 36000</p>
                            </div>
                        </div>

                        <div class="contact-card">
                            <div class="card-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="card-content">
                                <h4>Телефон</h4>
                                <p><a href="tel:+380997071385">+380 99 707 1385</a></p>
                            </div>
                        </div>

                        <div class="contact-card">
                            <div class="card-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="card-content">
                                <h4>Email</h4>
                                <p><a href="mailto:pasalugovij@gmail.com">pasalugovij@gmail.com</a></p>
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
                        <form class="contact-form" id="contact-form">
                            <?php wp_nonce_field('pet_contact_nonce', 'contact_nonce'); ?>
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2585.873711410291!2d34.52553807692385!3d49.59066667147435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d82f9d8f0a3aa7%3A0x5f5fc606b370c5b8!2z0LLRg9C70LjRhtGPINCu0LvRltCw0L3QsCDQnNCw0YLQstGW0LnRh9GD0LrQsCwgODPQsCwg0J_QvtC70YLQsNCy0LAsINCf0L7Qu9GC0LDQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCAzNjAwMA!5e0!3m2!1suk!2sua!4v1701799552815!5m2!1suk!2sua"
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
