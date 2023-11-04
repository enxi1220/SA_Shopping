$(document).ready(function () {
    $(`#form-buyer-login`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerLogin.php',
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

