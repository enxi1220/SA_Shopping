$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    get(
        '/SA_Shopping/Controller/BackOffice/CtrlReview/ReviewSummary.php',
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
        data: reviews,
        columns: [
            { data: "productDetail.productDetailNo" },
            { data: "buyerEmail" },
            { data: "reviewText" },
            {
                render: function (data, type, row, meta) {
                    if (row.sentimentLabel == SentimentLabel.Neutral) {
                        return `<span class="badge rounded-pill badge-warning">${SentimentLabel.Neutral}</span>`;
                    } else if (row.sentimentLabel == SentimentLabel.Positive) {
                        return `<span class="badge rounded-pill badge-success">${SentimentLabel.Positive}</span>`;
                    } else {
                        return `<span class="badge rounded-pill badge-danger">${SentimentLabel.Negative}</span>`;
                    }
                }
            },
            { data: "createdDate" },
            { data: "updatedDate" }
        ]
    });
}