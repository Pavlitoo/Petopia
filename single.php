<?php

/**
 * The template for displaying all single posts
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'single');

        // Previous/next post navigation
        $prev_post = get_previous_post();
        $next_post = get_next_post();

        if ($prev_post || $next_post) :
    ?>
            <div class="post-navigation">
                <div class="container">
                    <div class="nav-links">
                        <?php if ($prev_post) : ?>
                            <div class="nav-previous">
                                <span class="nav-subtitle"><?php esc_html_e('Попередній запис', 'pet'); ?></span>
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" rel="prev">
                                    <?php echo esc_html($prev_post->post_title); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($next_post) : ?>
                            <div class="nav-next">
                                <span class="nav-subtitle"><?php esc_html_e('Наступний запис', 'pet'); ?></span>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="next">
                                    <?php echo esc_html($next_post->post_title); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php endif;

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile;
    ?>
</main>

<?php
get_footer();
