const toggle = document.querySelector('.nav-toggle');
const navMenu = document.querySelector('.menu-navegacion')

toggle.addEventListener('click', () => {
    navMenu.classList.toggle('menu-visible');
    document.querySelector('html').style.overflow = 'hidden';
})