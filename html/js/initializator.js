$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        items: 5,
        responsive : {
            480 : {
                items: 1,
            },
            768 : {
                items: 3,
            },
            1200 : {
                items: 5,
            }
        }
    });
});

$(document).ready(function(e) {
    // live handler
    lc_lightbox('.elem', {
        wrap_class: 'lcl_fade_oc',
        gallery: true,
        thumb_attr: 'data-lcl-thumb',
        skin: 'minimal',
        radius: 0,
        padding: 0,
        border_w: 0,
    });
});

new WOW().init();