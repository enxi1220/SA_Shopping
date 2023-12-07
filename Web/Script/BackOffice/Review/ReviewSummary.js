$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    get(
        baseUrl + 'BackOffice/CtrlReview/ReviewSummary.php',
        { productId: productId },
        function (success) {
            console.log(success);
            data = JSON.parse(success);
            renderReview(data);
        }
    );

});

function renderReview(reviews) {
    $('#review-summary').DataTable({
        order: [4, 'desc'],
        data: reviews,
        columns: [
            { data: "productDetail.productDetailNo" },
            { data: "buyerEmail" },
            { data: "reviewText" },
            {
                render: function (data, type, row, meta) {
                    switch (row.sentimentLabel) {
                        case SentimentLabel.Positive:
                        case SentimentLabel.SlightPos:
                        case SentimentLabel.VeryPos:
                            return `<span class="badge rounded-pill badge-success">${row.sentimentLabel}</span>`;
                        case SentimentLabel.Negative:
                        case SentimentLabel.SlightNeg:
                        case SentimentLabel.VeryNeg:
                            return `<span class="badge rounded-pill badge-danger">${row.sentimentLabel}</span>`;
                        default:
                            return `<span class="badge rounded-pill badge-warning">${SentimentLabel.Neutral}</span>`;
                    };
                }
            },
            { data: "createdDate" },
            { data: "updatedDate" }
        ]
    });
}