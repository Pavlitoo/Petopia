<?php

/**
 * Template Name: Поширення інформації
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Поширення інформації', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Допоможіть нашим хвостикам знайти дім через соціальні мережі', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="share-options">
                <div class="share-option">
                    <h2><?php echo esc_html__('Соціальні мережі', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Підписуйтесь на наші сторінки та діліться постами:', 'pet'); ?></p>
                    <div class="social-links">
                        <a href="https://facebook.com/petopia" class="social-link" target="_blank">
                            <i class="fab fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="https://instagram.com/petopia" class="social-link" target="_blank">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="https://twitter.com/petopia" class="social-link" target="_blank">
                            <i class="fab fa-twitter"></i>
                            <span>Twitter</span>
                        </a>
                    </div>
                </div>

                <div class="share-materials">
                    <h2><?php echo esc_html__('Інформаційні матеріали', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Завантажте та поширюйте наші інформаційні матеріали:', 'pet'); ?></p>
                    <div class="materials-grid">
                        <a href="#" class="material-item">
                            <i class="fas fa-file-pdf"></i>
                            <span>Презентація притулку</span>
                        </a>
                        <a href="#" class="material-item">
                            <i class="fas fa-image"></i>
                            <span>Банери для соцмереж</span>
                        </a>
                        <a href="#" class="material-item">
                            <i class="fas fa-file-alt"></i>
                            <span>Історії тварин</span>
                        </a>
                    </div>
                </div>

                <div class="share-tips">
                    <h2><?php echo esc_html__('Як ефективно поширювати інформацію', 'pet'); ?></h2>
                    <ul class="tips-list">
                        <li>Діліться постами у своїх соціальних мережах</li>
                        <li>Використовуйте хештеги #Petopia #ДругДляДому</li>
                        <li>Розказуйте про нас друзям та знайомим</li>
                        <li>Беріть участь у наших онлайн-акціях</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>