document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        // Form validation function
        function validateContactForm(formData) {
            const errors = [];
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const nameRegex = /^[a-zA-Zа-яА-ЯіІїЇєЄґҐ\s'-]{2,50}$/;

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

            // Validate subject
            const subject = formData.get('subject');
            if (!subject || subject === '') {
                errors.push('Будь ласка, оберіть тему повідомлення');
            }

            // Validate message
            const message = formData.get('message');
            if (!message || message.length < 10) {
                errors.push('Повідомлення має містити щонайменше 10 символів');
            }

            return errors;
        }

        // Show error messages
        function showErrors(errors) {
            const errorContainer = document.createElement('div');
            errorContainer.className = 'form-errors';
            
            errors.forEach(error => {
                const errorElement = document.createElement('div');
                errorElement.className = 'error-message';
                errorElement.textContent = error;
                errorContainer.appendChild(errorElement);
            });
            
            // Remove existing errors
            const existingErrors = contactForm.querySelector('.form-errors');
            if (existingErrors) {
                existingErrors.remove();
            }
            
            contactForm.insertBefore(errorContainer, contactForm.firstChild);
        }

        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const errors = validateContactForm(formData);

            if (errors.length > 0) {
                showErrors(errors);
                return;
            }

            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';
            
            formData.append('action', 'pet_contact_form');
            formData.append('security', contactData.nonce);
            
            try {
                const response = await fetch(contactData.ajaxUrl, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    contactForm.innerHTML = `
                        <div class="success-message">
                            <div class="success-icon">✓</div>
                            <h3>Дякуємо за ваше повідомлення!</h3>
                            <p>Ми зв'яжемося з вами найближчим часом.</p>
                        </div>
                    `;
                } else {
                    showErrors([data.data.message || 'Помилка відправки форми']);
                }
            } catch (error) {
                console.error('Error:', error);
                showErrors(['Виникла помилка. Спробуйте ще раз пізніше.']);
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
});