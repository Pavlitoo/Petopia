document.addEventListener('DOMContentLoaded', function() {
    const volunteerBtn = document.querySelector('.volunteer-cta .btn-primary');
    
    if (volunteerBtn) {
        volunteerBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Create and show modal
            const modal = document.createElement('div');
            modal.className = 'volunteer-modal';
            modal.innerHTML = `
                <div class="volunteer-modal-content">
                    <button class="modal-close">&times;</button>
                    <h3>Анкета волонтера</h3>
                    <form id="volunteer-application-form">
                        <div class="form-group">
                            <label for="volunteer-name">Ваше ім'я *</label>
                            <input type="text" id="volunteer-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="volunteer-email">Email *</label>
                            <input type="email" id="volunteer-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="volunteer-phone">Телефон *</label>
                            <input type="tel" id="volunteer-phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="volunteer-experience">Досвід роботи з тваринами</label>
                            <textarea id="volunteer-experience" name="experience" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="volunteer-availability">Доступний час для волонтерства *</label>
                            <select id="volunteer-availability" name="availability" required>
                                <option value="">Оберіть...</option>
                                <option value="weekdays">Будні дні</option>
                                <option value="weekends">Вихідні</option>
                                <option value="both">Будні та вихідні</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Відправити заявку</button>
                    </form>
                </div>
            `;
            
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            // Handle close button
            const closeBtn = modal.querySelector('.modal-close');
            closeBtn.addEventListener('click', () => {
                modal.remove();
                document.body.style.overflow = '';
            });
            
            // Handle form submission
            const form = modal.querySelector('#volunteer-application-form');
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';
                
                const formData = new FormData(form);
                formData.append('action', 'submit_volunteer_application');
                formData.append('nonce', volunteerData.nonce);
                
                try {
                    const response = await fetch(volunteerData.ajaxUrl, {
                        method: 'POST',
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        modal.querySelector('.volunteer-modal-content').innerHTML = `
                            <div class="success-message">
                                <div class="success-icon">✓</div>
                                <h3>Дякуємо за вашу заявку!</h3>
                                <p>Ми зв'яжемося з вами протягом 24 годин.</p>
                                <button class="btn btn-primary modal-close">Закрити</button>
                            </div>
                        `;
                        
                        modal.querySelector('.modal-close').addEventListener('click', () => {
                            modal.remove();
                            document.body.style.overflow = '';
                        });
                    } else {
                        throw new Error(data.data.message);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Виникла помилка. Спробуйте ще раз пізніше.');
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            });
        });
    }
});
