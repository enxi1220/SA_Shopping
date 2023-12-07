$(document).ready(function () {
    backToTop();

    get(
        baseUrl + 'FrontOffice/CtrlProduct/ProductSummary.php',
        {},
        function (success) {
            products = JSON.parse(success);
            renderProducts(products);
        }
    );
});

function renderProducts(products) {
    products.forEach(element => {
        var negativeLength = (element.reviewCount.negativeReview / element.reviewCount.totalReview) * 100;
        var neutralLength = (element.reviewCount.neutralReview / element.reviewCount.totalReview) * 100;
        var positiveLength = (element.reviewCount.positiveReview / element.reviewCount.totalReview) * 100;

        $('#product').append(
            `
            <div class="col card-product">
            <a class="text-reset" href="ProductRead.php?productId=${element.productId}">
                <div class="card h-100 hover-shadow ">
                    <img width="500" height="400" src="${element.productImage.imageName}" class="card-img-top" loading="lazy" />
                    <div class="card-body">
                        <h5 class="card-title">${element.name}</h5>
                        <p class="card-text">RM ${element.price.toFixed(2)}</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: ${negativeLength}%;" aria-valuenow="${negativeLength}"></div>
                            ${negativeLength == 0 || neutralLength == 0 ? '' : '<div class="m-1"></div>' }
                            <div class="progress-bar bg-warning fs-5" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: ${neutralLength}%;" aria-valuenow="${neutralLength}"></div>
                            ${neutralLength == 0 || positiveLength == 0 ? '' : '<div class="m-1"></div>' }
                            <div class="progress-bar bg-success fs-5" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: ${positiveLength}%;" aria-valuenow="${positiveLength}"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">${SentimentLabel.Negative}</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">${element.reviewCount.negativeReview}</span>
                            </div>
                            <div class="">
                                <span class="text-muted">${SentimentLabel.Neutral}</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">${element.reviewCount.neutralReview}</span>
                            </div>
                            <div class="">
                                <span class="text-muted">${SentimentLabel.Positive}</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">${element.reviewCount.positiveReview}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
            `
        );
    });
}



