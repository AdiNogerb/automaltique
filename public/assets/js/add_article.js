// ###########################################  Déclaration des constantes  ###########################################
const regexTitle = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ0-9\-\/\.\(\)\° ]{1,50}$/;
const title = document.getElementById('title');
const errorTilte = document.getElementById('error-title');
const content = document.getElementById('content');
const errorContent = document.getElementById('error-content');
const picture = document.getElementById('picture');
const errorPicture = document.getElementById('error-picture');
const button = document.getElementById('button');
button.setAttribute('disabled', '');

let isOk = false;


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
const checkRegexTitle = () => {
    if (title.value != '') {
        if (regexTitle.test(title.value)) {
            title.classList.add('is-valid');
            title.classList.remove('is-invalid');
            errorTilte.classList.add('d-none');
        } else {
            title.classList.remove('is-valid');
            title.classList.add('is-invalid');
            errorTilte.classList.remove('d-none');
        }        
    } else {
        title.classList.remove('is-valid');
        title.classList.remove('is-invalid');
        errorTilte.classList.add('d-none');
    }
}

const checkContent = () => {
    if (content.value != '') {
        if (content.value.length >= 5 && content.value.length <= 1000) {
            content.classList.add('is-valid');
            content.classList.remove('is-invalid');
            errorContent.classList.add('d-none');
        } else {
            content.classList.remove('is-valid');
            content.classList.add('is-invalid');
            errorContent.classList.remove('d-none');
        }        
    } else {
        content.classList.remove('is-valid');
        content.classList.remove('is-invalid');
        errorContent.classList.add('d-none');
    }
}

const checkPicture = () => {
    if (picture.value != '') {
        value = picture.value.split('.').reverse();
        console.log(value[0]);
        if (value[0] === 'jpeg' || value[0] === 'jpg' || value[0] === 'png') {
            picture.classList.add('is-valid');
            picture.classList.remove('is-invalid');
            errorPicture.classList.add('d-none');
        } else {
            picture.classList.remove('is-valid');
            picture.classList.add('is-invalid');
            errorPicture.classList.remove('d-none');
        }        
    } else {
        picture.classList.remove('is-valid');
        picture.classList.remove('is-invalid');
        errorPicture.classList.add('d-none');
    }
}

/**
 * Vérifie l'état des entrées et active ou désactive le bouton de soumission en conséquence.
 * Si toutes les entrées sont valides, le bouton est activé.
 * Sinon, il est désactivé.
 */
const checkButton = () => {
    if (title.classList.contains('is-valid') && content.classList.contains('is-valid') && picture.classList.contains('is-valid')) {
        isOk = true;
    }
    if (isOk) {
        button.removeAttribute('disabled');
    } else {
        button.setAttribute('disabled', '');
    }
}


// ###########################################  Écouteurs d'évènements  ###########################################
title.addEventListener('input', () => {
    checkRegexTitle();
    checkButton();
})

content.addEventListener('input', () => {
    checkContent();
    checkButton();
})

picture.addEventListener('input', () => {
    checkPicture();
    checkButton();
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
    }, { threshold: 1.0 }); // ###########################################  1.0 signifie que 100% de l'élément doit être visible

    var target = document.getElementById('logo');
    observer.observe(target);
});
