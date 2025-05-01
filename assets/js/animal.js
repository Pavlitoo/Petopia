document.addEventListener('DOMContentLoaded', function() {
    // Share button functionality
    const shareBtn = document.querySelector('.share-btn');
    if (shareBtn) {
        shareBtn.addEventListener('click', async () => {
            try {
                if (navigator.share) {
                    await navigator.share({
                        title: petAnimalData.shareTitle,
                        url: petAnimalData.shareUrl
                    });
                } else {
                    // Fallback для браузерів без Web Share API
                    const tempInput = document.createElement('input');
                    tempInput.value = petAnimalData.shareUrl;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    // Показуємо повідомлення про копіювання
                    const notification = document.createElement('div');
                    notification.className = 'copy-notification';
                    notification.textContent = 'Посилання скопійовано!';
                    notification.style.position = 'fixed';
                    notification.style.bottom = '20px';
                    notification.style.left = '50%';
                    notification.style.transform = 'translateX(-50%)';
                    notification.style.backgroundColor = '#FF751F';
                    notification.style.color = 'white';
                    notification.style.padding = '10px 20px';
                    notification.style.borderRadius = '8px';
                    notification.style.zIndex = '1000';
                    document.body.appendChild(notification);

                    setTimeout(() => {
                        notification.remove();
                    }, 2000);
                }
            } catch (err) {
                console.error('Error sharing:', err);
            }
        });
    }

    // Adopt button functionality
    const adoptBtn = document.querySelector('.btn-adopt');
    if (adoptBtn) {
        adoptBtn.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Get animal details
            const animalId = adoptBtn.dataset.animalId;

            // Show adoption form modal
            const modal = document.createElement('div');
            modal.className = 'adoption-modal';
            modal.innerHTML = `
                <div class="adoption-modal-content">
                    <button class="modal-close">&times;</button>
                    <div class="adoption-form-header">
                        <h2>Заявка на прихисток</h2>
                        <p>Ви хочете прихистити ${petAnimalData.shareTitle}</p>
                    </div>
                    <form id="adoption-form">
                        <input type="hidden" name="animal_id" value="${animalId}">
                        <div class="form-group">
                            <label for="name">Ваше ім'я</label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" id="phone" name="phone" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Повідомлення</label>
                            <textarea id="message" name="message" rows="4" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Відправити заявку</button>
                    </form>
                </div>
            `;

            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';

            // Show modal with animation
            requestAnimationFrame(() => {
                modal.classList.add('active');
            });

            // Handle modal close
            const closeModal = () => {
                modal.classList.remove('active');
                document.body.style.overflow = '';
                setTimeout(() => modal.remove(), 300);
            };

            modal.querySelector('.modal-close').addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Handle form submission
            const form = modal.querySelector('#adoption-form');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading-spinner"></span> Відправляємо...';

                const formData = new FormData(form);
                formData.append('action', 'pet_adoption_form');
                formData.append('nonce', petAnimalData.nonce);

                try {
                    const response = await fetch(petAnimalData.ajaxUrl, {
                        method: 'POST',
                        body: formData,
                        credentials: 'same-origin' // Add this line
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    if (data.success) {
                        modal.querySelector('.adoption-modal-content').innerHTML = `
                            <div class="success-message">
                                <div class="success-icon">✓</div>
                                <h2>Дякуємо за вашу заявку!</h2>
                                <p>Ми зв'яжемося з вами найближчим часом для обговорення деталей.</p>
                                <button class="btn btn-primary modal-close">Закрити</button>
                            </div>
                        `;

                        modal.querySelector('.modal-close').addEventListener('click', closeModal);
                    } else {
                        throw new Error(data.data?.message || 'Failed to submit form');
                    }
                } catch (error) {
                    console.error('Error submitting form:', error);
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                    alert('Виникла помилка при відправці форми. Будь ласка, спробуйте пізніше.');
                }
            });
        });
    }
});
