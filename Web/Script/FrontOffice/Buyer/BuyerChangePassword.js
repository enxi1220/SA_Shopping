$(document).ready(function () {

    $(`#form-buyer-change-password`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerChangePassword.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        currentPassword: $('#txt-current-password').val(),
                        password: $('#txt-password').val()
                    }))
            ],
            null,
            function () {
                location.reload();
            }
        );
    });
});