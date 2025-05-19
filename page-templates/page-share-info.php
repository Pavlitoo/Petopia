<?php

/**
 * Template Name: Поширення інформації
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('share_header');
$presentation = get_field('presentation');
$banners = get_field('social_banners');
$stories = get_field('success_stories_share');

// Enqueue share stories script
wp_enqueue_script('share-stories', get_template_directory_uri() . '/js/share-stories.js', array('jquery'), '1.0.0', true);
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($header['title']); ?></h1>
            <p class="page-description"><?php echo esc_html($header['description']); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="share-options">
                <?php if ($presentation) : ?>
                    <div class="share-option">
                        <h2><?php echo esc_html($presentation['title']); ?></h2>
                        <p><?php echo esc_html($presentation['description']); ?></p>
                        <?php if ($presentation['file']) :
                            $file = $presentation['file'];
                        ?>
                            <div class="download-block">
                                <a href="<?php echo esc_url($file['url']); ?>"
                                    class="btn btn-primary"
                                    download="<?php echo esc_attr($file['filename']); ?>"
                                    type="<?php echo esc_attr($file['mime_type']); ?>">
                                    <i class="fas fa-download"></i> <?php echo esc_html__('Завантажити', 'pet'); ?>
                                </a>
                                <span class="file-size"><?php echo esc_html('2.5 MB'); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($banners) : ?>
                    <div class="share-option">
                        <h2><?php echo esc_html__('Банери для соціальних мереж', 'pet'); ?></h2>
                        <div class="banners-grid">
                            <?php foreach ($banners as $banner) : ?>
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
                <?php endif; ?>

                <?php if ($stories) : ?>
                    <div class="share-option">
                        <h2><?php echo esc_html__('Історії успіху наших тварин', 'pet'); ?></h2>
                        <div class="stories-grid">
                            <?php foreach ($stories as $story) :
                                // Підготувати дані для JS
                                $success_stories_page = get_page_by_path('success-stories'); // Змініть на свій slug
                                $success_stories_url = $success_stories_page ? get_permalink($success_stories_page) : home_url();
                                $story_data = array(
                                    'name' => $story['name'],
                                    'description' => $story['description'],
                                    'image' => $story['image'],
                                    'successStoriesUrl' => $success_stories_url
                                );
                            ?>
                                <div class="story-card">
                                    <img src="<?php echo esc_url($story['image']); ?>" alt="<?php echo esc_attr($story['name']); ?>">
                                    <div class="story-content">
                                        <h4><?php echo esc_html($story['name']); ?></h4>
                                        <p><?php echo esc_html($story['description']); ?></p>
                                        <div class="story-share">
                                            <button class="btn btn-outline share-story" data-story='<?php echo esc_attr(json_encode($story_data)); ?>'>
                                                <i class="fas fa-share-alt"></i> <?php echo esc_html__('Поділитися', 'pet'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>