$(document).ready(function () {
    
    $("header").hide();

    $(`#form-seller-login`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'BackOffice/CtrlSeller/SellerLogin.php',
            [
                submitData('seller',
                    JSON.stringify({
                        email: $('#txt-email').val(),
                        password: $('#txt-password').val()
                    }))
            ]
        );
    });
});

