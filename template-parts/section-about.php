<?php

/**
 * Template part for displaying the about section
 *
 * @package Pet
 */
?>

<section class="about-section">
    <div class="container">
        <div class="about-inner">
            <div class="about-content">
                <h2><?php echo esc_html__('Про притулок Petopia', 'pet'); ?></h2>
                <p><?php echo esc_html__('Притулок Petopia був заснований у 2015 році групою волонтерів, які прагнули дати безпритульним тваринам другий шанс на щасливе життя. З часом наш притулок виріс у велике співтовариство людей, яких об\'єднує любов до тварин.', 'pet'); ?></p>
                <p><?php echo esc_html__('Ми забезпечуємо не тільки притулок для тварин, які опинилися на вулиці, але й надаємо їм медичний догляд, харчування і, найголовніше, ласку та турботу. Ми віримо, що кожна тварина заслуговує на люблячий дім.', 'pet'); ?></p>
                <div class="about-actions">
                    <a href="<?php echo esc_url(get_template_directory_uri() . '/page-templates/page-volunteer-guide.php'); ?>" class="btn btn-primary"><?php echo esc_html__('Стати волонтером', 'pet'); ?></a>
                </div>
            </div>
            <div class="about-image">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about.jpg'); ?>" alt="<?php echo esc_attr__('Про притулок', 'pet'); ?>">
            </div>
        </div>
    </div>
</section>