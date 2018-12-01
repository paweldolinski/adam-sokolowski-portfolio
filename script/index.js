$(document).ready(function () {
    $('.footer__iconBox').hover(inn, outt);

    function inn() {
        $(this).find('path').css('fill', '#000');

    }

    function outt() {
        $(this).find('path').css('fill', '#fff')
    }


});

$(document).ready(function () {
    $('.slick').slick({
        //autoplay: true,
        autoplaySpeed: 2000,
        fade: true,
        arrows: true,

    });
});
