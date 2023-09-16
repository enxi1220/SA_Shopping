$(document).ready(function () {
    // get(
    //     '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerUpdate.php',
    //     {},
    //     function (success) {
    //         buyer = JSON.parse(success);
    //         renderBuyer(buyer);
    //     }
    // );

    $(`#form-buyer-edit`).submit(function (event){
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/FrontOffice/CtrlBuyer/BuyerUpdate.php',
            [
                submitData('buyer', preparePostData())
            ],
            null,
            function () {
                location.reload();
            }
        );
    });
});

// function renderBuyer(buyer){
//     $('#txt-name-edit').val(buyer.name);
//     $('#txt-phone-edit').val(buyer.name);
//     $('#txt-delivery-address-edit').val(buyer.deliveryAddress);
// }

function preparePostData() {
    var data = JSON.stringify({
        phone: $('#txt-phone-edit').val(),
        name: $('#txt-name-edit').val(),
        deliveryAddress: $('#txt-delivery-address-edit').val()
    });
    return data;
}