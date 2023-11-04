$(document).ready(function () {
    $(`#form-seller-create`).submit(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerCreate.php',
            [
                submitData('seller',
                    JSON.stringify({
                        email: $('#txt-email').val(),
                        phone: $('#txt-phone').val(),
                        name: $('#txt-name').val(),
                        password: $('#txt-password').val(),
                        businessAddress: $('#txt-business-address').val(),
                        storeName: $('#txt-store-name').val(),
                        storeDesc: $('#txt-store-desc').val()
                    }))
            ]
        );
    });
});

