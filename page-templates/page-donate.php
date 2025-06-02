<?php

/**
 * Template Name: Донат
 * @package Pet
 */

// Redirect non-logged in users
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

get_header();

// Get the donation product ID
$donation_product_id = get_option('pet_donation_product_id');
$product = null;

if ($donation_product_id) {
    $product = wc_get_product($donation_product_id);
}
?>

<main id="primary" class="site-main donation-page">
    <div class="container">
        <!-- Hero Section with Image -->
        <section class="donation-hero">
            <div class="hero-image2">
                <div class="heart-icon">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
            <h1><?php echo esc_html__('Донат для притулку', 'pet'); ?></h1>
            <p class="donation-description"><?php echo esc_html__('Ваша підтримка допомагає нам рятувати більше тварин', 'pet'); ?></p>
        </section>

        <?php if ($product) : ?>
            <div class="donation-form-wrapper">
                <div class="donation-card">
                    <!-- Custom donation form -->
                    <form method="post" action="<?php echo esc_url(wc_get_cart_url()); ?>" class="custom-donation-form" id="donation-form">

                        <div class="suggested-amounts">
                            <label class="suggested-label"><?php echo esc_html__('Рекомендовані суми:', 'pet'); ?></label>
                            <div class="amount-buttons">
                                <button type="button" class="amount-btn" data-amount="50">50 ₴</button>
                                <button type="button" class="amount-btn active" data-amount="100">100 ₴</button>
                                <button type="button" class="amount-btn" data-amount="250">250 ₴</button>
                                <button type="button" class="amount-btn" data-amount="500">500 ₴</button>
                            </div>
                        </div>

                        <div class="points-info">
                            <i class="fas fa-gift"></i>
                            <span><?php echo esc_html__('Ви отримаєте 20% бонусних балів від суми донату', 'pet'); ?></span>
                        </div>

                        <div class="custom-amount">
                            <label for="donation_amount"><?php echo esc_html__('Сума донату (₴)', 'pet'); ?></label>
                            <div class="amount-input-wrapper">
                                <input type="number"
                                    id="donation_amount"
                                    name="donation_amount"
                                    min="1"
                                    step="1"
                                    value="100"
                                    placeholder="100"
                                    class="donation-amount-input"
                                    required>
                            </div>
                        </div>

                        <!-- Приховані поля для WooCommerce -->
                        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="custom_donation_amount" id="hidden_donation_amount" value="100">

                        <button type="submit" class="donation-submit-btn">
                            <i class="fas fa-heart"></i>
                            <?php echo esc_html__('ПІДТРИМАТИ ПРИТУЛОК', 'pet'); ?>
                        </button>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <div class="donation-error">
                <p><?php echo esc_html__('Продукт для донату не налаштований. Будь ласка, зверніться до адміністратора.', 'pet'); ?></p>
            </div>
        <?php endif; ?>

        <!-- Info Cards -->
        <div class="donation-info">
            <div class="info-card">
                <i class="fas fa-gift"></i>
                <h3><?php echo esc_html__('Отримуйте бонуси', 'pet'); ?></h3>
                <p><?php echo esc_html__('20% від суми донату повертається вам у вигляді бонусних балів', 'pet'); ?></p>
            </div>
            <div class="info-card">
                <i class="fas fa-heart"></i>
                <h3><?php echo esc_html__('Рятуйте життя', 'pet'); ?></h3>
                <p><?php echo esc_html__('Кожна гривня допомагає нам піклуватися про тварин', 'pet'); ?></p>
            </div>
        </div>
    </div>
</main>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const amountButtons = document.querySelectorAll('.amount-btn');
        const amountInput = document.getElementById('donation_amount');
        const hiddenAmountInput = document.getElementById('hidden_donation_amount');
        const form = document.getElementById('donation-form');
        const submitBtn = document.querySelector('.donation-submit-btn');

        // Sync hidden input with visible input
        function syncHiddenInput() {
            hiddenAmountInput.value = amountInput.value;
        }

        // Handle amount button clicks
        amountButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const amount = this.dataset.amount;
                amountInput.value = amount;
                syncHiddenInput();

                // Update active button
                amountButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Handle manual input
        amountInput.addEventListener('input', function() {
            const currentValue = parseInt(this.value);
            syncHiddenInput();

            // Update active button based on input value
            amountButtons.forEach(btn => {
                const buttonAmount = parseInt(btn.dataset.amount);
                if (buttonAmount === currentValue) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        });

        // Form validation and submission
        form.addEventListener('submit', function(e) {
            const currentValue = parseFloat(amountInput.value);

            if (!currentValue || currentValue < 1) {
                e.preventDefault();
                alert('Будь ласка, вкажіть суму донату (мінімум 1 ₴)');
                amountInput.focus();
                return false;
            }

            // Update hidden input before submission
            syncHiddenInput();

            // Disable button to prevent double submission
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Обробка...';

            // Re-enable button after 3 seconds as fallback
            setTimeout(function() {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-heart"></i> ПІДТРИМАТИ ПРИТУЛОК';
            }, 3000);
        });

        // Initialize
        syncHiddenInput();
    });
</script>

<?php get_footer(); ?>