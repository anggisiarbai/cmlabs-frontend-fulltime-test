$('.top-anim').each(function (i, element) {
    setTimeout(function () {
        $(element).addClass('animated');
    }, i * 50);
});