<?php

/**
 * Template Name: Історії успіху
 *
 * @package Pet
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html__('Історії успіху', 'pet'); ?></h1>
            <p class="page-description"><?php echo esc_html__('Щасливі історії наших колишніх підопічних', 'pet'); ?></p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="stories-grid">
                <article class="success-story">
                    <div class="story-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/success-1.jpg'); ?>" alt="Історія Рекса">
                    </div>
                    <div class="story-content">
                        <h2>Рекс</h2>
                        <p class="story-meta">У притулку: 6 місяців | Знайшов дім: Березень 2023</p>
                        <p>Рекс потрапив до нас після того, як його знайшли на вулиці зі зламаною лапою. Після лікування та реабілітації він знайшов люблячу родину, яка подарувала йому новий дім.</p>
                    </div>
                </article>

                <article class="success-story">
                    <div class="story-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/success-2.jpg'); ?>" alt="Історія Мурки">
                    </div>
                    <div class="story-content">
                        <h2>Мурка</h2>
                        <p class="story-meta">У притулку: 3 місяці | Знайшла дім: Травень 2023</p>
                        <p>Мурка була дуже боязкою кішкою, коли потрапила до притулку. Завдяки терпінню та любові волонтерів вона стала довіряти людям і знайшла свою нову родину.</p>
                    </div>
                </article>

                <article class="success-story">
                    <div class="story-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/success-3.jpg'); ?>" alt="Історія Бобіка">
                    </div>
                    <div class="story-content">
                        <h2>Бобік</h2>
                        <p class="story-meta">У притулку: 8 місяців | Знайшов дім: Червень 2023</p>
                        <p>Бобік був старшим песиком, якого багато хто оминав увагою. Але одного дня його помітила родина, яка шукала саме спокійного та мудрого друга.</p>
                    </div>
                </article>
            </div>

            <div class="share-story">
                <h2><?php echo esc_html__('Поділіться своєю історією', 'pet'); ?></h2>
                <p><?php echo esc_html__('Якщо ви всиновили тварину з нашого притулку, ми будемо раді почути вашу історію!', 'pet'); ?></p>
                <a href="#share-form" class="btn btn-primary"><?php echo esc_html__('Поділитися історією', 'pet'); ?></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>