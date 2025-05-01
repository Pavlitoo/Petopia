<?php

/**
 * Template part for displaying results in search pages
 *
 * @package Pet
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php
                    pet_posted_on();
                    pet_posted_by();
                    ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>

        <footer class="entry-footer">
            <?php if ('post' === get_post_type()) : ?>
                <?php
                $categories_list = get_the_category_list(esc_html__(', ', 'pet'));
                if ($categories_list) {
                    printf('<span class="cat-links">%s</span>', $categories_list);
                }

                $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'pet'));
                if ($tags_list) {
                    printf('<span class="tags-links">%s</span>', $tags_list);
                }
                ?>
            <?php endif; ?>

            <?php if (get_edit_post_link()) : ?>
                <?php
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
                ?>
            <?php endif; ?>
        </footer>
    </div>
</article>