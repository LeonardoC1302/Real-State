document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
    darkMode();
});

// Responsive Menu
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', responsiveMenu);
}

function responsiveMenu() {
    const navigation = document.querySelector('.navigation');
    navigation.classList.toggle('show'); // toggle: si tiene la clase la quita, si no la tiene la agrega
}

// Dark Mode
function darkMode() {
    const darkMode = document.querySelector('.dark-mode-button');

    darkMode.addEventListener('click', () => {
        console.log('click');
        document.body.classList.toggle('dark-mode');
    });
}