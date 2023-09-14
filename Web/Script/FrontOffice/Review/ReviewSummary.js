$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    if (productId) {
        get(
            '/SA_Shopping/Controller/FrontOffice/CtrlReview/ReviewSummary.php',
            { productId: productId },
            function (success) {
                data = JSON.parse(success);
                renderReview(data.reviews);
                renderReviewCount(data.reviewCount);
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
                    <h5 class="card-title">${element.order.productDetail.color} - ${element.order.productDetail.size} - ${element.order.productDetail.material}</h5>
                    <p class="card-text">${element.reviewText}</p>
                    <span class="text-muted">${element.status} on ${element.status == ReviewStatus.New ? element.createdDate : element.updatedDate}</span>
                </div>
            </div>
            `
        );
    });
}

function renderReviewCount(reviewCount) {
    $('#lbl-total-review').text(reviewCount.totalReview);
    $('#btn-negative').text(reviewCount.negativeReview);
    $('#btn-neutral').text(reviewCount.neutralReview);
    $('#btn-positive').text(reviewCount.positiveReview);
}