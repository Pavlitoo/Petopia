document.addEventListener('DOMContentLoaded', function() {
    // Check if jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.warn('jQuery is not loaded');
        return;
    }

    // FAQ Functionality
    const faqCategories = document.querySelectorAll('.faq-category');
    const faqItems = document.querySelectorAll('.faq-item');

    if (faqCategories) {
        faqCategories.forEach(category => {
            category.addEventListener('click', () => {
                faqCategories.forEach(cat => cat.classList.remove('active'));
                category.classList.add('active');

                const selectedCategory = category.dataset.category;
                const categoryContent = document.querySelector(`.faq-category-content[data-category="${selectedCategory}"]`);
                
                document.querySelectorAll('.faq-category-content').forEach(content => {
                    content.classList.remove('active');
                });

                if (categoryContent) {
                    categoryContent.classList.add('active');
                }
            });
        });
    }

    if (faqItems) {
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            if (question) {
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });

                    item.classList.toggle('active');
                });
            }
        });
    }

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
    scrollToTopBtn.innerHTML = '&#8593;';
    document.body.appendChild(scrollToTopBtn);

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Smooth scroll to sections
    const heroButtons = document.querySelectorAll('.hero-buttons a');
    if (heroButtons) {
        heroButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId.startsWith('#')) {
                    e.preventDefault();
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        targetSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    }

    // Header scroll behavior
    const header = document.querySelector('.site-header');
    let lastScroll = 0;
    
    if (header) {
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            
            lastScroll = currentScroll;
        });
    }

    // Initialize Counter-Up safely
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
                    const cardValue = card.getAttribute(`data-${dataKey.toLowerCase()}`);
                    return cardValue && cardValue.toLowerCase() === value.toLowerCase();
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

    // Mobile Menu
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    
    function closeMobileMenu() {
        if (mobileMenuBtn) mobileMenuBtn.classList.remove('active');
        if (mobileMenu) mobileMenu.classList.remove('active');
        if (mobileMenuOverlay) mobileMenuOverlay.classList.remove('active');
        document.body.classList.remove('menu-open');
        if (mobileMenuBtn) mobileMenuBtn.setAttribute('aria-expanded', 'false');
    }

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            if (mobileMenuOverlay) mobileMenuOverlay.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            this.setAttribute('aria-expanded', this.classList.contains('active'));
        });
    }

    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
    }

    document.addEventListener('keyup', function(e) {
        if (e.key === "Escape" && mobileMenu && mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });

    // Mobile submenu handling
    const menuItemsWithChildren = document.querySelectorAll('.mobile-nav-menu .menu-item-has-children');
    
    if (menuItemsWithChildren.length) {
        menuItemsWithChildren.forEach(item => {
            if (!item.querySelector('.submenu-toggle')) {
                const submenuToggle = document.createElement('span');
                submenuToggle.className = 'submenu-toggle';
                submenuToggle.innerHTML = '<i class="fas fa-chevron-down"></i>';
                
                const link = item.querySelector('a');
                if (link) {
                    link.after(submenuToggle);
                }
                
                submenuToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    this.classList.toggle('active');
                    const subMenu = this.parentNode.querySelector('.sub-menu');
                    if (subMenu) {
                        subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
                    }
                });
            }
        });
    }

    // Close menu on link click
    const mobileMenuLinks = document.querySelectorAll('.mobile-nav-menu a');
    if (mobileMenuLinks) {
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (!this.parentNode.classList.contains('menu-item-has-children')) {
                    closeMobileMenu();
                }
            });
        });
    }
});
