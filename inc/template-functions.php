<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pet
 */

/**
 * Display animals
 *
 * @param int $count Number of animals to display
 */
function pet_display_animals($count = 6)
{
    $args = array(
        'post_type' => 'animal',
        'posts_per_page' => $count
    );

    $animals_query = new WP_Query($args);

    if ($animals_query->have_posts()) :
        echo '<div class="animals-grid">';
        while ($animals_query->have_posts()) :
            $animals_query->the_post();
            get_template_part('template-parts/content', 'animal');
        endwhile;
        echo '</div>';
    else :
        echo '<p class="no-animals">' . esc_html__('Наразі немає тварин для показу.', 'pet') . '</p>';
    endif;

    wp_reset_postdata();
}

/**
 * Get animal meta information
 *
 * @param int|null $post_id Post ID
 * @return array Animal meta information
 */
function pet_get_animal_meta($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return array(
        'type' => get_field('animal_type', $post_id),
        'age_group' => get_field('animal_age_group', $post_id),
        'age' => get_field('animal_age', $post_id),
        'gender' => get_field('animal_gender', $post_id),
        'breed' => get_field('animal_breed', $post_id),
        'size' => get_field('animal_size', $post_id),
        'tag' => get_field('animal_tag', $post_id)
    );
}

/**
 * Add custom body classes
 */
function pet_body_classes($classes)
{
    // Add class if is front page
    if (is_front_page()) {
        $classes[] = 'home-page';
    }

    return $classes;
}
add_filter('body_class', 'pet_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pet_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'pet_pingback_header');
