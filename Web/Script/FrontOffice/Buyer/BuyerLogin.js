$(document).ready(function () {
    $("nav").hide();
    $(`#form-buyer-login`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlBuyer/BuyerLogin.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        email: $('#txt-email').val(),
                        password: $('#txt-password').val()
                    }))
            ]
        );
    });
});

