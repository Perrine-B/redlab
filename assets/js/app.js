const app = {

    init: function() {
        // Allows mobile menu opening
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('#' + burger.dataset.target);

        burger.addEventListener('click', function() {
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });

        // Allows search menu opening
        const dropdown = document.querySelector('#dropdown');
        const close = document.querySelector('.delete');

        dropdown.addEventListener('click', function(event) {
            dropdown.classList.add('is-active');
            event.stopPropagation();
            console.log("STOP.");
            event.preventDefault();
        });
        close.addEventListener('click', function() {
            dropdown.classList.remove('is-active');
            console.log("Oui.");
        });

    }
};


document.addEventListener('DOMContentLoaded', app.init);