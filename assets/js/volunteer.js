document.addEventListener('DOMContentLoaded', function() {
    const volunteerForm = document.getElementById('volunteer-form');
    
    if (volunteerForm) {
        volunteerForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';

            const formData = new FormData(this);
            formData.append('action', 'submit_volunteer');
            formData.append('nonce', volunteerData.nonce);

            try {
                const response = await fetch(volunteerData.ajaxUrl, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Show success message
                    const successMessage = document.createElement('div');
                    successMessage.className = 'success-message';
                    successMessage.innerHTML = `
                        <div class="success-icon">✓</div>
                        <h3>Дякуємо за вашу заявку!</h3>
                        <p>${data.data.message}</p>
                    `;
                    
                    volunteerForm.innerHTML = '';
                    volunteerForm.appendChild(successMessage);
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

    // Add animation to steps list
    const steps = document.querySelectorAll('.steps-list li');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-step');
            }
        });
    }, { threshold: 0.5 });

    steps.forEach(step => observer.observe(step));
});