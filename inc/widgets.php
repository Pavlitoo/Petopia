<?php

/**
 * Custom widgets for the theme
 *
 * @package Pet
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Custom Recent Animals Widget
 */
class Pet_Recent_Animals_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'pet_recent_animals',
            esc_html__('Останні тварини', 'pet'),
            array('description' => esc_html__('Показує останніх тварин з притулку.', 'pet'))
        );
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Останні тварини', 'pet');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;

        $query = new WP_Query(array(
            'post_type' => 'animal',
            'posts_per_page' => $number,
            'no_found_rows' => true,
        ));

        if ($query->have_posts()) :
            echo $args['before_widget'];
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
?>
            <ul class="recent-animals">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="recent-animal-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="recent-animal-thumb">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="recent-animal-content">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php
                            $animal_meta = pet_get_animal_meta();
                            if ($animal_meta['age']) :
                                echo '<span class="animal-age">' . esc_html($animal_meta['age']) . '</span>';
                            endif;
                            ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php
            echo $args['after_widget'];
            wp_reset_postdata();
        endif;
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Останні тварини', 'pet');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Заголовок:', 'pet'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
                <?php esc_html_e('Кількість тварин для показу:', 'pet'); ?>
            </label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number"
                step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        return $instance;
    }
}

/**
 * Register Custom Widgets
 */
function pet_register_custom_widgets()
{
    register_widget('Pet_Recent_Animals_Widget');
}
add_action('widgets_init', 'pet_register_custom_widgets');

/**
 * Register widget areas
 */
function pet_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Сайдбар', 'pet'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Додайте віджети сюди.', 'pet'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Футер 1', 'pet'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Перша колонка футера.', 'pet'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Футер 2', 'pet'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Друга колонка футера.', 'pet'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Футер 3', 'pet'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Третя колонка футера.', 'pet'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'pet_widgets_init');
