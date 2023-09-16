$(document).ready(function () {
    $(`#form-buyer-create`).submit(function (event){
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerCreate.php',
            [
                submitData('buyer', preparePostData())
            ],
            null,
            function () {
                location.href = "/SA_Shopping/Web/View/FrontOffice/Buyer/BuyerLogin.php";
            }
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

