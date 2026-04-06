$('.left-anim').each(function (i, element) {
    setTimeout(function () {
        $(element).addClass('animated');
    }, i * 100);
});