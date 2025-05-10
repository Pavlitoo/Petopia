document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';
            
            const formData = new FormData(this);
            formData.append('action', 'pet_contact_form');
            formData.append('nonce', this.querySelector('#contact_nonce').value);
            
            try {
                const response = await fetch(petData.ajaxUrl, {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Show success message
                    contactForm.innerHTML = `
                        <div class="success-message">
                            <div class="success-icon">✓</div>
                            <h3>Дякуємо за ваше повідомлення!</h3>
                            <p>Ми зв'яжемося з вами найближчим часом.</p>
                        </div>
                    `;
                } else {
                    throw new Error(data.data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Виникла помилка. Спробуйте ще раз пізніше.');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
});
