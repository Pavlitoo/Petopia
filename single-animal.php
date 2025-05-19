<?php

/**
 * The template for displaying single animal posts
 * @package Pet
 */

get_header();

$tag_translations = array(
    'Терміново' => 'Терміново',
    'Особливі потреби' => 'Особливі потреби',
    'Старший вік' => 'Старший вік'
);
?>

<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('animal-single'); ?>>
        <div class="container">
            <div class="animal-single-inner">
                <div class="animal-single-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                    <?php
                    $tag = get_post_meta(get_the_ID(), 'animal_tag', true);
                    if ($tag && isset($tag_translations[$tag])) : ?>
                        <span class="animal-tag"><?php echo esc_html($tag_translations[$tag]); ?></span>
                    <?php endif; ?>
                </div>

                <div class="animal-single-content">
                    <h1 class="animal-single-title"><?php the_title(); ?></h1>

                    <?php
                    $animal_meta = pet_get_animal_meta();
                    if (!empty($animal_meta)) : ?>
                        <div class="animal-single-meta">
                            <?php if ($animal_meta['age']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Вік', 'pet'); ?>:</span>
                                    <span class="meta-value"><?php echo esc_html($animal_meta['age']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($animal_meta['gender']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Стать', 'pet'); ?>:</span>
                                    <span class="meta-value">
                                        <?php echo esc_html($animal_meta['gender'] === 'male' ? __('Хлопчик', 'pet') : __('Дівчинка', 'pet')); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <?php if ($animal_meta['breed']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Порода', 'pet'); ?>:</span>
                                    <span class="meta-value"><?php echo esc_html($animal_meta['breed']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($animal_meta['size']) : ?>
                                <div class="meta-item">
                                    <span class="meta-label"><?php echo esc_html__('Розмір', 'pet'); ?>:</span>
                                    <span class="meta-value"><?php echo esc_html($animal_meta['size']); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="animal-single-description">
                        <?php the_content(); ?>
                    </div>

                    <div class="animal-single-actions">
                        <button class="btn btn-primary" data-open-adoption-form>
                            <?php echo esc_html__('Прихистити', 'pet'); ?>
                        </button>
                        <a href="javascript:void(0);" class="btn btn-outline share-btn" onclick="copyCurrentUrl()">
                            <?php echo esc_html__('Поділитися', 'pet'); ?>
                        </a>
                    </div>

                    <!-- Додайте цей код перед закриваючим тегом </article> або </main> -->
                    <script>
                        function copyCurrentUrl() {
                            const pageUrl = window.location.href;

                            // Перевіряємо підтримку clipboard API
                            if (navigator.clipboard && window.isSecureContext) {
                                navigator.clipboard.writeText(pageUrl)
                                    .then(() => {
                                        showShareNotification('<?php echo esc_js(__('Посилання скопійовано!', 'pet')); ?>');
                                    })
                                    .catch((error) => {
                                        console.error('Copy failed:', error);
                                        fallbackCopyTextToClipboard(pageUrl);
                                    });
                            } else {
                                fallbackCopyTextToClipboard(pageUrl);
                            }
                        }

                        function fallbackCopyTextToClipboard(text) {
                            const textArea = document.createElement("textarea");
                            textArea.value = text;

                            // Make the textarea out of viewport
                            textArea.style.position = "fixed";
                            textArea.style.left = "-999999px";
                            textArea.style.top = "-999999px";
                            document.body.appendChild(textArea);
                            textArea.focus();
                            textArea.select();

                            try {
                                const successful = document.execCommand('copy');
                                const msg = successful ?
                                    '<?php echo esc_js(__('Посилання скопійовано!', 'pet')); ?>' :
                                    '<?php echo esc_js(__('Не вдалося скопіювати посилання. Спробуйте ще раз.', 'pet')); ?>';
                                showShareNotification(msg);
                            } catch (err) {
                                console.error('Copy failed:', err);
                                showShareNotification('<?php echo esc_js(__('Не вдалося скопіювати посилання. Спробуйте ще раз.', 'pet')); ?>');
                            }

                            document.body.removeChild(textArea);
                        }

                        function showShareNotification(message) {
                            // Перевіряємо чи існує вже повідомлення
                            let notification = document.querySelector('.share-notification');

                            // Якщо не існує, створюємо його
                            if (!notification) {
                                notification = document.createElement('div');
                                notification.className = 'share-notification';
                                document.body.appendChild(notification);

                                // Додаємо стилі, якщо вони ще не були додані
                                if (!document.querySelector('style#share-notification-style')) {
                                    const style = document.createElement('style');
                                    style.id = 'share-notification-style';
                                    style.textContent = `
                .share-notification {
                    position: fixed;
                    bottom: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border-radius: 4px;
                    z-index: 9999;
                    display: none;
                    font-size: 14px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
                    text-align: center;
                    min-width: 200px;
                }
            `;
                                    document.head.appendChild(style);
                                }
                            }

                            // Встановлюємо текст повідомлення
                            notification.textContent = message;

                            // Показуємо повідомлення
                            notification.style.display = 'block';

                            // Ховаємо повідомлення через 2 секунди
                            setTimeout(function() {
                                notification.style.display = 'none';
                            }, 2000);
                        }
                    </script>
                </div>
            </div>

            <!-- Adoption Form Modal -->
            <div id="adoption-modal" class="modal">
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h2><?php echo esc_html__('Заявка на прихисток', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Ви хочете прихистити', 'pet'); ?> <?php the_title(); ?></p>
                    <form id="adoption-form" class="adoption-form">
                        <input type="hidden" name="animal_id" value="<?php echo get_the_ID(); ?>">
                        <input type="hidden" name="action" value="pet_adoption_form">
                        <?php wp_nonce_field('pet_form_nonce', 'form_nonce'); ?>

                        <div class="form-group">
                            <label for="name"><?php echo esc_html__("Ваше ім'я", 'pet'); ?> *</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="phone"><?php echo esc_html__('Телефон', 'pet'); ?> *</label>
                            <input type="tel" id="phone" name="phone" required placeholder="+380XXXXXXXXX">
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="message"><?php echo esc_html__('Повідомлення', 'pet'); ?></label>
                            <textarea id="message" name="message" rows="4"></textarea>
                        </div>

                        <div class="honeypot-field" style="display:none !important;">
                            <input type="text" name="website" value="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <?php echo esc_html__('Відправити заявку', 'pet'); ?>
                        </button>
                    </form>
                </div>
            </div>

            <div class="animal-comments-container">
                <?php comments_template('/comments.php', true); ?>
            </div>

            <?php
            // Display related animals
            $args = array(
                'post_type' => 'animal',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand'
            );
            $related_animals = new WP_Query($args);

            if ($related_animals->have_posts()) : ?>
                <div class="related-animals">
                    <h2><?php echo esc_html__('Інші тварини', 'pet'); ?></h2>
                    <div class="animals-grid">
                        <?php while ($related_animals->have_posts()) : $related_animals->the_post(); ?>
                            <?php get_template_part('template-parts/content', 'animal'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>