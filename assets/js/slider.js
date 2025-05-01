/**
 * Hero slider for the Petopia theme
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Initialize slider if it exists
        if ($('.hero-slider .slider').length) {
            $('.hero-slider .slider').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: true,
                dots: true,
                fade: true,
                speed: 800,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false
                        }
                    }
                ]
            });
        }
    });
    
})(jQuery);