// ###########################################  Déclaration des constantes  ###########################################
const regexName = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ0-9\-\/\.\(\)\° ]{1,50}$/;
const regexDescription = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ0-9\-\/\.\,\(\)\° ]{1,100}$/;
const regexPrice = /^(\d){1,3}[.,]{0,1}(\d){0,2}$/;
const productName = document.getElementById('product-name');
const errorName = document.getElementById('error-name');
const description = document.getElementById('product-description');
const errorDescription = document.getElementById('error-description');
const price = document.getElementById('product-price');
const errorPrice = document.getElementById('error-price');
const pint = document.getElementById('product-pint');
const errorPint = document.getElementById('error-pint');
const happy = document.getElementById('product-happy');
const errorHappy = document.getElementById('error-happy');
const bottle = document.getElementById('product-bottle');
const errorBottle = document.getElementById('error-bottle');
const button = document.getElementById('button');
button.setAttribute('disabled', '');

// ###########################################  Fonctions  ###########################################
/**
 * Vérifie si la valeur donnée respecte le format attendu pour un nom de produit.
 * Si la valeur est valide, ajoute la classe 'is-valid' et enlève la classe 'is-invalid' de l'élément d'entrée.
 * Sinon, enlève la classe 'is-valid' et ajoute la classe 'is-invalid'.
 * Si la valeur est vide, enlève les classes 'is-valid' et 'is-invalid'.
 * 
 * @param {HTMLElement} input - L'élément d'entrée à valider.
 * @param {string} value - La valeur de l'élément d'entrée à valider.
 */
const checkRegexName = (input, value) => {
    if (value != '') {
        if (regexName.test(value)) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }        
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
    }
}

/**
 * Vérifie si la valeur donnée respecte le format attendu pour une description de produit.
 * Si la valeur est valide, ajoute la classe 'is-valid' et enlève la classe 'is-invalid' de l'élément d'entrée.
 * Sinon, enlève la classe 'is-valid' et ajoute la classe 'is-invalid'.
 * Si la valeur est vide, enlève les classes 'is-valid' et 'is-invalid'.
 * 
 * @param {HTMLElement} input - L'élément d'entrée à valider.
 * @param {string} value - La valeur de l'élément d'entrée à valider.
 */
const checkRegexDescription = (input, value) => {
    if (value != '') {
        if (regexDescription.test(value)) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }        
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
    }
}

/**
 * Vérifie si la valeur donnée respecte le format attendu pour un prix de produit.
 * Si la valeur est valide, ajoute la classe 'is-valid' et enlève la classe 'is-invalid' de l'élément d'entrée.
 * Sinon, enlève la classe 'is-valid' et ajoute la classe 'is-invalid'.
 * Si la valeur est vide, enlève les classes 'is-valid' et 'is-invalid'.
 * 
 * @param {HTMLElement} input - L'élément d'entrée à valider.
 * @param {string} value - La valeur de l'élément d'entrée à valider.
 */
const checkRegexPrice = (input, value) => {
    if (value != '') {
        if (regexPrice.test(value)) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }        
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
    }
}

/**
 * Vérifie l'état des entrées et active ou désactive le bouton de soumission en conséquence.
 * Si toutes les entrées sont valides, le bouton est activé.
 * Sinon, il est désactivé.
 */
const checkButton = () => {
    if (productName.classList.contains('is-valid')) {
        const inputs = document.querySelectorAll('input');
        isOk = true;
        inputs.forEach(input => {
            if (input.classList.contains('is-invalid')) {
                isOk = false;
            }
        });
        if (isOk) {
            button.removeAttribute('disabled');
        } else {
            button.setAttribute('disabled', '');
        }
    } else {
        button.setAttribute('disabled', '');
    }
}

// ###########################################  Écouteurs d'évènements  ###########################################
productName.addEventListener('keyup', (e) => {
    checkRegexName(e.target, e.target.value);
    checkButton();
    if (productName.classList.contains('is-valid')) {
        errorName.classList.add('d-none');
    } else if (productName.value != ''){
        errorName.classList.remove('d-none');
    } else {
        errorName.classList.add('d-none');
    }
});

description.addEventListener('keyup', (e) => {
    checkRegexDescription(e.target, e.target.value);
    checkRegexName(productName, productName.value);
    checkButton();
    if (description.classList.contains('is-valid')) {
        errorDescription.classList.add('d-none');
    } else if (description.value != ''){
        errorDescription.classList.remove('d-none');
    } else {
        errorDescription.classList.add('d-none');
    }
});

price.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
    checkRegexName(productName, productName.value);
    checkButton();
    if (price.classList.contains('is-valid')) {
        errorPrice.classList.add('d-none');
    } else if (price.value != ''){
        errorPrice.classList.remove('d-none');
    } else {
        errorPrice.classList.add('d-none');
    }
});

pint.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
    checkRegexName(productName, productName.value);
    checkButton();
    if (pint.classList.contains('is-valid')) {
        errorPint.classList.add('d-none');
    } else if (pint.value != ''){
        errorPint.classList.remove('d-none');
    } else {
        errorPint.classList.add('d-none');
    }
});

happy.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
    checkRegexName(productName, productName.value);
    checkButton();
    if (happy.classList.contains('is-valid')) {
        errorHappy.classList.add('d-none');
    } else if (happy.value != ''){
        errorHappy.classList.remove('d-none');
    } else {
        errorHappy.classList.add('d-none');
    }
});

bottle.addEventListener('keyup', (e) => {
    checkRegexPrice(e.target, e.target.value);
    checkRegexName(productName, productName.value);
    checkButton();
    if (bottle.classList.contains('is-valid')) {
        errorBottle.classList.add('d-none');
    } else if (bottle.value != ''){
        errorBottle.classList.remove('d-none');
    } else {
        errorBottle.classList.add('d-none');
    }
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
    }, { threshold: 1.0 }); // ###########################################  1.0 signifie que 100% de l'élément doit être visible

    var target = document.getElementById('logo');
    observer.observe(target);
});
