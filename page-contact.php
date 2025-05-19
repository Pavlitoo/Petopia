<?php

/**
 * Template Name: Контакти
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('contacts_header');
$contact_cards = get_field('contact_cards');
$map = get_field('map_section');
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($header['title']); ?></h1>
            <p class="page-description"><?php echo esc_html($header['description']); ?></p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="contact-inner">
                <div class="contact-info">
                    <h2 class="contact-title"><?php echo esc_html__('Як зв\'язатися з нами', 'pet'); ?></h2>
                    <p class="contact-description"><?php echo esc_html__('Маєте питання або хочете детальніше дізнатися про наших підопічних? Зв\'яжіться з нами будь-яким зручним способом.', 'pet'); ?></p>

                    <?php if ($contact_cards): ?>
                        <div class="contact-cards">
                            <?php foreach ($contact_cards as $card): ?>
                                <div class="contact-card">
                                    <div class="card-icon">
                                        <i class="<?php echo esc_attr($card['icon']); ?>"></i>
                                    </div>
                                    <div class="card-content">
                                        <h4><?php echo esc_html($card['title']); ?></h4>
                                        <?php if ($card['link']): ?>
                                            <p><a href="<?php echo esc_url($card['link']); ?>"><?php echo esc_html($card['content']); ?></a></p>
                                        <?php else: ?>
                                            <p><?php echo esc_html($card['content']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="social-links">
                        <?php
                        $social_links = get_field('social_links', 'option');
                        if ($social_links):
                            foreach ($social_links as $social): ?>
                                <a href="<?php echo esc_url($social['url']); ?>" class="social-link" aria-label="<?php echo esc_attr($social['name']); ?>">
                                    <i class="<?php echo esc_attr($social['icon']); ?>"></i>
                                </a>
                        <?php endforeach;
                        endif; ?>
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

    <?php if ($map && $map['iframe']): ?>
        <section class="map-section">
            <div class="container">
                <div class="map-wrapper">
                    <?php echo $map['iframe']; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
