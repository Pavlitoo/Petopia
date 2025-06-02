document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('certificate-name');
    const previewName = document.getElementById('preview-name');
    const downloadBtn = document.getElementById('downloadCertificate');
    const certificate = document.getElementById('certificate');

    // Only proceed if we have the required elements
    if (nameInput && previewName) {
        // Update preview when name changes
        nameInput.addEventListener('input', function() {
            if (this.value.trim() === '') {
                previewName.textContent = 'Введіть ім\'я, будь ласка';
            } else {
                previewName.textContent = this.value;
            }
        });
    }

    if (downloadBtn && certificate) {
        downloadBtn.addEventListener('click', function() {
            // Show loading state
            downloadBtn.disabled = true;
            downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Генерація...';

            // Make sure html2canvas is loaded
            if (typeof html2canvas === 'undefined') {
                console.error('html2canvas is not loaded');
                downloadBtn.disabled = false;
                downloadBtn.innerHTML = '<i class="fas fa-download"></i> Завантажити сертифікат';
                return;
            }

            // Generate certificate image
            html2canvas(certificate, {
                scale: 2,
                useCORS: true,
                backgroundColor: null,
                logging: false // Disable logging
            }).then(function(canvas) {
                try {
                    // Convert to image and download
                    const link = document.createElement('a');
                    link.download = 'petopia-certificate.png';
                    link.href = canvas.toDataURL('image/png');
                    link.click();
                } catch (err) {
                    console.error('Error generating certificate:', err);
                    alert('Помилка при генерації сертифіката. Спробуйте ще раз.');
                }

                // Reset button state
                downloadBtn.disabled = false;
                downloadBtn.innerHTML = '<i class="fas fa-download"></i> Завантажити сертифікат';
            }).catch(function(error) {
                console.error('Error generating certificate:', error);
                alert('Помилка при генерації сертифіката. Спробуйте ще раз.');

                // Reset button state
                downloadBtn.disabled = false;
                downloadBtn.innerHTML = '<i class="fas fa-download"></i> Завантажити сертифікат';
            });
        });
    }
});
