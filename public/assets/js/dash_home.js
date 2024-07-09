document.addEventListener('DOMContentLoaded', () => {
    const main = document.querySelector('main');
    const subTitles = main.querySelectorAll('h2');
    subTitles.forEach(subTitle => {
        subTitle.scrollIntoView();        
    });
    const table = main.querySelector('table');
    table.scrollIntoView();
})