<?php 
/* Template Name: Головна */
get_header(); 
?>

<section class="hero">
    <h1><?php echo get_theme_mod('hero_title', 'Знайди свого друга!'); ?></h1>
    <p><?php echo get_theme_mod('hero_subtitle', 'Допоможи тваринам знайти дім'); ?></p>
    <a href="<?php echo esc_url(get_permalink(get_page_by_title('Каталог тварин'))); ?>" class="btn">Подивитися тварин</a>
</section>

<section class="about">
    <h2><?php echo get_theme_mod('about_title', 'Про нас'); ?></h2>
    <p><?php echo get_theme_mod('about_text', 'Наш притулок допомагає тваринам знайти люблячий дім.'); ?></p>
</section>

<?php get_footer(); ?>
