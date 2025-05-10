document.addEventListener('DOMContentLoaded', function() {
    const shareButtons = document.querySelectorAll('.share-story');
    
    shareButtons.forEach(button => {
        button.addEventListener('click', async function() {
            const storyData = JSON.parse(this.dataset.story);
            const shareUrl = window.location.origin + '/success-stories/';
            const shareData = {
                title: `Історія ${storyData.name} з притулку Petopia`,
                text: storyData.description,
                url: shareUrl
            };

            try {
                if (navigator.share) {
                    await navigator.share(shareData);
                } else {
                    // Fallback for browsers that don't support Web Share API
                    const modalHtml = `
                        <div class="share-modal">
                            <div class="share-modal-content">
                                <h3>Поділитися історією ${storyData.name}</h3>
                                <div class="share-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}" 
                                       target="_blank" class="share-button facebook">
                                        <i class="fab fa-facebook"></i> Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=${encodeURIComponent(storyData.description)}&url=${encodeURIComponent(shareUrl)}" 
                                       target="_blank" class="share-button twitter">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                    <a href="https://t.me/share/url?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent(storyData.description)}" 
                                       target="_blank" class="share-button telegram">
                                        <i class="fab fa-telegram"></i> Telegram
                                    </a>
                                </div>
                                <button class="close-modal">✕</button>
                            </div>
                        </div>
                    `;

                    document.body.insertAdjacentHTML('beforeend', modalHtml);

                    const modal = document.querySelector('.share-modal');
                    const closeBtn = modal.querySelector('.close-modal');

                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.remove();
                        }
                    });

                    closeBtn.addEventListener('click', () => {
                        modal.remove();
                    });
                }
            } catch (err) {
                console.error('Error sharing:', err);
            }
        });
    });
});
