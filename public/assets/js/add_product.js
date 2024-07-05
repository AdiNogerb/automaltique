const regexName = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ\-\' ]{1,50}$/;
const regexDescription = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ0-9\-\/\.\, ]{1,100}$/;
const regexPrice = /^(\d){1,3}[.,]{0,1}(\d){0,2}$/;
const productName = document.getElementById('product-name');
const description = document.getElementById('product-description');
const price = document.getElementById('product-price');
const pint = document.getElementById('product-pint');
const happy = document.getElementById('product-happy');
const bottle = document.getElementById('product-bottle');
const button = document.getElementById('button');

const checkRegexName = (input, value) => {
    if (value != '') {
        if (regexName.test(value)) {
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
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
        error.innerHTML = '';
        error.classList.add('d-none');
        button.setAttribute('disabled', '');
    }
}

const checkRegexDescription = (input, value) => {
    if (value != '') {
        if (regexDescription.test(value)) {
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
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
        error.innerHTML = '';
        error.classList.add('d-none');
        button.setAttribute('disabled', '');
    }
}

const checkRegexPrice = (input, value) => {
    if (value != '') {
        if (regexPrice.test(value)) {
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
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
        error.innerHTML = '';
        error.classList.add('d-none');
        button.setAttribute('disabled', '');
    }
}

productName.addEventListener('keyup', (e) => {
   checkRegexName(e.target, e.target.value);
});

description.addEventListener('keyup', (e) => {
    checkRegexDescription(e.target, e.target.value);
});

price.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
});

price.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
});

pint.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
});

happy.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
});

bottle.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
});

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
