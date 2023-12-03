$(document).ready(function () {
    $("nav").hide();
    $(`#form-buyer-create`).submit(function (event){
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlBuyer/BuyerCreate.php',
            [
                submitData('buyer', preparePostData())
            ]
        );
    });
});

function preparePostData() {
    var data = JSON.stringify({
        email: $('#txt-email').val(),
        phone: $('#txt-phone').val(),
        name: $('#txt-name').val(),
        password: $('#txt-password').val(),
        deliveryAddress: $('#txt-delivery-address').val()
    });
    return data;
}

