$(document).ready(function () {
    get(
        '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerRead.php',
        {},
        function (success) {
            buyer = JSON.parse(success);
            renderBuyer(buyer);
        }
    );
});

function renderBuyer(buyer){
    $('#txt-name').val(buyer.name);
    $('#txt-email').val(buyer.email);
    $('#txt-delivery-address').val(buyer.deliveryAddress);

}