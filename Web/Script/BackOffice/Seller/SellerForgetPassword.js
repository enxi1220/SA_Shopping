$(document).ready(function () {
    
    $("header").hide();

    $(`#form-seller-forget-password`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerForgetPassword.php',
            [
                submitData('seller',
                    JSON.stringify({
                        email: $('#txt-email').val()
                    }))
            ]
        );
    });
});

