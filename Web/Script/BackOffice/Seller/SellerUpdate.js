$(document).ready(function () {

    $(`#form-seller-edit`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'BackOffice/CtrlSeller/SellerUpdate.php',
            [
                submitData('seller',
                    JSON.stringify({
                        phone: $('#txt-phone-edit').val(),
                        name: $('#txt-name-edit').val(),
                        businessAddress: $('#txt-business-address-edit').val(),
                        storeName: $('#txt-store-name-edit').val(),
                        storeDesc: $('#txt-store-desc-edit').val()
                    }))
            ],
            null,
            function () {
                location.reload();
            }
        );
    });
});