/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';


function handleModal() {
    var modal = document.getElementById("myModal");

    this.openModal = function() {
        modal.classList.remove("hidden");
    }

    this.closeModal = function() {
        modal.classList.add("hidden");
    }
}

var modalHandler = new handleModal();

document.addEventListener('DOMContentLoaded', function () {

    var btns = document.querySelectorAll('.btn.btn-outline.btn-error');
    btns.forEach(function(btn) {
        btn.addEventListener('click', modalHandler.openModal);
    });


    var closeButton = document.querySelector('.close-button');
    closeButton.addEventListener('click', modalHandler.closeModal);

    var cancelButton = document.querySelector('.btn.btn-outline.btn-primary');
    cancelButton.addEventListener('click', modalHandler.closeModal);
});