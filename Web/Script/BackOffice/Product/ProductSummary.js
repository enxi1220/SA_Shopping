$(document).ready(function () {
    get(
        '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductSummary.php',
        {},
        function (success) {
            products = JSON.parse(success);
            renderProducts(products);
        }
    );
});

function renderProducts(products) {
    $('#product-summary').DataTable({
        order: [0, 'desc'],
        data: products,
        columns:
            [
                { data: "productNo" },
                { data: "name" },
                { data: "price" },
                { data: "status" },
                { data: "createdDate" },
                { data: "updatedDate" },
                {
                    render: function (data, type, row, meta) {
                        var html = `
                            <a class="btn btn-secondary btn-floating" title="View" href="ProductRead.php?productId=${row.productId}" role="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-secondary btn-floating" title="Update" href="ProductUpdate.php?productId=${row.productId}" role="button">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-secondary btn-floating" title="Update image" href="ProductImageCreateDelete.php?productId=${row.productId}"" role="button">
                                <i class="far fa-image"></i>
                            </a>
                            <a class="btn btn-secondary btn-floating" title="View reviews" href="../Review/ReviewSummary.php?productId=${row.productId}"" role="button">
                                <i class="fas fa-comments"></i>
                            </a>`;

                            switch (row.status) {
                                case ProductStatus.Inactive:
                                    html += `
                                    <button type="button" class="btn btn-secondary btn-floating" title="${ProductStatus.Active}" onclick="activateProduct('${row.productId}')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    `;
                                    break;
                                case ProductStatus.Active:
                                    html += `
                                    <button type="button" class="btn btn-secondary btn-floating" title="${ProductStatus.Inactive}" onclick="deactivateProduct('${row.productId}')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    `;
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

function deactivateProduct(productId){

    $(`#modal-product-deactivate`).modal('show');

    $(`#btn-product-deactivate`).click(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductDeactivate.php',
            [
                submitData('product',
                    JSON.stringify({
                        productId: productId
                    }))
            ],
            null,
            function () {
                location.reload();
            }
        );
        $(`#modal-product-deactivate`).modal('hide');
    });
}

function activateProduct(productId){

    $(`#modal-product-activate`).modal('show');

    $(`#btn-product-activate`).click(function (event) {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductActivate.php',
            [
                submitData('product',
                    JSON.stringify({
                        productId: productId
                    }))
            ],
            null,
            function () {
                location.reload();
            }
        );
        $(`#modal-product-activate`).modal('hide');
    });
}