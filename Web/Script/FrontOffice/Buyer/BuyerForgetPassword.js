$(document).ready(function () {
    
    $("nav").hide();

    $(`#form-buyer-forget-password`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerForgetPassword.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        email: $('#txt-email').val()
                    }))
            ]
        );
    });
});

