$(document).ready(function () {

    get(
        '/SA_Shopping/Controller/BackOffice/CtrlOrder/OrderSummary.php',
        {},
        function (success) {
            orders = JSON.parse(success);
            console.log(orders);
            renderOrders(orders);
        }
    );

});

function renderOrders(orders) {
    $('#order-summary').DataTable({
        order: [0, 'desc'],
        data: orders,
        columns:
            [
                { data: "orderNo" },
                { data: "product.name" },
                { data: "product.productDetail.productDetailNo" },
                { data: "status" },
                { data: "createdDate" },
                { data: "updatedDate" },
                {
                    render: function (data, type, row, meta) {
                        var html = `
                        <a role="button" class="btn btn-dark btn-floating me-1" title="View" href="OrderRead.php?orderId=${row.orderId}">
                            <i class="fas fa-eye"></i>
                        </a>`;
                        switch (row.status) {
                            case OrderStatus.Confirm:
                                html += 
                                    `<button type="button" id="btn-confirm" class="btn btn-success btn-floating" title="Confirm" onclick="updateOrder('${row.orderId}', '${OrderStatus.Confirm}')">
                                        <i class="fas fa-check"></i>
                                    </button>`;
                                break;
                            case OrderStatus.Ship:
                                html += 
                                    `<button type="button" id="btn-ship" class="btn btn-primary btn-floating" title="Ship" onclick="updateOrder('${row.orderId}', '${OrderStatus.Ship}')">
                                        <i class="fas fa-box"></i>
                                    </button>`;
                                break;
                            case OrderStatus.Deliver:
                                html += 
                                    `<button type="button" id="btn-deliver" class="btn btn-warning btn-floating" title="Deliver" onclick="updateOrder('${row.orderId}', '${OrderStatus.Deliver}')">
                                        <i class="fas fa-truck"></i>
                                    </button>`;
                                break;

                            default:
                                break;
                        }

                        return html;
                    },
                    orderable: false
                }
            ]
    });
}

function updateOrder(orderId, action) {

    $(`#lbl-action`).text(action);

    $(`#modal-order-update`).modal('show');

    $(`#btn-update-order`).click(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlOrder/OrderUpdate.php',
            [
                submitData('order',
                    JSON.stringify({
                        orderId: orderId,
                        action: action
                    }))
            ],
            null,
            function () {
                location.reload();
            }
        );
        $(`#modal-order-update`).modal('hide');
    });
}