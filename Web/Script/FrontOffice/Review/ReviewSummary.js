$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    if (productId) {
        get(
            baseUrl + 'FrontOffice/CtrlReview/ReviewSummary.php',
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
        switch (element.sentimentLabel) {
            case SentimentLabel.Negative:
            case SentimentLabel.VeryNeg:
            case SentimentLabel.SlightNeg:
                color = 'danger';
                break;
            case SentimentLabel.Positive:
            case SentimentLabel.VeryPos:
            case SentimentLabel.SlightPos:
                color = 'success';
                break;
            default:
                color = 'warning';
                break;
        };

        $('#review').append(
            `
            <div class="card-review-${color} card border border-${color} mb-3">
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

    $('#btn-negative').click(function () {
        $(this).toggleClass('btn-outline-danger btn-danger');
        $('.card-review-danger').toggleClass('d-none d-block');
    });

    $('#btn-positive').click(function () {
        $(this).toggleClass('btn-outline-success btn-success');
        $('.card-review-success').toggleClass('d-none d-block');
    });

    $('#btn-neutral').click(function () {
        $(this).toggleClass('btn-outline-warning btn-warning');
        $('.card-review-warning').toggleClass('d-none d-block');
    });
}

function renderReviewCount(reviewCount) {
    if (typeof reviewCount === 'object' && reviewCount !== null) {
        $('#lbl-total-review').text(reviewCount.totalReview);
        $('#btn-negative').text(reviewCount.negativeReview);
        $('#btn-neutral').text(reviewCount.neutralReview);
        $('#btn-positive').text(reviewCount.positiveReview);
    }
}