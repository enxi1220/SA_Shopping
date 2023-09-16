$(document).ready(function () {
    get(
        '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerRead.php',
        {},
        function (success) {
            seller = JSON.parse(success);
            renderBuyer(seller);
        }
    );
});

function renderBuyer(seller){
    $('#lbl-created-date').text(seller.createdDate);
    $('#txt-name').val(seller.name);
    $('#txt-email').val(seller.email);
    $('#txt-phone').val(seller.phone);
    $('#txt-store-name').val(seller.storeName);
    $('#txt-store-desc').val(seller.storeDesc);
    $('#txt-business-address').val(seller.businessAddress);

}