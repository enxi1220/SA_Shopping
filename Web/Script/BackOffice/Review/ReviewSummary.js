$(document).ready(function () {
    // rm hardcode
    var reviews = [
        {
            productDetailNo: "SKU001",
            buyerEmail: "buyer1@example.com",
            reviews: "sdfvcsadc",
            sentiment: 0,
            createdDate: "2023-08-01",
            updatedDate: "2023-09-01"
        },
        {
            productDetailNo: "SKU002",
            buyerEmail: "buyer2@example.com",
            reviews: "sefvsedfv",
            sentiment: 0.9,
            createdDate: "2023-08-15",
            updatedDate: "2023-09-02"
        },
        {
            productDetailNo: "SKU003",
            buyerEmail: "buyer3@example.com",
            reviews: "sefvsedfv",
            sentiment: -0.4,
            createdDate: "2023-08-15",
            updatedDate: "2023-09-02"
        },
        // Add more sample data as needed
    ];

    $('#review-summary').DataTable({
        data: reviews,
        columns: [
            { data: "productDetailNo" },
            { data: "buyerEmail" },
            { data: "reviews" },
            {
                render: function (data, type, row, meta) {
                    if(row.sentiment == 0){
                        return `<span class="badge rounded-pill badge-warning">Neutral</span>`;
                    }else if (row.sentiment > 0){
                        return `<span class="badge rounded-pill badge-success">Positive</span>`;
                    }else{
                        return `<span class="badge rounded-pill badge-danger">Negative</span>`;
                    }
                }
            },
            { data: "createdDate" },
            { data: "updatedDate" }
        ]
    });
});