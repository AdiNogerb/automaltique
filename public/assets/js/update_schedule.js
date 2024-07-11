const openedHour = document.getElementById('opened');
const closedHour = document.getElementById('closed');
const errorOpen = document.getElementById('error-open');
const happy_start = document.getElementById('happy_start');
const happy_end = document.getElementById('happy_end');
const errorHappy = document.getElementById('error-happy');
const inputs = document.querySelectorAll('input');
const button = document.getElementById('button');
button.setAttribute('disabled', '');


const check = () => {
    let count = 0;
    if (openedHour.value == '' || closedHour.value == '' || happy_start.value == '' || happy_end.value == '') {
        if (openedHour.value == '' && closedHour.value == '' && happy_start.value == '' && happy_end.value == '') {
            openedHour.classList.add('is-valid');
            openedHour.classList.remove('is-invalid');
            closedHour.classList.add('is-valid');
            closedHour.classList.remove('is-invalid');
            errorOpen.classList.add('d-none');
            errorOpen.innerHTML = '';
            happy_start.classList.add('is-valid');
            happy_start.classList.remove('is-invalid');
            happy_end.classList.add('is-valid');
            happy_end.classList.remove('is-invalid');
            errorHappy.classList.add('d-none');
            errorHappy.innerHTML = '';
        } else {
            openedHour.classList.remove('is-valid');
            openedHour.classList.add('is-invalid');
            closedHour.classList.remove('is-valid');
            closedHour.classList.add('is-invalid');
            errorOpen.classList.remove('d-none');
            errorOpen.innerHTML = 'Les horaires d\'ouverture et fermeture doivent être remplies toutes les deux ou vides toutes les deux si le bar est fermé';
            happy_start.classList.remove('is-valid');
            happy_start.classList.add('is-invalid');
            happy_end.classList.remove('is-valid');
            happy_end.classList.add('is-invalid');
            errorHappy.classList.remove('d-none');
            errorHappy.innerHTML = 'Les horaires de début et de fin d\'Happy doivent être remplies toutes les deux ou vides toutes les deux si le bar est fermé';
        }
    } else {
        if (openedHour.value !== closedHour.value) {
            openedHour.classList.add('is-valid');
            openedHour.classList.remove('is-invalid');
            closedHour.classList.add('is-valid');
            closedHour.classList.remove('is-invalid');
            errorOpen.classList.add('d-none');
            errorOpen.innerHTML = '';
        } else {
            openedHour.classList.remove('is-valid');
            openedHour.classList.add('is-invalid');
            closedHour.classList.remove('is-valid');
            closedHour.classList.add('is-invalid');
            errorOpen.classList.remove('d-none');
            errorOpen.innerHTML = 'Les horaires d\'ouverture et fermeture ne peuvent pas être identiques';
        }
        if (happy_start.value !== happy_end.value) {
            if (happy_start.value < happy_end.value && happy_start.value >= openedHour.value) {
                happy_start.classList.add('is-valid');
                happy_start.classList.remove('is-invalid');
                happy_end.classList.add('is-valid');
                happy_end.classList.remove('is-invalid');
                errorHappy.classList.add('d-none');
                errorHappy.innerHTML = '';
            } else {
                happy_start.classList.remove('is-valid');
                happy_start.classList.add('is-invalid');
                happy_end.classList.remove('is-valid');
                happy_end.classList.add('is-invalid');
                errorHappy.classList.remove('d-none');
                errorHappy.innerHTML = 'Le début de l\'Happy ne peut pas être après la fin de l\'Happy ou avant l\'ouverture du bar';
            }
        } else {
            happy_start.classList.remove('is-valid');
            happy_start.classList.add('is-invalid');
            happy_end.classList.remove('is-valid');
            happy_end.classList.add('is-invalid');
            errorHappy.classList.remove('d-none');
            errorHappy.innerHTML = 'Les horaires de début et de fin d\'Happy ne peuvent pas être identiques';   
        }
    }
    inputs.forEach(input => {
        if (input.classList.contains('is-valid')) {
            count++;
        }
    });
    if (count === 4) {
        button.removeAttribute('disabled');
    } else {
        button.setAttribute('disabled', '');
    }
}


inputs.forEach(input => {
    input.addEventListener('input', check);
});

document.addEventListener('DOMContentLoaded', () => {
    const title = document.querySelector('h2');
    title.scrollIntoView();
})