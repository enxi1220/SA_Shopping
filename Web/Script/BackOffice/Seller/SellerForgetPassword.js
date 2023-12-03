$(document).ready(function () {
    
    $("header").hide();

    $(`#form-seller-forget-password`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'BackOffice/CtrlSeller/SellerForgetPassword.php',
            [
                submitData('seller',
                    JSON.stringify({
                        email: $('#txt-email').val()
                    }))
            ]
        );
    });
});

