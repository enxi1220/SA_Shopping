$(document).ready(function () {
    backToTop();

    get(
        '/SA_Shopping/Controller/FrontOffice/CtrlOrder/OrderSummary.php',
        {},
        function (success) {
            orders = JSON.parse(success);
            renderOrders(orders);
        }
    );
});

// function writeReview(orderId){
//     $('#modal-review').show();
//     $("#txt-review").focus();
//     $(`#form-review-create`).submit(function (event) {
//         // event.preventDefault();
//         if (!$(`#form-review-create`)[0].checkValidity()) {
//             return;
//         }

//         // todo: post;
//         $('#modal-review').hide();
//     });
// }

function renderOrders(orders) {
    orders.forEach(element => {
        var html = `
            <div class="p-3 mb-4 bg-white shadow-3">
                <h3 class="lead pb-2 fw-bold d-flex justify-content-between">
                    <label>Order No</label>
                    <label class="fw-normal" id="txt-order-no">${element.orderNo}<span class="ms-2 text-primary text-decoration-underline" onclick="copyToClipboard('${element.orderNo}')">Copy</span></label>
                </h3>
                <a href="../Product/ProductRead.php?productId=${element.productId}" class="text-reset">
                    <div class="alert alert-light p-3 my-2 lead fs-6 hover-shadow">
                        <span id="txt-product-name" class="fs-5">${element.productName}</span>
                        <span id="txt-product-size-color-material" class="text-capitalize">${element.size} - ${element.color} - ${element.material}</span>
                        <div class="d-flex justify-content-between">
                            <label><span id="txt-quantity">${element.quantity}</span> item(s)</label>
                            <label>RM <span id="txt-price">${element.price}</span></label>
                        </div>
                    </div>
                </a>
                <div class="fw-bold mt-3">RM <span id="txt-total-price">${element.totalPrice}</span></div>
                <div>
                    <span id="txt-payment-method">$paymentMethod</span>
                </div>
                <div>Deliver to
                    <span id="txt-delivery-address">${element.deliveryAddress}</span>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div class="text-muted">Purchased on <span id="txt-order-date">${element.createdDate}</span></div>
                    <button type="button" class="btn btn-outline-primary ms-2" onclick="writeReview(${element.orderId})">review</button>
                </div>
            </div>
            `;

        switch (element.status) {
            case OrderStatus.Confirm:
                $('#confirm').append(html);
                break;
            case OrderStatus.Ship:
                $('#ship').append(html);
                break;
            case OrderStatus.Deliver:
                $('#deliver').append(html);
                break;
            case OrderStatus.Review:
                $('#review').append(html);
                break;
            case OrderStatus.Closed:
                $('#closed').append(html);
                break;
            default:
                break;
        }
    });
}