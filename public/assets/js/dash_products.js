document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.target-button');
    var target = document.getElementById('logo');
    
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
            entry.target.classList.add("loaded");
            } else {
            entry.target.classList.remove("loaded");
            }
        });
    }, { threshold: 1.0 }); // 1.0 signifie que 100% de l'élément doit être visible
    observer.observe(target);
        

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            setTimeout(() => {
                button.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 400);
        });
    });
});