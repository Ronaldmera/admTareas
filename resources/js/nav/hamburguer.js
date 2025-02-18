const hamburguer = document.querySelector('.hamburguer');
const enlaces = document.querySelector('#nav-links');

hamburguer.addEventListener('click', () => {
    enlaces.classList.toggle('show');

});
