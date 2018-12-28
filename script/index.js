$(document).ready(function () {
    $('.footer__iconBox').hover(inn, outt);

    function inn() {
        $(this).find('path').css('fill', '#000');

    }

    function outt() {
        $(this).find('path').css('fill', '#fff')
    }
    
        $('.nav__toggleBtn').click(function(){
        $('.nav__wrapper').toggleClass('nav__wrapper--toggle');
        $('.nav__toggleBtn span').toggleClass('active')
            
        })
    


});


