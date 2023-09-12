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

                        return html;
                    },
                    orderable: false
                }
            ]
    });
}