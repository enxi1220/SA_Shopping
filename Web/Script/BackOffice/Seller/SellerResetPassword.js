$(document).ready(function () {

    $("header").hide();

    get(
        '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerResetPassword.php',
        { resetCode: new URLSearchParams(window.location.search).get('code') }
    );

    $(`#form-seller-reset-password`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerResetPassword.php',
            [
                submitData('seller',
                    JSON.stringify({
                        resetCode: new URLSearchParams(window.location.search).get('code'),
                        password: $('#txt-password').val()
                    }))
            ]
        );
    });
});

