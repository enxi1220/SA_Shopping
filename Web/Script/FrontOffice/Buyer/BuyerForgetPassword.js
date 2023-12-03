$(document).ready(function () {
    
    $("nav").hide();

    $(`#form-buyer-forget-password`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlBuyer/BuyerForgetPassword.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        email: $('#txt-email').val()
                    }))
            ]
        );
    });
});

