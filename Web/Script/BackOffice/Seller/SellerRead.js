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
    $('#txt-name-edit').val(seller.name);
    $('#txt-phone-edit').val(seller.phone);
    $('#txt-store-name-edit').val(seller.storeName);
    $('#txt-store-desc-edit').val(seller.storeDesc);
    $('#txt-business-address-edit').val(seller.businessAddress);


}