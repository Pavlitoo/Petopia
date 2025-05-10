<?php

/**
 * Template Name: Поширення інформації
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Поширення інформації', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Допоможіть нашим хвостикам знайти дім через соціальні мережі', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="share-options">
                <div class="share-option">
                    <h2><?php echo esc_html__('Презентація притулку', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Завантажте презентацію про наш притулок та поділіться нею з друзями:', 'pet'); ?></p>
                    <div class="download-block">
                        <div class="download-info">
                            <i class="fas fa-file-powerpoint"></i>
                            <div class="download-details">
                                <h4>Презентація Petopia.pptx</h4>
                                <span>2.5 MB</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/downloads/petopia-presentation.pptx'); ?>" class="btn btn-primary" download>
                            <i class="fas fa-download"></i> <?php echo esc_html__('Завантажити', 'pet'); ?>
                        </a>
                    </div>
                </div>

                <div class="share-option">
                    <h2><?php echo esc_html__('Банери для соціальних мереж', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Готові банери для поширення в соціальних мережах:', 'pet'); ?></p>
                    <div class="banners-grid">
                        <?php
                        $banners = array(
                            array(
                                'title' => 'Допоможіть врятувати життя',
                                'image' => get_template_directory_uri() . '/assets/images/banners/banner1.png',
                                'size' => 'Facebook Cover (851x315px)'
                            ),
                            array(
                                'title' => 'Подаруй дім',
                                'image' => get_template_directory_uri() . '/assets/images/banners/banner2.png',
                                'size' => 'Instagram Post (1080x1080px)'
                            ),
                            array(
                                'title' => 'Стань волонтером',
                                'image' => get_template_directory_uri() . '/assets/images/banners/banner3.png',
                                'size' => 'Twitter Header (1500x500px)'
                            )
                        );

                        foreach ($banners as $banner) : ?>
                            <div class="banner-item">
                                <img src="<?php echo esc_url($banner['image']); ?>" alt="<?php echo esc_attr($banner['title']); ?>">
                                <div class="banner-info">
                                    <h4><?php echo esc_html($banner['title']); ?></h4>
                                    <span><?php echo esc_html($banner['size']); ?></span>
                                    <a href="<?php echo esc_url($banner['image']); ?>" class="btn btn-outline" download>
                                        <i class="fas fa-download"></i> <?php echo esc_html__('Завантажити', 'pet'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="share-option">
                    <h2><?php echo esc_html__('Історії успіху наших тварин', 'pet'); ?></h2>
                    <p><?php echo esc_html__('Поділіться історіями щасливих тварин, які знайшли свій дім:', 'pet'); ?></p>
                    <div class="stories-grid">
                        <?php
                        $stories = array(
                            array(
                                'name' => 'Рекс',
                                'image' => get_template_directory_uri() . '/assets/images/success-1.jpg',
                                'description' => 'Історія про те, як Рекс знайшов свою родину після 6 місяців у притулку. '

                            ),
                            array(
                                'name' => 'Мурка',
                                'image' => get_template_directory_uri() . '/assets/images/success-2.jpg',
                                'description' => 'Як перелякана кішка стала улюбленицею родини.'
                            ),
                            array(
                                'name' => 'Бобік',
                                'image' => get_template_directory_uri() . '/assets/images/success-3.jpg',
                                'description' => 'Історія старшого пса, який знайшов свій дім.'
                            )
                        );

                        foreach ($stories as $story) : ?>
                            <div class="story-card">
                                <img src="<?php echo esc_url($story['image']); ?>" alt="<?php echo esc_attr($story['name']); ?>">
                                <div class="story-content">
                                    <h4><?php echo esc_html($story['name']); ?></h4>
                                    <p><?php echo esc_html($story['description']); ?></p>
                                    <div class="story-share">
                                        <button class="btn btn-outline share-story" data-story="<?php echo esc_attr(json_encode($story)); ?>">
                                            <i class="fas fa-share-alt"></i> <?php echo esc_html__('Поділитися', 'pet'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>