$(document).ready(function () {

    $("header").hide();

    get(
        baseUrl + 'BackOffice/CtrlSeller/SellerResetPassword.php',
        { resetCode: new URLSearchParams(window.location.search).get('code') }
    );

    $(`#form-seller-reset-password`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'BackOffice/CtrlSeller/SellerResetPassword.php',
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

