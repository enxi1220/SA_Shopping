$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    get(
        baseUrl + 'BackOffice/CtrlProduct/ProductRead.php',
        { productId: productId },
        function (success) {
            product = JSON.parse(success);
            renderProducts(product);
            renderProductDetails(product.productDetails);
            renderProductImages(product.productImages)
        }
    );

});

function renderProducts(product) {
    $('#txt-product-no').val(product.productNo);
    $('#txt-name').val(product.name);
    $('#txt-price').val(product.price.toFixed(2));
    $('#txt-description').val(product.description);
    // todo: rm shitty code
    $('#txt-product-no').focus();
    $('#txt-name').focus();
    $('#txt-price').focus();
    $('#txt-description').focus();
    $('#txt-description').blur();
}

function renderProductDetails(details) {
    $('#product-detail-summary').DataTable({
        data: details,
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
}

function renderProductImages(images) {
    images.forEach(element => {
        $('#product-images').append(
            `
            <div class="col">
                <div class="h-100">
                    <img src="${element.imageName}" class="card-img-top" />
                </div>
            </div>
            `
        );
    });
}