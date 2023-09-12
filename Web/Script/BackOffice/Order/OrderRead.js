$(document).ready(function () {
    var orderId = new URLSearchParams(window.location.search).get('orderId');

    if (orderId) {
        get(
            '/SA_Shopping/Controller/BackOffice/CtrlOrder/OrderRead.php',
            { orderId: new URLSearchParams(window.location.search).get('orderId') },
            function (success) {
                console.log(success);
                order = JSON.parse(success);
                renderOrder(order);
            }
        );
    }

});

function renderOrder(order) {
    $('#txt-order-no').val(order.orderNo);
    $('#txt-status').val(order.status);
    $('#txt-total-price').val(order.totalPrice);
    $('#txt-delivery-fee').val(order.deliveryFee);
    $('#txt-created-date').val(order.createdDate);
    $('#txt-updated-date').val(order.updatedDate);
    $('#txt-delivery-address').val(order.deliveryAddress);
    $('#txt-product-name').val(order.productName);
    $('#txt-price').val(order.price);
    $('#txt-quantity').val(order.quantity);
    $('#txt-product-size').val(order.size);
    $('#txt-product-color').val(order.color);
    $('#txt-product-material').val(order.material);
    $('#txt-buyer-name').val(order.buyerName);
    $('#txt-buyer-phone').val(order.buyerPhone);
    $('#txt-buyer-email').val(order.buyerEmail);
}