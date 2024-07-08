// Animation Carousel
document.addEventListener("DOMContentLoaded", function () {
    var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
        entry.target.classList.add("in-view");
        } else {
        entry.target.classList.remove("in-view");
        }
    });
    }, { threshold: 0.7 }); // 1.0 signifie que 100% de l'élément doit être visible

    var target = document.querySelector('.carousel');
    observer.observe(target);
});

// Animation Horaires
document.addEventListener("DOMContentLoaded", function () {
    var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
        entry.target.classList.add("in-view");
        } else {
        entry.target.classList.remove("in-view");
        }
    });
    }, { threshold: 0.7 }); // 1.0 signifie que 100% de l'élément doit être visible

    var target = document.querySelector('.schedules');
    observer.observe(target);
});

// Map
var map = L.map('map').setView([49.89575935202852, 2.3040366868353104], 20);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var greenIcon = L.icon({
    iconUrl: '../public/assets/img/whiskey_barrel.png',

    iconSize:     [50, 58], // size of the icon
    iconAnchor:   [25, 58], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
L.marker([49.89575935202852, 2.3040366868353104], {icon: greenIcon}).addTo(map).bindPopup("L'AUTOMALTIQUE<br>4 Pl. Parmentier<br>80000 Amiens");
