<?php

/**
 * The template for displaying all pages
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="page-header">
                <div class="container">
                    <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                </div>
            </header>

            <div class="container">
                <div class="page-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Сторінки:', 'pet'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <?php if (comments_open() || get_comments_number()) :
                    comments_template();
                endif; ?>
            </div>
        </article>

    <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
