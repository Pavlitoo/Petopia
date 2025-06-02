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
                errors.push({
                    field: 'name',
                    message: "Будь ласка, введіть коректне ім'я (2-50 символів)"
                });
            }

            // Validate email
            const email = formData.get('email');
            if (!email || !emailRegex.test(email)) {
                errors.push({
                    field: 'email',
                    message: 'Будь ласка, введіть коректний email'
                });
            }

            // Validate phone
            const phone = formData.get('phone');
            if (!phone || !phoneRegex.test(phone)) {
                errors.push({
                    field: 'phone',
                    message: 'Будь ласка, введіть коректний номер телефону (+380XXXXXXXXX)'
                });
            }

            return errors;
        }

        // Show error message for a specific field
        function showFieldError(field, message) {
            const inputElement = document.getElementById(field);
            if (inputElement) {
                inputElement.classList.add('error');
                const errorDiv = inputElement.parentElement.querySelector('.error-message');
                if (!errorDiv) {
                    const newErrorDiv = document.createElement('div');
                    newErrorDiv.className = 'error-message';
                    inputElement.parentElement.appendChild(newErrorDiv);
                }
                inputElement.parentElement.querySelector('.error-message').textContent = message;
                inputElement.parentElement.querySelector('.error-message').style.display = 'block';
            }
        }

        // Clear error message for a specific field
        function clearFieldError(field) {
            const inputElement = document.getElementById(field);
            if (inputElement) {
                inputElement.classList.remove('error');
                const errorDiv = inputElement.parentElement.querySelector('.error-message');
                if (errorDiv) {
                    errorDiv.textContent = '';
                    errorDiv.style.display = 'none';
                }
            }
        }

        // Clear all errors
        function clearAllErrors() {
            const errorMessages = adoptionForm.querySelectorAll('.error-message');
            const errorInputs = adoptionForm.querySelectorAll('.error');
            errorMessages.forEach(error => {
                error.textContent = '';
                error.style.display = 'none';
            });
            errorInputs.forEach(input => input.classList.remove('error'));
        }

        // Handle form submission
        if (adoptionForm) {
            adoptionForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const errors = validateAdoptionForm(formData);

                // Clear previous errors
                clearAllErrors();

                if (errors.length > 0) {
                    errors.forEach(error => {
                        showFieldError(error.field, error.message);
                    });
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
                    showFieldError('name', 'Виникла помилка. Спробуйте ще раз пізніше.');
                    
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            });

            // Add real-time validation
            const formInputs = adoptionForm.querySelectorAll('input, textarea');
            formInputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearFieldError(this.id);
                });

                input.addEventListener('blur', function() {
                    const formData = new FormData();
                    formData.set(this.name, this.value);
                    const errors = validateAdoptionForm(formData);
                    const fieldError = errors.find(error => error.field === this.id);
                    if (fieldError) {
                        showFieldError(fieldError.field, fieldError.message);
                    }
                });
            });
        }
    }
});