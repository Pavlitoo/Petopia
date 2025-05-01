document.addEventListener('DOMContentLoaded', function() {
    // Donation Form
    const donationForm = document.getElementById('donation-form');
    const amountButtons = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.getElementById('custom_amount');

    if (donationForm) {
        // Amount buttons handling
        amountButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                amountButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                // Update custom amount input
                customAmountInput.value = this.dataset.amount;
            });
        });

        // Custom amount input handling
        customAmountInput.addEventListener('input', function() {
            // Remove active class from all buttons when custom amount is entered
            amountButtons.forEach(btn => btn.classList.remove('active'));
        });

        // Form submission
        donationForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                const formData = new FormData(this);
                
                // Show loading state
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Обробка...';
                submitButton.disabled = true;

                // Here you would typically send the data to your server
                // For demonstration, we'll simulate a server response
                await new Promise(resolve => setTimeout(resolve, 1500));

                // Show success message
                alert('Дякуємо за вашу підтримку!');
                
                // Reset form
                this.reset();
                
                // Reset button state
                submitButton.textContent = originalText;
                submitButton.disabled = false;

            } catch (error) {
                console.error('Error:', error);
                alert('Виникла помилка. Спробуйте ще раз пізніше.');
            }
        });
    }

    // Volunteer Form
    const volunteerForm = document.getElementById('volunteer-form');
    
    if (volunteerForm) {
        volunteerForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                const formData = new FormData(this);
                
                // Show loading state
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Обробка...';
                submitButton.disabled = true;

                // Simulate server response
                await new Promise(resolve => setTimeout(resolve, 1500));

                // Show success message
                alert('Дякуємо за вашу заявку! Ми зв\'яжемося з вами найближчим часом.');
                
                // Reset form
                this.reset();
                
                // Reset button state
                submitButton.textContent = originalText;
                submitButton.disabled = false;

            } catch (error) {
                console.error('Error:', error);
                alert('Виникла помилка. Спробуйте ще раз пізніше.');
            }
        });
    }

    // Progress bars animation
    const progressBars = document.querySelectorAll('.progress-bar');
    
    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.width = entry.target.style.width;
                observer.unobserve(entry.target);
            }
        });
    };

    const progressObserver = new IntersectionObserver(observerCallback, {
        threshold: 0.5
    });

    progressBars.forEach(bar => {
        bar.style.width = '0%';
        progressObserver.observe(bar);
        
        // Trigger animation after a short delay
        setTimeout(() => {
            bar.style.width = bar.dataset.progress || '0%';
        }, 100);
    });
    
});

