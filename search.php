<?php

/**
 * The template for displaying search results pages
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('Результати пошуку для: %s', 'pet'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </div>
    </section>

    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="search-results">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'search');
                endwhile;

                the_posts_pagination(array(
                    'prev_text' => __('← Попередня', 'pet'),
                    'next_text' => __('Наступна →', 'pet'),
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="no-results">
                <h2><?php esc_html_e('Нічого не знайдено', 'pet'); ?></h2>
                <p><?php esc_html_e('На жаль, за вашим запитом нічого не знайдено. Спробуйте інші ключові слова.', 'pet'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
