var productDetailId = new URLSearchParams(window.location.search).get('productDetailId');
var quantity = new URLSearchParams(window.location.search).get('quantity');

$(document).ready(function () {

    get(
        baseUrl + 'FrontOffice/CtrlOrder/OrderCreate.php',
        {
            productDetailId: productDetailId,
            quantity: quantity
        },
        function (success) {
            console.log(success);
            order = JSON.parse(success);
            renderOrder(order);
            enhanceUI();
        }
    );

    $(`#form-order-create`).submit(function (event) {
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlOrder/OrderCreate.php',
            [
                submitData('order', preparePostData())
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
        paymentMethod: $("button[type=submit]:focus").val(),
        deliveryAddress: $('#txt-delivery-address').val(),
        productDetailId: productDetailId,
        quantity: quantity
    });

    return data;
}

function renderOrder(order) {
    $('#txt-quantity').text(order.quantity);
    $('#img-product').attr('src', order.product.productImage.imageName);
    $('#txt-product-name').text(order.product.name);
    $('#txt-product-size').text(order.product.productDetail.size);
    $('#txt-product-color').text(order.product.productDetail.color);
    $('#txt-product-material').text(order.product.productDetail.material);
    $('#txt-unit-price').text(order.product.price);
    $('#txt-delivery-address').val(order.buyer.deliveryAddress);
    $('#txt-delivery-fee').text(order.deliveryFee);

    $("#link-product-detail").attr("href", $("#link-product-detail").attr("href") + order.product.productId);

    calculation(order);
}

function calculation(order) {
    var quantity = parseInt(order.quantity);
    var price = parseFloat(order.product.price);
    var deliveryFee = parseFloat(order.deliveryFee);

    $('#txt-price').text(quantity * price);
    var total = (quantity * price) + deliveryFee;
    $('#txt-total-price').text(total.toFixed(2));
}

function enhanceUI() {
    $(`#txt-delivery-address`).focus();

    $("#txt-card-number").on("input", function () {
        const cardNumber = $(this).val().replace(/\s/g, '');
        const formattedCardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');

        $(this).val(formattedCardNumber);
    });

    $("#txt-expiry-date").on("input", function () {
        const expiryDate = $(this).val().replace(/\//g, '');
        const formattedExpiryDate = expiryDate.replace(/(\d{2})(?=\d)/g, '$1/');

        $(this).val(formattedExpiryDate);
    });

    $('.tab-pane').on('click', function () {
        // if choosing card method
        if ($(`#pills-card`).hasClass('active')) {
            $('#txt-card-number').attr('required', true);
            $('#txt-cvv').attr('required', true);
            $('#txt-expiry-date').attr('required', true);
        } else {
            $('#txt-card-number').removeAttr('required');
            $('#txt-cvv').removeAttr('required');
            $('#txt-expiry-date').removeAttr('required');
        }
    });
}