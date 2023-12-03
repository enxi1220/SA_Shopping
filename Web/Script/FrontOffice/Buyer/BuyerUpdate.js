$(document).ready(function () {

    $(`#form-buyer-edit`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlBuyer/BuyerUpdate.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        phone: $('#txt-phone-edit').val(),
                        name: $('#txt-name-edit').val(),
                        deliveryAddress: $('#txt-delivery-address-edit').val()
                    }))
            ],
            null,
            function () {
                location.reload();
            }
        );
    });
});