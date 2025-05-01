<?php

/**
 * Template part for displaying single posts
 *
 * @package Pet
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="container">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

            <div class="entry-meta">
                <?php
                pet_posted_on();
                pet_posted_by();
                ?>
            </div>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail">
            <div class="container">
                <?php the_post_thumbnail('full'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="entry-content">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        __('Читати далі<span class="screen-reader-text"> "%s"</span>', 'pet'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Сторінки:', 'pet'),
                'after'  => '</div>',
            ));
            ?>
        </div>

        <footer class="entry-footer">
            <?php
            $categories_list = get_the_category_list(esc_html__(', ', 'pet'));
            if ($categories_list) {
                printf('<span class="cat-links">%s</span>', $categories_list);
            }

            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'pet'));
            if ($tags_list) {
                printf('<span class="tags-links">%s</span>', $tags_list);
            }

            if (get_edit_post_link()) :
                edit_post_link(
                    sprintf(
                        wp_kses(
                            __('Редагувати <span class="screen-reader-text">%s</span>', 'pet'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            endif;
            ?>
        </footer>
    </div>
</article>