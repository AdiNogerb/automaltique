document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.target-button');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            setTimeout(() => {
                button.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 400);
        });
    });
});