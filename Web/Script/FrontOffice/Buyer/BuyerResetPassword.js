$(document).ready(function () {

    $("nav").hide();

    get(
        '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerResetPassword.php',
        { resetCode: new URLSearchParams(window.location.search).get('code') }
    );

    $(`#form-buyer-reset-password`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerResetPassword.php',
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

