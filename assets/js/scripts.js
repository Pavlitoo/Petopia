/**
 * Main JavaScript file for the Petopia theme
 */

(function($) {
    'use strict';

    // Mobile menu toggle
    function initMobileMenu() {
        const menuToggle = $('.menu-toggle');
        const mainNav = $('.main-navigation');
        
        menuToggle.on('click', function() {
            $(this).toggleClass('active');
            mainNav.toggleClass('toggled');
        });
    }

    // Sticky header
    function initStickyHeader() {
        const header = $('.site-header');
        const headerHeight = header.outerHeight();
        let scrollPosition = $(window).scrollTop();
        
        if (scrollPosition > headerHeight) {
            header.addClass('sticky');
        }
        
        $(window).on('scroll', function() {
            scrollPosition = $(this).scrollTop();
            
            if (scrollPosition > headerHeight) {
                header.addClass('sticky');
            } else {
                header.removeClass('sticky');
            }
        });
    }

    // Initialize functions on document ready
    $(document).ready(function() {
        initMobileMenu();
        initStickyHeader();
        
        // Smooth scroll for anchor links
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });
    });
    
})(jQuery);

function initScrollAnimations() {
    const elementsToAnimate = document.querySelectorAll('.fade-in');
    
    function checkScroll() {
        elementsToAnimate.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.classList.add('visible');
            }
        });
    }
    
    // Перевірка при завантаженні сторінки
    checkScroll();
    
    // Перевірка при прокрутці
    window.addEventListener('scroll', checkScroll);
}

// Викликаємо функцію
initScrollAnimations();

function initCounters() {
    const counters = document.querySelectorAll('.statistic-number');
    
    if (counters.length === 0) return;
    
    const observerOptions = {
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // Тривалість анімації в мілісекундах
                const startTime = performance.now();
                
                function updateCounter(currentTime) {
                    const elapsedTime = currentTime - startTime;
                    const progress = Math.min(elapsedTime / duration, 1);
                    const currentValue = Math.floor(progress * target);
                    
                    counter.textContent = currentValue.toLocaleString();
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target.toLocaleString();
                        observer.unobserve(counter);
                    }
                }
                
                requestAnimationFrame(updateCounter);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
}

// Викликаємо функцію після завантаження сторінки
document.addEventListener('DOMContentLoaded', initCounters);

// Додатково, якщо сторінка використовує AJAX або інші динамічні завантаження контенту
// ви можете викликати initCounters() після цих завантажень
function reinitCounters() {
    // Якщо є необхідність повторно ініціалізувати лічильники після динамічних змін в DOM
    initCounters();
}