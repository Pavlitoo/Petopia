<?php

/**
 * Шаблон для показу окремої тварини
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('animal-single'); ?>>
                <div class="animal-single-header">
                    <h1 class="animal-single-title"><?php the_title(); ?></h1>

                    <div class="animal-single-meta">
                        <?php if (get_post_meta(get_the_ID(), 'animal_age', true)) : ?>
                            <span class="animal-meta-item">
                                <strong><?php _e('Вік:', 'petopia'); ?></strong>
                                <?php echo get_post_meta(get_the_ID(), 'animal_age', true); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (get_post_meta(get_the_ID(), 'animal_breed', true)) : ?>
                            <span class="animal-meta-item">
                                <strong><?php _e('Порода:', 'petopia'); ?></strong>
                                <?php echo get_post_meta(get_the_ID(), 'animal_breed', true); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (get_post_meta(get_the_ID(), 'animal_gender', true)) : ?>
                            <span class="animal-meta-item">
                                <strong><?php _e('Стать:', 'petopia'); ?></strong>
                                <?php echo get_post_meta(get_the_ID(), 'animal_gender', true); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (get_post_meta(get_the_ID(), 'animal_size', true)) : ?>
                            <span class="animal-meta-item">
                                <strong><?php _e('Розмір:', 'petopia'); ?></strong>
                                <?php echo get_post_meta(get_the_ID(), 'animal_size', true); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="animal-single-content">
                    <div class="animal-single-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php endif; ?>
                    </div>

                    <div class="animal-single-description">
                        <h2><?php _e('Про тварину', 'petopia'); ?></h2>
                        <?php the_content(); ?>

                        <?php if (get_post_meta(get_the_ID(), 'animal_personality', true)) : ?>
                            <div class="animal-personality">
                                <h3><?php _e('Характер', 'petopia'); ?></h3>
                                <p><?php echo get_post_meta(get_the_ID(), 'animal_personality', true); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (get_post_meta(get_the_ID(), 'animal_health', true)) : ?>
                            <div class="animal-health">
                                <h3><?php _e('Здоров\'я', 'petopia'); ?></h3>
                                <p><?php echo get_post_meta(get_the_ID(), 'animal_health', true); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="animal-single-adoption">
                    <h2><?php _e('Хочете прихистити цю тварину?', 'petopia'); ?></h2>
                    <p><?php _e('Заповніть форму нижче, щоб зв\'язатися з нами щодо цієї тварини.', 'petopia'); ?></p>

                    <div class="adoption-contact">
                        <!-- Тут можна додати форму контакту або контактні дані -->
                        <a href="<?php echo get_permalink(get_page_by_path('adoption')); ?>" class="btn btn-primary"><?php _e('Подати заявку на усиновлення', 'petopia'); ?></a>

                        <div class="contact-info">
                            <p><?php _e('Або зателефонуйте нам: ', 'petopia'); ?> <strong>+38 (044) 123-45-67</strong></p>
                        </div>
                    </div>
                </div>

                <div class="animal-single-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '&larr; ' . __('Попередня тварина', 'petopia')); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', __('Наступна тварина', 'petopia') . ' &rarr;'); ?>
                    </div>
                </div>
            </article>

        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
?>