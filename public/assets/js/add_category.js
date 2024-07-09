// Déclarations des constantes
const regex = /^(?=.*[A-Za-zÀ-ÖØ-öø-ÿ])[A-Za-zÀ-ÖØ-öø-ÿ\-\' ]{1,50}$/;
const categories = [];
const input = document.getElementById('category');
const error = document.getElementById('error');
const button = document.getElementById('button');
button.setAttribute('disabled', '');


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

document.addEventListener('DOMContentLoaded', () => {
    fetch('/helpers/ajaxCategories.php')
    .then(response => response.json())
    .then(categoriesJson => {
        categoriesJson.forEach(category => {
            categories.push(category.name);
        });
    })
    const main = document.querySelector('main');
    const title = main.querySelector('h2');
    title.scrollIntoView();
});
