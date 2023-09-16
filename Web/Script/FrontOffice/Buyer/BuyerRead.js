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
    $('#lbl-created-date').text(buyer.createdDate);
    $('#txt-name').val(buyer.name);
    $('#txt-email').val(buyer.email);
    $('#txt-phone').val(buyer.phone);
    $('#txt-delivery-address').val(buyer.deliveryAddress);
    $('#txt-name-edit').val(buyer.name);
    $('#txt-phone-edit').val(buyer.phone);
    $('#txt-delivery-address-edit').val(buyer.deliveryAddress);
}