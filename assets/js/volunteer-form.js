document.addEventListener('DOMContentLoaded', function() {
    const volunteerForm = document.getElementById('volunteer-application-form');
    
    if (volunteerForm) {
        // Form validation function
        function validateForm(formData) {
            const errors = {};
            const nameRegex = /^[a-zA-Zа-яА-ЯіІїЇєЄґҐ\s'-]{2,50}$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^\+?3?8?(0\d{9})$/;

            // Validate name
            const name = formData.get('name');
            if (!name || !nameRegex.test(name)) {
                errors.name = "Будь ласка, введіть коректне ім'я (від 2 до 50 символів)";
            }

            // Validate email
            const email = formData.get('email');
            if (!email || !emailRegex.test(email)) {
                errors.email = 'Будь ласка, введіть коректний email';
            }

            // Validate phone
            const phone = formData.get('phone');
            if (!phone || !phoneRegex.test(phone)) {
                errors.phone = 'Будь ласка, введіть коректний номер телефону (+380XXXXXXXXX)';
            }

            // Validate experience
            const experience = formData.get('experience');
            if (!experience || experience.trim().length < 10) {
                errors.experience = 'Будь ласка, опишіть ваш досвід (мінімум 10 символів)';
            }

            // Validate availability
            const availability = formData.get('availability');
            if (!availability) {
                errors.availability = 'Будь ласка, оберіть доступний час';
            }

            return errors;
        }

        // Show field error
        function showFieldError(field, error) {
            const errorElement = field.parentElement.querySelector('.error-message');
            field.classList.add('error');
            if (errorElement) {
                errorElement.textContent = error;
                errorElement.style.display = 'block';
            }
        }

        // Clear field error
        function clearFieldError(field) {
            const errorElement = field.parentElement.querySelector('.error-message');
            field.classList.remove('error');
            if (errorElement) {
                errorElement.textContent = '';
                errorElement.style.display = 'none';
            }
        }

        // Handle form submission
        volunteerForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('action', 'pet_volunteer_application');
            formData.append('security', volunteerData.nonce);

            const errors = validateForm(formData);

            // Clear all previous errors
            this.querySelectorAll('.error-message').forEach(error => {
                error.textContent = '';
                error.style.display = 'none';
            });
            this.querySelectorAll('.error').forEach(field => {
                field.classList.remove('error');
            });

            // If there are errors, show them and return
            if (Object.keys(errors).length > 0) {
                for (const [field, error] of Object.entries(errors)) {
                    const inputElement = this.querySelector(`[name="${field}"]`);
                    if (inputElement) {
                        showFieldError(inputElement, error);
                    }
                }
                return;
            }

            // Disable submit button and show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';

            try {
                const response = await fetch(volunteerData.ajaxUrl, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Show success message
                    this.innerHTML = `
                        <div class="success-message">
                            <div class="success-icon">✓</div>
                            <h3>Дякуємо за вашу заявку!</h3>
                            <p>Ми зв'яжемося з вами найближчим часом.</p>
                        </div>
                    `;
                } else {
                    throw new Error(data.data.message || 'Помилка відправки форми');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Виникла помилка. Спробуйте ще раз пізніше.');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });

        // Add real-time validation
        volunteerForm.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('input', function() {
                clearFieldError(this);
            });

            field.addEventListener('blur', function() {
                const formData = new FormData();
                formData.append(this.name, this.value);
                const errors = validateForm(formData);
                
                if (errors[this.name]) {
                    showFieldError(this, errors[this.name]);
                } else {
                    clearFieldError(this);
                }
            });
        });
    }
});