$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    if (productId) {
        get(
            '/SA_Shopping/Controller/CtrlReview/ReviewRead.php',
            { productId: productId },
            function (success) {
                console.log(success);
                reviews = JSON.parse(success);
                renderReview(reviews);
            }
        );
        get(
            '/SA_Shopping/Controller/CtrlReview/ReviewReadCount.php',
            { productId: productId },
            function (success) {
                console.log(success);
                review = JSON.parse(success);
                renderReviewCount(review);
            }
        );
    }
});

function renderReview(reviews) {
    reviews.forEach(element => {
        color = element.sentimentLabel == SentimentLabel.Negative ? 'danger' : element.sentimentLabel == SentimentLabel.Neutral ? 'warning' : 'success' ;
        $('#review').append(
            `
            <div class="card border border-${color} mb-3">
                <div class="card-header fw-bold fs-4 text-${color}">${element.sentimentRecommendation}</div>
                <div class="card-body">
                    <h5 class="card-title">${element.order.color} - ${element.order.size} - ${element.order.material}</h5>
                    <p class="card-text">${element.reviewText}</p>
                    <span class="text-muted">${element.status} on ${element.status == ReviewStatus.New ? element.createdDate : element.updatedDate}</span>
                </div>
            </div>
            `
        );
    });
}

function renderReviewCount(review) {
    $('#lbl-total-review').text(review.totalReview);
    $('#btn-negative').text(review.negativeReview);
    $('#btn-neutral').text(review.neutralReview);
    $('#btn-positive').text(review.positiveReview);
}