document.addEventListener('DOMContentLoaded', function() {
    // Modal functionality
    const modal = document.getElementById('adoption-modal');
    const openModalBtn = document.querySelector('[data-open-adoption-form]');
    const closeModalBtn = document.querySelector('.close-modal');
    const adoptionForm = document.getElementById('adoption-form');

    if (modal && openModalBtn && closeModalBtn) {
        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });

        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        });

        // Form validation function
        function validateAdoptionForm(formData) {
            const errors = [];
            const nameRegex = /^[a-zA-Zа-яА-ЯіІїЇєЄґҐ\s'-]{2,50}$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^\+?3?8?(0\d{9})$/;

            // Validate name
            const name = formData.get('name');
            if (!name || !nameRegex.test(name)) {
                errors.push("Будь ласка, введіть коректне ім'я (2-50 символів)");
            }

            // Validate email
            const email = formData.get('email');
            if (!email || !emailRegex.test(email)) {
                errors.push('Будь ласка, введіть коректний email');
            }

            // Validate phone
            const phone = formData.get('phone');
            if (!phone || !phoneRegex.test(phone)) {
                errors.push('Будь ласка, введіть коректний номер телефону (+380XXXXXXXXX)');
            }

            return errors;
        }

        // Show error messages
        function showErrors(errors, form) {
            const errorContainer = document.createElement('div');
            errorContainer.className = 'form-errors';
            errorContainer.innerHTML = errors.map(error => `<p class="error-message">${error}</p>`).join('');
            
            const existingErrors = form.querySelector('.form-errors');
            if (existingErrors) {
                existingErrors.remove();
            }
            
            form.insertBefore(errorContainer, form.firstChild);
        }

        // Handle form submission
        if (adoptionForm) {
            adoptionForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const errors = validateAdoptionForm(formData);

                if (errors.length > 0) {
                    showErrors(errors, this);
                    return;
                }

                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';

                try {
                    const response = await fetch(petAdoptionData.ajaxurl, {
                        method: 'POST',
                        body: formData,
                        credentials: 'same-origin'
                    });

                    const data = await response.json();

                    if (data.success) {
                        const modalContent = modal.querySelector('.modal-content');
                        modalContent.innerHTML = `
                            <div class="success-message">
                                <div class="success-icon">✓</div>
                                <h3>Дякуємо за вашу заявку!</h3>
                                <p>Ми зв'яжемося з вами найближчим часом.</p>
                                <button class="btn btn-primary close-modal-success">Закрити</button>
                            </div>
                        `;

                        const closeSuccessBtn = modalContent.querySelector('.close-modal-success');
                        closeSuccessBtn.addEventListener('click', () => {
                            modal.style.display = 'none';
                            document.body.style.overflow = '';
                        });
                    } else {
                        throw new Error(data.data.message || 'Помилка відправки форми');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showErrors(['Виникла помилка. Спробуйте ще раз пізніше.'], this);
                    
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            });
        }
    }
});