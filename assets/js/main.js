document.addEventListener('DOMContentLoaded', function() {

    // FAQ Functionality
    const faqCategories = document.querySelectorAll('.faq-category');
    const faqItems = document.querySelectorAll('.faq-item');

    // Category switching
    faqCategories.forEach(category => {
        category.addEventListener('click', () => {
            // Remove active class from all categories
            faqCategories.forEach(cat => cat.classList.remove('active'));
            // Add active class to clicked category
            category.classList.add('active');

            // Hide all category content
            document.querySelectorAll('.faq-category-content').forEach(content => {
                content.classList.remove('active');
            });

            // Show selected category content
            const selectedCategory = category.dataset.category;
            document.querySelector(`.faq-category-content[data-category="${selectedCategory}"]`).classList.add('active');
        });
    });

    // FAQ items expand/collapse
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });

            // Toggle current item
            item.classList.toggle('active');
        });
    });

    // Page Loader
    const loader = document.querySelector('.page-loader');
    if (loader) {
        window.addEventListener('load', function() {
            loader.classList.add('hidden');
        });
    }

    // Scroll to Top Button
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.className = 'scroll-to-top';
    scrollToTopBtn.innerHTML = '&#8593;'; // Up arrow
    document.body.appendChild(scrollToTopBtn);

    // Show/hide scroll to top button
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    });

    // Scroll to top when button is clicked
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Smooth scroll to sections
    const heroButtons = document.querySelectorAll('.hero-buttons a');
    heroButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Mobile Menu
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuOverlay = document.createElement('div');
    mobileMenuOverlay.className = 'mobile-menu-overlay';
    document.body.appendChild(mobileMenuOverlay);

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            mobileMenuOverlay.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        mobileMenuOverlay.addEventListener('click', function() {
            mobileMenuBtn.classList.remove('active');
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.classList.remove('menu-open');
        });

        // Close menu when clicking on a link
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuBtn.classList.remove('active');
                mobileMenu.classList.remove('active');
                mobileMenuOverlay.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        });
    }

    // Header scroll behavior
    const header = document.querySelector('.site-header');
    let lastScroll = 0;
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > lastScroll && currentScroll > 100) {
            header.classList.add('header-hidden');
        } else {
            header.classList.remove('header-hidden');
        }
        
        lastScroll = currentScroll;
    });

    // Initialize Counter-Up if jQuery is available
    if (typeof jQuery !== 'undefined' && jQuery.fn.counterUp) {
        jQuery('.stat-number').counterUp({
            delay: 10,
            time: 1000
        });
    }

    // Animal Filters
    const filterForm = document.querySelector('.animal-filters');
    if (filterForm) {
        const animalCards = document.querySelectorAll('.animal-card');
        const clearFiltersBtn = document.querySelector('.clear-filters');
        const filterSelects = filterForm.querySelectorAll('select');
        
        function updateVisibility() {
    const selectedFilters = Array.from(filterSelects).reduce((acc, select) => {
        if (select.value) {
            acc[select.name] = select.value;
        }
        return acc;
    }, {});

    let hasVisibleCards = false;

    animalCards.forEach(card => {
        const matches = Object.entries(selectedFilters).every(([key, value]) => {
            if (!value) return true;
            
            const dataKey = key.replace('animal_', '');
            let cardValue = card.getAttribute(`data-${dataKey.toLowerCase()}`);
            
            // Переконаємося, що обидва значення приведені до нижнього регістру
            const normalizedCardValue = cardValue ? cardValue.toLowerCase() : '';
            const normalizedFilterValue = value.toLowerCase();
            
            // Debug output
            console.log(`Comparing filter "${key}": "${normalizedFilterValue}" with card value: "${normalizedCardValue}"`);
            
            return normalizedCardValue === normalizedFilterValue;
        });
        
        if (matches) {
            card.style.display = '';
            hasVisibleCards = true;
        } else {
            card.style.display = 'none';
        }
    });

    const noResultsMessage = document.querySelector('.no-results-message');
    if (!hasVisibleCards) {
        if (!noResultsMessage) {
            const message = document.createElement('p');
            message.className = 'no-results-message';
            message.textContent = 'На жаль, не знайдено тварин за вашими критеріями';
            message.style.textAlign = 'center';
            message.style.marginTop = '2rem';
            const animalsGrid = document.querySelector('.animals-grid');
            if (animalsGrid) {
                animalsGrid.parentNode.insertBefore(message, animalsGrid.nextSibling);
            }
        }
    } else if (noResultsMessage) {
        noResultsMessage.remove();
    }
}


        filterSelects.forEach(select => {
            select.addEventListener('change', updateVisibility);
        });

        if (clearFiltersBtn) {
            clearFiltersBtn.addEventListener('click', (e) => {
                e.preventDefault();
                filterForm.reset();
                animalCards.forEach(card => {
                    card.style.display = '';
                });
                const noResultsMessage = document.querySelector('.no-results-message');
                if (noResultsMessage) {
                    noResultsMessage.remove();
                }
            });
        }
    }
});


