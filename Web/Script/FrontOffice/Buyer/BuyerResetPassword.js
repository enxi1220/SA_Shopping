$(document).ready(function () {

    $("nav").hide();

    get(
        baseUrl + 'FrontOffice/CtrlBuyer/BuyerResetPassword.php',
        { resetCode: new URLSearchParams(window.location.search).get('code') }
    );

    $(`#form-buyer-reset-password`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlBuyer/BuyerResetPassword.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        resetCode: new URLSearchParams(window.location.search).get('code'),
                        password: $('#txt-password').val()
                    }))
            ]
        );
    });
});

