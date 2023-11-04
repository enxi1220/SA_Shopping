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
                        <a role="button" class="btn btn-dark btn-floating" title="View" href="OrderRead.php?orderId=${row.orderId}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button type="button" id="btn-confirm" class="btn btn-success btn-floating" title="Confirm">
                            <i class="fas fa-check"></i>
                        </button>
                        <button type="button" id="btn-ship" class="btn btn-primary btn-floating" title="Ship">
                            <i class="fas fa-box"></i>
                        </button>
                        <button type="button" id="btn-deliver" class="btn btn-warning btn-floating" title="Deliver">
                            <i class="fas fa-truck"></i>
                        </button>
                    `;

                        return html;
                    },
                    orderable: false
                }
            ]
    });
}