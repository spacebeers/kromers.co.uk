jQuery(document).ready(function () {
    var header = document.querySelector("#header");

    var nav = document.querySelector('#nav');
    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })

    var close = document.querySelector('#close');
    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })
});
