const regex = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ\-\' ]{1,50}$/;
const input = document.getElementById('category');
const error = document.getElementById('error');
const button = document.getElementById('button');

const checkRegex = (value) => {
    if (regex.test(value)) {
        input.classList.add('is-valid');
        input.classList.remove('is-invalid');
        error.innerHTML = '';
        error.classList.add('d-none');
        button.removeAttribute('disabled');
    } else {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        error.innerHTML = 'Le nom ne doit contenir que des lettres, traits d\'union et/ou apostrophes';
        error.classList.remove('d-none');
        button.setAttribute('disabled', '');
    }
}

input.addEventListener('keyup', (e) => {
    checkRegex(e.target.value);
})

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
