/**
 * Share functionality for animal pages - оновлена версія
 */
jQuery(document).ready(function($) {
    // Функція копіювання посилання при кліку на кнопку
    $('.share-btn').on('click', function() {
        // Отримуємо поточне URL сторінки
        const pageUrl = window.location.href;
        
        // Викликаємо функцію копіювання
        copyUrlToClipboard(pageUrl);
    });
    
    // Оновлена функція для копіювання тексту в буфер обміну
    function copyUrlToClipboard(text) {
        // Перевіряємо чи підтримується сучасний API clipboard
        if (navigator.clipboard && window.isSecureContext) {
            // Використовуємо сучасний API clipboard (працює в HTTPS)
            navigator.clipboard.writeText(text)
                .then(() => {
                    showNotification(petShareData.copySuccess);
                })
                .catch(() => {
                    // Якщо сучасний API не спрацював, використовуємо запасний варіант
                    fallbackCopyToClipboard(text);
                });
        } else {
            // Якщо сучасний API недоступний (наприклад, не HTTPS), 
            // використовуємо запасний варіант
            fallbackCopyToClipboard(text);
        }
    }
    
    // Запасний варіант копіювання для старих браузерів або HTTP
    function fallbackCopyToClipboard(text) {
        // Створюємо тимчасовий елемент для копіювання
        const tempElement = document.createElement('textarea');
        tempElement.value = text;
        tempElement.setAttribute('readonly', '');
        tempElement.style.position = 'absolute';
        tempElement.style.left = '-9999px';
        document.body.appendChild(tempElement);
        
        // Перевіряємо, чи є активний елемент, і зберігаємо його
        const activeElement = document.activeElement;
        
        // Вибираємо текст і копіюємо
        tempElement.focus();
        tempElement.select();
        
        let successful = false;
        try {
            successful = document.execCommand('copy');
        } catch (err) {
            console.error('Fallback: Не вдалося скопіювати', err);
        }
        
        // Повертаємо фокус на попередній активний елемент
        if (activeElement && activeElement.focus) {
            activeElement.focus();
        }
        
        // Видаляємо тимчасовий елемент
        document.body.removeChild(tempElement);
        
        // Показуємо відповідне повідомлення
        if (successful) {
            showNotification(petShareData.copySuccess);
        } else {
            showNotification(petShareData.copyFail);
        }
    }
    
    // Функція для відображення повідомлення
    function showNotification(message) {
        // Шукаємо існуюче повідомлення
        let notification = $('.share-notification');
        
        // Якщо повідомлення не існує, створюємо його
        if (notification.length === 0) {
            notification = $('<div class="share-notification"></div>');
            $('body').append(notification);
        }
        
        // Встановлюємо текст і показуємо повідомлення
        notification.text(message).fadeIn(300);
        
        // Ховаємо повідомлення через 2 секунди
        clearTimeout(window.notificationTimeout);
        window.notificationTimeout = setTimeout(function() {
            notification.fadeOut(300);
        }, 2000);
    }
    
    // Додатковий код для відстежування натискання на кнопку (для діагностики)
    console.log('Share functionality loaded');
    $('.share-btn').on('mousedown', function() {
        console.log('Share button clicked');
    });
    
});