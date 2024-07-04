document.addEventListener("DOMContentLoaded", function () {
    var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
        entry.target.classList.add("loaded");
        } else {
        entry.target.classList.remove("loaded");
        }
    });
    }, { threshold: 1.0 }); // 1.0 signifie que 100% de l'élément doit être visible

    var target = document.getElementById('logo');
    observer.observe(target);
});
