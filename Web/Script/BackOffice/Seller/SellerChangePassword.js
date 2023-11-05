$(document).ready(function () {

    $(`#form-seller-change-password`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerChangePassword.php',
            [
                submitData('seller',
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