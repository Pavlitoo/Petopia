<?php

/**
 * The template for displaying the front page
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- Hero Section / Слайдер -->
        <section class="hero-slider">
            <div class="container">
                <div class="slider-container">
                    <!-- Тут буде код для слайдера, можна підключити через ACF або власний код -->
                    <?php if (function_exists('get_field') && have_rows('slider_images')) : ?>
                        <div class="slider">
                            <?php while (have_rows('slider_images')) : the_row(); ?>
                                <div class="slide">
                                    <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('title'); ?>">
                                    <div class="slide-content">
                                        <h2><?php echo get_sub_field('title'); ?></h2>
                                        <p><?php echo get_sub_field('description'); ?></p>
                                        <?php if (get_sub_field('button_link')) : ?>
                                            <a href="<?php echo get_sub_field('button_link'); ?>" class="btn"><?php echo get_sub_field('button_text'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <!-- Запасний варіант, якщо ACF не доступний -->
                        <div class="slider">
                            <div class="slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide1.png" alt="Допоможіть тваринам">
                                <div class="slide-content">
                                    <h2>Подаруйте дім тим, хто цього потребує</h2>
                                    <p>У нашому притулку багато тварин чекають на свою родину</p>
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('adoption'))); ?>" class="btn">Взяти тварину</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Про наш притулок', 'petopia'); ?></h2>
                </div>
                <div class="about-content">
                    <?php
                    // Отримуємо вміст сторінки "Про нас" для відображення короткої інформації
                    $about_page = get_page_by_path('about');
                    if ($about_page) :
                        $about_content = apply_filters('the_content', $about_page->post_content);
                        echo wp_trim_words($about_content, 100, '...');
                    ?>
                        <a href="<?php echo get_permalink($about_page->ID); ?>" class="btn btn-secondary"><?php _e('Дізнатися більше', 'petopia'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Featured Animals -->
        <section class="featured-animals">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Тварини, які шукають дім', 'petopia'); ?></h2>
                </div>
                <div class="animals-grid">
                    <?php
                    $args = array(
                        'post_type' => 'animal',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $animals_query = new WP_Query($args);

                    if ($animals_query->have_posts()) :
                        while ($animals_query->have_posts()) : $animals_query->the_post();
                            get_template_part('template-parts/content/content', 'animal');
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <p><?php _e('Наразі немає тварин для відображення.', 'petopia'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="section-footer">
                    <a href="<?php echo get_post_type_archive_link('animal'); ?>" class="btn btn-primary"><?php _e('Переглянути всіх тварин', 'petopia'); ?></a>
                </div>
            </div>
        </section>

        <!-- Latest News -->
        <section class="latest-news">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Останні новини', 'petopia'); ?></h2>
                </div>
                <div class="news-grid">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                    );
                    $news_query = new WP_Query($args);

                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) : $news_query->the_post();
                            get_template_part('template-parts/content/content', 'post');
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <p><?php _e('Наразі немає новин для відображення.', 'petopia'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="section-footer">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-secondary"><?php _e('Усі новини', 'petopia'); ?></a>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2><?php _e('Допоможіть нам допомогти їм', 'petopia'); ?></h2>
                    <p><?php _e('Ваша підтримка має значення. Пожертвуйте, станьте волонтером або тимчасовим доглядачем уже сьогодні.', 'petopia'); ?></p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('help'))); ?>" class="btn btn-primary"><?php _e('Пожертвувати', 'petopia'); ?></a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('volunteer'))); ?>" class="btn btn-secondary"><?php _e('Стати волонтером', 'petopia'); ?></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-section">
            <div class="container">
                <div class="section-header fade-in">
                    <h2><?php _e('Про наш притулок', 'petopia'); ?></h2>
                </div>
                <div class="about-content fade-in">
                    <!-- Зміст -->
                </div>
            </div>
        </section>

        <div class="about-content fade-in">
            <p>Притулок для тварин "Petopia" — це місце, де загублені чи покинуті тварини знаходять турботу, безпеку і шанс на нове життя. З 2015 року ми врятували понад 2000 тварин, забезпечуючи їм медичну допомогу, харчування та, найголовніше, любов, яка їм так потрібна.</p>

            <p>Наша команда відданих ветеринарів, волонтерів та любителів тварин щодня працює над тим, щоб кожен наш вихованець отримав все необхідне для щасливого і здорового життя. Ми віримо, що кожна тварина заслуговує на другий шанс і докладаємо всіх зусиль, щоб знайти постійний дім для кожного нашого підопічного.</p>

            <div class="about-values">
                <div class="about-value-item fade-in">
                    <i class="fas fa-heart"></i>
                    <h3>Турбота</h3>
                    <p>Ми забезпечуємо найвищий рівень догляду для всіх тварин, незалежно від їхнього стану чи історії.</p>
                </div>

                <div class="about-value-item fade-in">
                    <i class="fas fa-home"></i>
                    <h3>Притулок</h3>
                    <p>Ми створюємо затишне та безпечне середовище для кожної тварини, яка потрапляє до нас.</p>
                </div>

                <div class="about-value-item fade-in">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Адопція</h3>
                    <p>Наша головна мета — знайти люблячий дім для кожного нашого підопічного.</p>
                </div>
            </div>

            <a href="<?php echo get_permalink($about_page->ID); ?>" class="btn btn-secondary"><?php _e('Дізнатися більше', 'petopia'); ?></a>
        </div>

        <!-- Statistics Section -->
        <section class="statistics-section">
            <div class="container">
                <div class="statistics-container">
                    <div class="statistic-item fade-in">
                        <div class="statistic-number" data-count="2357">0</div>
                        <div class="statistic-label"><?php _e('Врятованих тварин', 'petopia'); ?></div>
                    </div>

                    <div class="statistic-item fade-in">
                        <div class="statistic-number" data-count="1896">0</div>
                        <div class="statistic-label"><?php _e('Знайшли новий дім', 'petopia'); ?></div>
                    </div>

                    <div class="statistic-item fade-in">
                        <div class="statistic-number" data-count="142">0</div>
                        <div class="statistic-label"><?php _e('Активних волонтерів', 'petopia'); ?></div>
                    </div>

                    <div class="statistic-item fade-in">
                        <div class="statistic-number" data-count="8">0</div>
                        <div class="statistic-label"><?php _e('Років допомоги', 'petopia'); ?></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section">
            <div class="container">
                <div class="section-header fade-in">
                    <h2><?php _e('Відгуки', 'petopia'); ?></h2>
                </div>

                <div class="testimonials-slider fade-in">
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Ми взяли Бобика з притулку Petopia минулого року, і це було найкраще рішення в нашому житті! Він став справжнім членом нашої родини. Дякуємо команді притулку за те, що допомогли нам знайти нашого найкращого друга.</p>
                        </div>
                        <div class="testimonial-author">Олена і Михайло</div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Коли я вперше відвідала Petopia як волонтер, я була вражена тим, з якою любов'ю та турботою доглядають за тваринами. За 2 роки волонтерства я побачила сотні щасливих історій, коли тварини знаходили нові родини.</p>
                        </div>
                        <div class="testimonial-author">Анастасія, волонтер</div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Наша кішка Мурка була в жахливому стані, коли її привезли до притулку. Команда ветеринарів зробила неможливе, щоб повернути її до здорового життя. Я щасливий, що зміг подарувати їй новий дім!</p>
                        </div>
                        <div class="testimonial-author">Віктор</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="partners-section">
            <div class="container">
                <div class="section-header fade-in">
                    <h2><?php _e('Наші партнери', 'petopia'); ?></h2>
                </div>

                <div class="partners-grid fade-in">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-1.png" alt="Partner 1" class="partner-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-2.png" alt="Partner 2" class="partner-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-3.png" alt="Partner 3" class="partner-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-4.png" alt="Partner 4" class="partner-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-5.png" alt="Partner 5" class="partner-logo">
                </div>
            </div>
        </section>

        <section class="featured-animals fade-in">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Тварини, які шукають дім', 'petopia'); ?></h2>
                </div>
                <div class="animals-grid">
                    <!-- Тварини -->
                </div>
            </div>
        </section>

        <section class="latest-news fade-in">
            <div class="container">
                <div class="section-header">
                    <h2><?php _e('Останні новини', 'petopia'); ?></h2>
                </div>
                <div class="news-grid">
                    <!-- Новини -->
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>