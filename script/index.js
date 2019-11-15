$(document).ready(function () {
    $('.footer__iconBox').hover(inn, outt);

    function inn() {
        $(this).find('path').css('fill', '#000');

    }

    function outt() {
        $(this).find('path').css('fill', '#fff')
    }

    $('.nav__toggleBtn').click(function () {
        $('.nav__wrapper').toggleClass('nav__wrapper--toggle');
        $('.nav__toggleBtn span').toggleClass('active')

    })
});

const contact = document.querySelector('.contact')
if (contact) {
    grecaptcha.ready(function () {
        grecaptcha.execute('6LeAuYwUAAAAAIC8y9Muv1v0Z-psHBPmXfRWXi7v', {
            action: 'action_name'
        })
            .then(function (token) {
                // Verify the token on the server.
            });
    });
} 