const app = {

    init: function() {
        // Allows mobile menu opening

        const burger = document.querySelector('.burger');
        const nav = document.querySelector('#' + burger.dataset.target);

        burger.addEventListener('click', function() {
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });

    }
};


document.addEventListener('DOMContentLoaded', app.init);