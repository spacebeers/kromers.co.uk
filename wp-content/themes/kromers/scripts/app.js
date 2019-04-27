jQuery(document).ready(function () {
    var header = document.querySelector("#header");
    var $window = jQuery(window);

    var nav = document.querySelector('#nav');
    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })

    var close = document.querySelector('#close');
    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })

    jQuery(window).scroll(function () {
        if (jQuery(document).scrollTop() > 45) {
            jQuery('#header').addClass('stuck');
        } else {
            jQuery('#header').removeClass('stuck');
        }
    });
});