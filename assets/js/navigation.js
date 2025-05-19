jQuery(document).ready(function($) {
    // Додаємо клас для анімації при наведенні
    $('.menu-item-has-children').hover(
        function() {
            $(this).addClass('menu-hover');
        },
        function() {
            $(this).removeClass('menu-hover');
        }
    );
    
    // Мобільне меню
    $('.mobile-menu-btn').on('click', function() {
        $(this).toggleClass('active');
        $('.mobile-menu').toggleClass('active');
        $('.mobile-menu-overlay').toggleClass('active');
        $('body').toggleClass('menu-open');
    });
    
    // Закриття мобільного меню при кліку на оверлей
    $('.mobile-menu-overlay').on('click', function() {
        $('.mobile-menu-btn').removeClass('active');
        $('.mobile-menu').removeClass('active');
        $('.mobile-menu-overlay').removeClass('active');
        $('body').removeClass('menu-open');
    });
    
    // Розкриття підменю на мобільних пристроях
    $('.mobile-menu .menu-item-has-children > a').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).next('.sub-menu').slideToggle(300);
    });
});