jQuery(document).ready(function () {
    var header = document.querySelector("#header");
    var $window = jQuery(window);
    var $document = jQuery(document);
    var nav = document.querySelector('#nav');
    var close = document.querySelector('#close');

    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })


    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })

    var headCheck = function () {
        if ($document.scrollTop() > 45) {
            jQuery('#header').addClass('stuck');
        } else {
            jQuery('#header').removeClass('stuck');
        }
    }

    headCheck()

    jQuery(window).scroll(function () {
        headCheck()

        if ($document.scrollTop() > 150) {
            jQuery('body').addClass('scrolled');
        } else {
            jQuery('body').removeClass('scrolled');
        }
    });

    var containerEl = document.querySelector('.mixer');
    if (containerEl) {
        var mixer = mixitup(containerEl, {
            pagination: {
                limit: 6,
                hidePageListIfSinglePage: true
            },
            controls: {
                toggleDefault: 'none'
            }
        });
    }
});