var orders;

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

function writeReview(orderId) {
    $('#modal-review').modal('show');
    $("#txt-review").focus();
    
    var url = '';
    
    const selectedOrder = orders.filter(detail => detail.orderId == orderId);
    if(selectedOrder.status = OrderStatus.Review){
        url = '/SA_Shopping/Controller/FrontOffice/CtrlReview/ReviewCreate.php';
    }else if (selectedOrder.status = OrderStatus.Closed){
        url = '/SA_Shopping/Controller/FrontOffice/CtrlReview/ReviewUpdate.php';
    }

    console.log('a');

    $(`#form-review-create`).submit(function (event) {
        event.preventDefault();
        console.log('b');
        post(
            url,
            [
                submitData('review', preparePostData(orderId))
            ],
            null,
            function () {
                $('#modal-review').modal('hide');
                location.reload();
            }
        );
        // todo: post, success only hide;
        // $('#modal-review').modal('hide');
    });
}

function preparePostData(orderId) {
    var review = JSON.stringify({
        orderId: orderId,
        reviewText: $('#txt-review').val()
    });

    return review;
}

function renderOrders(orders) {
    $('#v-tabs-confirm-tab').text(OrderStatus.Confirm);
    $('#v-tabs-ship-tab').text(OrderStatus.Ship);
    $('#v-tabs-deliver-tab').text(OrderStatus.Deliver);
    $('#v-tabs-review-tab').text(OrderStatus.Review);
    $('#v-tabs-closed-tab').text(OrderStatus.Closed);
    orders.forEach(element => {
        var html = `
            <div class="p-3 mb-4 bg-white shadow-3">
                <h3 class="lead pb-2 fw-bold d-flex justify-content-between">
                    <label>Order No</label>
                    <label class="fw-normal" id="txt-order-no">${element.orderNo}<span class="ms-2 text-primary text-decoration-underline" onclick="copyToClipboard('${element.orderNo}')">Copy</span></label>
                </h3>
                <a href="../Product/ProductRead.php?productId=${element.product.productId}" class="text-reset">
                    <div class="alert alert-light p-3 my-2 lead fs-6 hover-shadow">
                        <span id="txt-product-name" class="fs-5">${element.product.name}</span>
                        <span id="txt-product-size-color-material" class="text-capitalize">${element.product.productDetail.size} - ${element.product.productDetail.color} - ${element.product.productDetail.material}</span>
                        <div class="d-flex justify-content-between">
                            <label><span id="txt-quantity">${element.quantity}</span> item(s)</label>
                            <label>RM <span id="txt-price">${element.product.price}</span></label>
                        </div>
                    </div>
                </a>
                <div class="fw-bold mt-3">RM <span id="txt-total-price">${element.totalPrice}</span></div>
                <div> Pay by 
                    <span id="txt-payment-method">${element.paymentMethod}</span>
                </div>
                <div>Deliver to
                    <span id="txt-delivery-address">${element.deliveryAddress}</span>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div class="text-muted">Purchased on <span id="txt-order-date">${element.createdDate}</span></div>
                    <button type="button" class="btn btn-outline-primary ms-2 ${element.status == OrderStatus.Closed || element.status == OrderStatus.Review ? 'd-block' : 'd-none'}" onclick="writeReview(${element.orderId})">review</button>
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