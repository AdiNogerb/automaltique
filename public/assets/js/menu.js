document.addEventListener("DOMContentLoaded", function() {
    const title = document.querySelector('#title-mark');
    title.scrollIntoView();
    const buttons = document.querySelectorAll('.target-button');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            setTimeout(() => {
                button.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 400);
        });
    });
});