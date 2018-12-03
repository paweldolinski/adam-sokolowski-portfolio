$(document).ready(function () {
    $('.footer__iconBox').hover(inn, outt);

    function inn() {
        $(this).find('path').css('fill', '#000');

    }

    function outt() {
        $(this).find('path').css('fill', '#fff')
    }


});


