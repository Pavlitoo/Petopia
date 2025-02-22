<?php get_header(); ?>

<main class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Знайдіть вірного друга</h1>
            <p class="hero-description">Подаруйте дім безпритульній тварині та отримайте безмежну любов і відданість</p>
            <div class="hero-buttons">
                <a href="#animals" class="primary-button">Знайти друга</a>
                <a href="#donate" class="secondary-button">Допомогти притулку</a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Врятованих тварин</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">300+</span>
                    <span class="stat-label">Щасливих родин</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Волонтерів</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="section-container">
            <div class="mission-content">
                <h2>Наша місія</h2>
                <p class="mission-text">Ми прагнемо створити світ, де кожна тварина має люблячий дім. Наш притулок працює над порятунком, реабілітацією та прилаштуванням безпритульних тварин, забезпечуючи їм необхідну медичну допомогу, харчування та турботу.</p>
                <div class="mission-values">
                    <div class="value-item">
                        <div class="value-icon care"></div>
                        <h3>Турбота</h3>
                        <p>Забезпечуємо професійний догляд та любов кожній тварині</p>
                    </div>
                    <div class="value-item">
                        <div class="value-icon responsibility"></div>
                        <h3>Відповідальність</h3>
                        <p>Ретельно перевіряємо майбутніх власників</p>
                    </div>
                    <div class="value-item">
                        <div class="value-icon transparency"></div>
                        <h3>Прозорість</h3>
                        <p>Відкрито звітуємо про всі витрати та досягнення</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Animals Section with Enhanced Filters -->
    <section id="animals" class="animals-section">
        <div class="section-container">
            <h2>Наші хвостаті друзі</h2>
            <div class="advanced-filters">
                <div class="filter-group">
                    <h3>Тип тварини</h3>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="radio" name="animal_type" value="all" checked>
                            <span>Усі</span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="animal_type" value="dog">
                            <span>Собаки</span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="animal_type" value="cat">
                            <span>Коти</span>
                        </label>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Вік</h3>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" name="age" value="young">
                            <span>До 1 року</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="age" value="adult">
                            <span>1-7 років</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="age" value="senior">
                            <span>7+ років</span>
                        </label>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Розмір</h3>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" name="size" value="small">
                            <span>Маленький</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="size" value="medium">
                            <span>Середній</span>
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" name="size" value="large">
                            <span>Великий</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="animals-grid" id="animals-grid">
                <!-- Animals will be loaded here dynamically -->
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="section-container">
            <h2>Часті питання</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <button class="faq-question">
                        Як усиновити тварину?
                        <span class="faq-icon"></span>
                    </button>
                    <div class="faq-answer">
                        <p>Процес усиновлення включає кілька кроків:</p>
                        <ol>
                            <li>Вибір тварини на сайті</li>
                            <li>Заповнення анкети</li>
                            <li>Особиста зустріч з твариною</li>
                            <li>Підписання договору</li>
                            <li>Період адаптації з підтримкою наших фахівців</li>
                        </ol>
                    </div>
                </div>
                <!-- Additional FAQ items -->
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section">
        <div class="section-container">
            <div class="contact-wrapper">
                <div class="contact-info">
                    <h2>Зв'яжіться з нами</h2>
                    <p>Маєте питання? Напишіть нам, і ми відповімо якнайшвидше.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-icon phone"></span>
                            <span>+380 XX XXX XX XX</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon email"></span>
                            <span>info@pritulok.com</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon location"></span>
                            <span>м. Київ, вул. Прикладна, 123</span>
                        </div>
                    </div>
                </div>
                <form class="contact-form" id="contact-form">
                    <div class="form-group">
                        <input type="text" name="name" required placeholder="Ваше ім'я">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="subject" required>
                            <option value="">Оберіть тему</option>
                            <option value="adoption">Усиновлення</option>
                            <option value="volunteer">Волонтерство</option>
                            <option value="donation">Допомога притулку</option>
                            <option value="other">Інше</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="message" required placeholder="Ваше повідомлення"></textarea>
                    </div>
                    <button type="submit" class="submit-button">Надіслати</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>