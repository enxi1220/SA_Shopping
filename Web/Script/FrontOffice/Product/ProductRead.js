$(document).ready(function() {
    backToTop();
    
});

function backToTop(){
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            $('#btn-back-to-top').removeClass('d-none').addClass('d-block');
        } else {
            $('#btn-back-to-top').removeClass('d-block').addClass('d-none');
        }
    });

    $('#btn-back-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1);
    });
}