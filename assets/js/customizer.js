(function($) {
    'use strict';

    // Live preview for colors
    wp.customize('pet_primary_color', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--primary-color', newval);
            $('.btn-primary, .stat-number, .animal-tag').css('background-color', newval);
        });
    });

    wp.customize('pet_secondary_color', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--secondary-color', newval);
            $('.hero-section, .about-section').css('background-color', newval);
        });
    });

    wp.customize('pet_button_color', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--button-color', newval);
            $('.btn-primary').css('background-color', newval);
        });
    });

    wp.customize('pet_button_text_color', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--button-text-color', newval);
            $('.btn-primary').css('color', newval);
        });
    });

    // Header styles
    wp.customize('pet_header_bg_color', function(value) {
        value.bind(function(newval) {
            $('.site-header').css('background-color', newval);
        });
    });

    wp.customize('pet_header_text_color', function(value) {
        value.bind(function(newval) {
            $('.site-header .nav-menu a').css('color', newval);
        });
    });

    wp.customize('pet_header_height', function(value) {
        value.bind(function(newval) {
            $('.site-header').css('padding', newval + 'px 0');
        });
    });

    // Typography
    wp.customize('pet_heading_font_size', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--heading-font-size', newval + 'px');
        });
    });

    wp.customize('pet_body_font_size', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--body-font-size', newval + 'px');
        });
    });

    // Layout
    wp.customize('pet_container_width', function(value) {
        value.bind(function(newval) {
            $('.container').css('max-width', newval + 'px');
        });
    });

    // Content
    wp.customize('pet_hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title').text(newval);
        });
    });

    wp.customize('pet_hero_description', function(value) {
        value.bind(function(newval) {
            $('.hero-description').text(newval);
        });
    });

    // Logo
    wp.customize('pet_logo_size', function(value) {
        value.bind(function(newval) {
            $('.site-logo img').css('max-height', newval + 'px');
        });
    });

})(jQuery);