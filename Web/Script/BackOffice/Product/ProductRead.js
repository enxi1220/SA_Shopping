$(document).ready(function () {
    // rm hardcode
    var products = [
        {
            productDetailNo: "SKU/1201/00001",
            status: "Available",
            size: "Small",
            color: "Red",
            material: "Cotton",
            minStockQty: 10,
            availableQty: 50,
            salesOutQty: 40,
            createdDate: "2023-08-01",
            updatedDate: "2023-09-01",
            updatedBy: "Admin"
        },
        {
            productDetailNo: "SKU/1201/00002",
            status: "Discontinued",
            size: "Medium",
            color: "Blue",
            material: "Silk",
            minStockQty: 5,
            availableQty: 20,
            salesOutQty: 10,
            createdDate: "2023-07-15",
            updatedDate: "2023-09-02",
            updatedBy: "User"
        },
        // Add more sample products as needed
    ];

    $('#product-detail-summary').DataTable({
        data: products,
        columns:
            [
                { data: "productDetailNo" },
                { data: "status" },
                { data: "size" },
                { data: "color" },
                { data: "material" },
                { data: "minStockQty" },
                { data: "availableQty" },
                { data: "salesOutQty" },
                { data: "createdDate" },
                { data: "updatedDate" },
                { data: "updatedBy" }
            ]
    });
});