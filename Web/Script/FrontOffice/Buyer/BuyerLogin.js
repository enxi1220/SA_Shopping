$(document).ready(function () {
    $(`#form-buyer-login`).submit(function (event){
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerLogin.php',
            [
                submitData('buyer', preparePostData())
            ],
            null,
            function () {
                location.href = "/SA_Shopping/Web/View/FrontOffice/Product/ProductSummary.php";
            }
        );
    });
});

function preparePostData() {
    var data = JSON.stringify({
        email: $('#txt-email').val(),
        password: $('#txt-password').val()
    });
    return data;
}

