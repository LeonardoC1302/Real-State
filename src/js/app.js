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
    const preference = window.matchMedia('(prefers-color-scheme: dark)');
    if (preference.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    // Read if the user changes the theme
    preference.addEventListener('change', () => {
        if (preference.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const darkMode = document.querySelector('.dark-mode-button');

    darkMode.addEventListener('click', () => {
        console.log('click');
        document.body.classList.toggle('dark-mode');
    });
}

// Make alert disappear
setTimeout(() => {
    const alert = document.querySelector('.alert.success');
    if (alert) {
        alert.remove();
    }
}, 5000); // 5 seconds