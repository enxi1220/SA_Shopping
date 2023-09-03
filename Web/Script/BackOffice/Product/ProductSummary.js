$(document).ready(function () {
    // rm hardcode
    var products = [
        {
            productNo: 1,
            name: "Product 1",
            price: 10.99,
            createdDate: "2023-09-01",
            updatedDate: "2023-09-02",
            productId: 101 // Unique identifier
        },
        {
            productNo: 2,
            name: "Product 2",
            price: 19.99,
            createdDate: "2023-09-03",
            updatedDate: "2023-09-04",
            productId: 102 // Unique identifier
        },
        // Add more sample products as needed
    ];

    $('#product-summary').DataTable({
        order: [[0, 'desc']],
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
                            <a class="btn btn-secondary btn-floating" title="Update Image" href="ProductImageCreateDelete.php?productId=${row.productId}"" role="button">
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
});