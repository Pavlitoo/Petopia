document.addEventListener('DOMContentLoaded', function() {
    const donationForm = document.getElementById('donation-form');
    const amountButtons = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.querySelector('input[name="custom_amount"]');

    // Handle amount button clicks
    amountButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            amountButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');
            // Update custom amount input
            customAmountInput.value = button.dataset.amount;
        });
    });

    // Handle custom amount input
    customAmountInput.addEventListener('input', () => {
        // Remove active class from all buttons when custom amount is entered
        amountButtons.forEach(btn => btn.classList.remove('active'));
        
        // Find and activate button if amount matches
        const matchingButton = Array.from(amountButtons)
            .find(btn => btn.dataset.amount === customAmountInput.value);
        
        if (matchingButton) {
            matchingButton.classList.add('active');
        }
    });

    // Handle form submission
    donationForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(donationForm);
        const amount = formData.get('custom_amount');
        const name = formData.get('name');
        const email = formData.get('email');

        // Here you would typically send this data to your backend
        console.log('Processing donation:', {
            amount,
            name,
            email
        });

        // Show success message (you should replace this with actual payment processing)
        alert('Дякуємо за вашу підтримку! Ми зв\'яжемося з вами найближчим часом.');
        donationForm.reset();
    });
});