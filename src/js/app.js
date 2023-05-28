document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', responsiveMenu);
}

function responsiveMenu() {
    const navigation = document.querySelector('.navigation');
    navigation.classList.toggle('show'); // toggle: si tiene la clase la quita, si no la tiene la agrega
}