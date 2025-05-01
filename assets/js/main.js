document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.site-header');
    let lastScroll = 0;
    
    window.addEventListener('scroll', () => {
        if (window.innerWidth <= 768) {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            
            lastScroll = currentScroll;
        } else {
            header.classList.remove('header-hidden');
        }
    });

    // Mobile Menu
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const overlay = document.querySelector('.mobile-menu-overlay');

    if (mobileMenuBtn && mobileMenu && overlay) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            overlay.classList.toggle('active');
            mobileMenuBtn.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        overlay.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            overlay.classList.remove('active');
            mobileMenuBtn.classList.remove('active');
            document.body.classList.remove('menu-open');
        });
    }

    // Initialize Counter-Up
    jQuery('.stat-number').counterUp({
        delay: 10,
        time: 1000
    });

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
                    const dataKey = key.replace('animal_', '');
                    return card.dataset[dataKey] === value;
                });
                
                card.style.display = matches ? '' : 'none';
                if (matches) {
                    hasVisibleCards = true;
                }
            });

            // Show message if no animals match filters
            const noResultsMessage = document.querySelector('.no-results-message');
            if (!hasVisibleCards) {
                if (!noResultsMessage) {
                    const message = document.createElement('p');
                    message.className = 'no-results-message';
                    message.textContent = 'На жаль, не знайдено тварин за вашими критеріями';
                    message.style.textAlign = 'center';
                    message.style.marginTop = '2rem';
                    const animalsGrid = document.querySelector('.animals-grid');
                    animalsGrid.parentNode.insertBefore(message, animalsGrid.nextSibling);
                }
            } else if (noResultsMessage) {
                noResultsMessage.remove();
            }
        }

        // Add event listeners to all filter selects
        filterSelects.forEach(select => {
            select.addEventListener('change', updateVisibility);
        });

        // Clear filters
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