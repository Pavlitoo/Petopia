<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Pet
 */
?>

<section class="no-results not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Нічого не знайдено', 'pet'); ?></h1>
        </header>

        <div class="page-content">
            <?php
            if (is_home() && current_user_can('publish_posts')) :
                printf(
                    '<p>' . wp_kses(
                        __('Готові опублікувати свій перший запис? <a href="%1$s">Почніть тут</a>.', 'pet'),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ) . '</p>',
                    esc_url(admin_url('post-new.php'))
                );
            elseif (is_search()) :
            ?>
                <p><?php esc_html_e('На жаль, за вашим пошуковим запитом нічого не знайдено. Спробуйте інші ключові слова.', 'pet'); ?></p>
            <?php
                get_search_form();
            else :
            ?>
                <p><?php esc_html_e('Здається, ми не можемо знайти те, що ви шукаєте. Можливо, пошук допоможе.', 'pet'); ?></p>
            <?php
                get_search_form();
            endif;
            ?>
        </div>
    </div>
</section>