<?php

/**
 * Custom Post Types for Pet Theme with ACF integration
 *
 * @package Pet
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register custom post types
 */
function pet_register_post_types()
{
    // Animal post type
    $labels = array(
        'name'                  => _x('Тварини', 'Post type general name', 'pet'),
        'singular_name'         => _x('Тварина', 'Post type singular name', 'pet'),
        'menu_name'             => _x('Тварини', 'Admin Menu text', 'pet'),
        'name_admin_bar'        => _x('Тварина', 'Add New on Toolbar', 'pet'),
        'add_new'               => __('Додати нову', 'pet'),
        'add_new_item'          => __('Додати нову тварину', 'pet'),
        'new_item'              => __('Нова тварина', 'pet'),
        'edit_item'             => __('Редагувати тварину', 'pet'),
        'view_item'             => __('Переглянути тварину', 'pet'),
        'all_items'             => __('Всі тварини', 'pet'),
        'search_items'          => __('Шукати тварин', 'pet'),
        'parent_item_colon'     => __('Батьківська тварина:', 'pet'),
        'not_found'             => __('Тварин не знайдено.', 'pet'),
        'not_found_in_trash'    => __('У кошику тварин не знайдено.', 'pet'),
        'featured_image'        => _x('Фото тварини', 'Overrides the "Featured Image" phrase', 'pet'),
        'set_featured_image'    => _x('Встановити фото тварини', 'Overrides the "Set featured image" phrase', 'pet'),
        'remove_featured_image' => _x('Видалити фото тварини', 'Overrides the "Remove featured image" phrase', 'pet'),
        'use_featured_image'    => _x('Використовувати як фото тварини', 'Overrides the "Use as featured image" phrase', 'pet'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'animal'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-pets',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
    );

    register_post_type('animal', $args);

    // Adoption Applications post type
    $adoption_labels = array(
        'name'                  => _x('Заявки на прихисток', 'Post type general name', 'pet'),
        'singular_name'         => _x('Заявка на прихисток', 'Post type singular name', 'pet'),
        'menu_name'             => _x('Заявки на прихисток', 'Admin Menu text', 'pet'),
        'name_admin_bar'        => _x('Заявка на прихисток', 'Add New on Toolbar', 'pet'),
        'add_new'              => __('Додати нову', 'pet'),
        'add_new_item'         => __('Додати нову заявку', 'pet'),
        'new_item'             => __('Нова заявка', 'pet'),
        'edit_item'            => __('Редагувати заявку', 'pet'),
        'view_item'            => __('Переглянути заявку', 'pet'),
        'all_items'            => __('Всі заявки', 'pet'),
        'search_items'         => __('Шукати заявки', 'pet'),
        'not_found'            => __('Заявок не знайдено.', 'pet'),
        'not_found_in_trash'   => __('У кошику заявок не знайдено.', 'pet'),
    );

    $adoption_args = array(
        'labels'             => $adoption_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'adoption'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title'),
    );

    register_post_type('adoption', $adoption_args);

    // Register taxonomy for animal categories
    $tax_labels = array(
        'name'              => _x('Категорії тварин', 'taxonomy general name', 'pet'),
        'singular_name'     => _x('Категорія тварини', 'taxonomy singular name', 'pet'),
        'search_items'      => __('Пошук категорій', 'pet'),
        'all_items'         => __('Всі категорії', 'pet'),
        'parent_item'       => __('Батьківська категорія', 'pet'),
        'parent_item_colon' => __('Батьківська категорія:', 'pet'),
        'edit_item'         => __('Редагувати категорію', 'pet'),
        'update_item'       => __('Оновити категорію', 'pet'),
        'add_new_item'      => __('Додати нову категорію', 'pet'),
        'new_item_name'     => __('Назва нової категорії', 'pet'),
        'menu_name'         => __('Категорії', 'pet'),
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'animal-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('animal_category', array('animal'), $tax_args);
}
add_action('init', 'pet_register_post_types');

/**
 * Register ACF fields for our custom post types
 */
function pet_register_acf_fields()
{
    if (function_exists('acf_add_local_field_group')) {
        // Animal Fields
        acf_add_local_field_group(array(
            'key' => 'group_animal_details',
            'title' => 'Інформація про тварину',
            'fields' => array(
                array(
                    'key' => 'field_animal_type',
                    'label' => 'Тип тварини',
                    'name' => 'animal_type',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'dog' => 'Собака',
                        'cat' => 'Кіт',
                    ),
                ),
                array(
                    'key' => 'field_animal_age_group',
                    'label' => 'Вікова група',
                    'name' => 'animal_age_group',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'baby' => 'До 1 року',
                        'young' => '1-3 роки',
                        'adult' => '3-7 років',
                        'senior' => '7+ років',
                    ),
                ),
                array(
                    'key' => 'field_animal_age',
                    'label' => 'Вік',
                    'name' => 'animal_age',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_animal_gender',
                    'label' => 'Стать',
                    'name' => 'animal_gender',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'male' => 'Хлопчик',
                        'female' => 'Дівчинка',
                    ),
                ),
                array(
                    'key' => 'field_animal_breed',
                    'label' => 'Порода',
                    'name' => 'animal_breed',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_animal_size',
                    'label' => 'Розмір',
                    'name' => 'animal_size',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'Маленький' => 'Маленький',
                        'Середній' => 'Середній',
                        'Великий' => 'Великий',
                    ),
                ),
                array(
                    'key' => 'field_animal_tag',
                    'label' => 'Особлива мітка',
                    'name' => 'animal_tag',
                    'type' => 'select',
                    'required' => 0,
                    'choices' => array(
                        '' => 'Без мітки',
                        'Терміново' => 'Терміново',
                        'Особливі потреби' => 'Особливі потреби',
                        'Старший вік' => 'Старший вік',
                    ),
                    'default_value' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'animal',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
        ));

        // Adoption Application Fields
        acf_add_local_field_group(array(
            'key' => 'group_adoption_details',
            'title' => 'Деталі заявки',
            'fields' => array(
                array(
                    'key' => 'field_adoption_animal',
                    'label' => 'Тварина',
                    'name' => 'adoption_animal',
                    'type' => 'post_object',
                    'post_type' => array('animal'),
                    'required' => 1,
                ),
                array(
                    'key' => 'field_adoption_name',
                    'label' => "Ім'я заявника",
                    'name' => 'adoption_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_adoption_phone',
                    'label' => 'Телефон',
                    'name' => 'adoption_phone',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_adoption_email',
                    'label' => 'Email',
                    'name' => 'adoption_email',
                    'type' => 'email',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_adoption_message',
                    'label' => 'Повідомлення',
                    'name' => 'adoption_message',
                    'type' => 'textarea',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_adoption_status',
                    'label' => 'Статус заявки',
                    'name' => 'adoption_status',
                    'type' => 'select',
                    'choices' => array(
                        'new' => 'Нова',
                        'in_progress' => 'В обробці',
                        'approved' => 'Схвалено',
                        'rejected' => 'Відхилено',
                    ),
                    'default_value' => 'new',
                    'required' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'adoption',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array('the_content'),
        ));
    }
}
add_action('acf/init', 'pet_register_acf_fields');
