<?php

/**
 * Template Name: Про нас
 *
 * @package Pet
 */

get_header();

// Get ACF fields
$header = get_field('about_header');
$mission = get_field('mission_section');
$what_we_do = get_field('what_we_do');
$team = get_field('team_section');
$cta_button = get_field('cta_button');
?>

<main id="primary" class="site-main">
    <!-- Header Section -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($header['title']); ?></h1>
            <p class="page-description"><?php echo esc_html($header['description']); ?></p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="about-content-section">
        <div class="container">
            <div class="about-content-inner">
                <div class="about-text">
                    <h2><?php echo esc_html($mission['title']); ?></h2>
                    <div class="mission-content">
                        <?php echo wp_kses_post($mission['content']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section class="what-we-do-section">
        <div class="container">
            <h2><?php echo esc_html($what_we_do['section_title']); ?></h2>
            <div class="what-we-do-grid">
                <?php
                if ($what_we_do['items']):
                    foreach ($what_we_do['items'] as $item): ?>
                        <div class="what-we-do-item">
                            <?php if ($item['icon']): ?>
                                <div class="item-icon">
                                    <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                </div>
                            <?php endif; ?>
                            <h3><?php echo esc_html($item['title']); ?></h3>
                            <p><?php echo esc_html($item['description']); ?></p>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2><?php echo esc_html($team['title']); ?></h2>
            <div class="team-grid">
                <?php
                if ($team['team_members']):
                    foreach ($team['team_members'] as $member): ?>
                        <div class="team-member">
                            <?php if ($member['image']): ?>
                                <div class="member-image">
                                    <img src="<?php echo esc_url($member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="member-info">
                                <h3 class="member-name"><?php echo esc_html($member['name']); ?></h3>
                                <p class="member-position"><?php echo esc_html($member['position']); ?></p>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo esc_html__('Приєднуйтесь до нас!', 'pet'); ?></h2>
                <p><?php echo esc_html__('Станьте частиною нашої команди волонтерів та допомагайте рятувати тварин', 'pet'); ?></p>
                <?php if ($cta_button && $cta_button['url']) : ?>
                    <a href="<?php echo esc_url($cta_button['url']); ?>"
                        class="btn btn-primary"
                        <?php echo $cta_button['target'] ? 'target="' . esc_attr($cta_button['target']) . '"' : ''; ?>>
                        <?php echo esc_html($cta_button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>