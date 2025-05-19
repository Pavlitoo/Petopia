document.addEventListener('DOMContentLoaded', function() {
    // Share story buttons handler
    const shareStoryButtons = document.querySelectorAll('.share-story');
    
    if (shareStoryButtons) {
        shareStoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                try {
                    // Parse the story data from the data-story attribute
                    const storyData = JSON.parse(this.dataset.story);
                    const title = storyData.name;
                    const description = storyData.description;
                    const image = storyData.image;
                    const successStoriesUrl = storyData.successStoriesUrl || '';
                    
                    // Try to use Web Share API if available
                    if (navigator.share) {
                        navigator.share({
                            title: title,
                            text: description,
                            url: successStoriesUrl
                        }).catch(err => {
                            console.log('Error sharing:', err);
                            createShareModal(title, description, successStoriesUrl, image);
                        });
                    } else {
                        createShareModal(title, description, successStoriesUrl, image);
                    }
                } catch (error) {
                    console.error('Error parsing story data:', error);
                }
            });
        });
    }

    function createShareModal(title, description, url, image) {
        // Remove existing modal if any
        const existingModal = document.querySelector('.share-modal');
        if (existingModal) {
            existingModal.remove();
        }

        const encodedUrl = encodeURIComponent(url);
        const encodedTitle = encodeURIComponent(title);
        const encodedDescription = encodeURIComponent(description);
        const shareText = `${encodedTitle}: ${encodedDescription}`;

        const modalHTML = `
            <div class="share-modal">
                <div class="share-modal-content">
                    <button class="close-modal">&times;</button>
                    <h3>Поділитися історією</h3>
                    <div class="story-preview">
                        <img src="${image}" alt="${title}" class="story-preview-image">
                        <div class="story-preview-content">
                            <h4>${title}</h4>
                            <p>${description}</p>
                        </div>
                    </div>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="share-button facebook">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text=${shareText}&url=${encodedUrl}" 
                           target="_blank"
                           rel="noopener noreferrer" 
                           class="share-button twitter">
                            <i class="fab fa-twitter"></i>
                            Twitter
                        </a>
                        <a href="https://t.me/share/url?url=${encodedUrl}&text=${shareText}" 
                           target="_blank"
                           rel="noopener noreferrer" 
                           class="share-button telegram">
                            <i class="fab fa-telegram"></i>
                            Telegram
                        </a>
                        <a href="viber://forward?text=${shareText} ${encodedUrl}" 
                           class="share-button viber">
                            <i class="fab fa-viber"></i>
                            Viber
                        </a>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', modalHTML);

        const modal = document.querySelector('.share-modal');
        const closeBtn = modal.querySelector('.close-modal');

        // Close modal on button click
        closeBtn.addEventListener('click', () => {
            modal.remove();
        });

        // Close modal on overlay click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.remove();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && document.querySelector('.share-modal')) {
                modal.remove();
            }
        }, { once: true });
    }
});