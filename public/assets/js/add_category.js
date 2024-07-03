// Déclarations des constantes
const regex = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ\-\' ]{1,50}$/;
const input = document.getElementById('category');
const error = document.getElementById('error');
const button = document.getElementById('button');
const categories = [];


// Définition des fonctions
/**
 * Vérifie si la valeur saisie correspond au format de la regex.
 * Si la valeur est valide, ajoute les classes CSS appropriées et active le bouton.
 * Si la valeur est invalide, affiche un message d'erreur et désactive le bouton.
 *
 * @param {string} value - La valeur à vérifier par rapport à la regex.
 */
const checkRegex = (value) => {
    if (value != '') {
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
    } else {
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');
        error.innerHTML = '';
        error.classList.add('d-none');
        button.setAttribute('disabled', '');
    }
}

/**
 * Vérifie si la valeur saisie existe déjà dans la liste des catégories.
 * Si la valeur existe, affiche un message d'erreur et désactive le bouton.
 *
 * @param {string} value - La valeur à vérifier dans la liste des catégories.
 */
const checkCategories = (value) => {
    if (categories.includes(value)) {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        error.innerHTML = 'Le nom de catégorie existe déjà';
        error.classList.remove('d-none');
        button.setAttribute('disabled', '');
    }
}


// Écouteurs d'Évènements
input.addEventListener('keyup', (e) => {
    checkRegex(e.target.value);
    checkCategories(e.target.value);
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

document.addEventListener('DOMContentLoaded', () => {
    fetch('/helpers/ajaxCategories.php')
    .then(response => response.json())
    .then(categoriesJson => {
        categoriesJson.forEach(category => {
            categories.push(category.name);
        });
    })
});
