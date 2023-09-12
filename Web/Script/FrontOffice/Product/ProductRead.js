$(document).ready(function () {
    backToTop();

    var productId = new URLSearchParams(window.location.search).get('productId');
    var product = null;

    if (productId) {
        get(
            '/SA_Shopping/Controller/FrontOffice/CtrlProduct/ProductRead.php',
            { productId: productId },
            function (success) {
                product = JSON.parse(success);
                renderProduct(product);

                get(
                    '/SA_Shopping/Controller/FrontOffice/CtrlSeller/SellerRead.php',
                    { sellerId: product.sellerId },
                    function (successSeller) {
                        var seller = JSON.parse(successSeller);
                        renderSeller(seller);
                    }
                );
            }
        );
    }

    // show available quantity according to selected variation
    $(document).on('change', 'input[name="OptionGroup"]', function () {
        var selectedProductId = $(this).attr('id');
        const selectedProductDetail = product.productDetails.filter(detail => detail.productDetailId == selectedProductId);
        $('#txt-available-qty').text(selectedProductDetail[0].availableQty);
        $(`#txt-quantity`).attr("max", $('#txt-available-qty').text());
    });
});

function renderProduct(product) {
    $('#txt-name').text(product.name);
    $('#txt-price').text(product.price);
    $('#txt-description').text(product.description);

    $('#txt-available-qty').text(product.productDetails.reduce((accumulator, currentValue) => accumulator + currentValue.availableQty, 0));

    product.productDetails.forEach(element => {
        var label = $('<label>')
            .attr('for', element.productDetailId)
            .text(element.color + " - " + element.size + " - " + element.material)
            .addClass("btn btn-outline-secondary mt-1 mx-1");

        var input = $('<input>')
            .attr({
                type: "radio",
                id: element.productDetailId,
                name: "OptionGroup",
                autocomplete: "off"
            })
            .addClass("btn-check");

        $('#product-detail').append(input, label);
    });

    product.productImages.forEach((element, index) => {
        const isActive = index === 0;

        const startDiv = $('<div>')
            .addClass(`carousel-item ${isActive ? 'active' : ''}`);
    
        const image = $('<img>')
            .attr({
                src: element.imageName,
                loading: "lazy"
            })
            .addClass('d-block w-100 object-fit-cover');
    
        startDiv.append(image);
        $('#product-image').append(startDiv);

        /// divider ///

        const startBtn = $('<button>')
            .attr({
                type: "button",
                "data-mdb-target": "#carouselMDExample",
                "data-mdb-slide-to": index
            })
            .addClass(` ${isActive ? 'active' : ''}`)
            .css({
                'width': "100px"
            });

        const thumbnail = $('<img>')
        .attr({
            src: element.imageName,
            loading: "lazy"
        })
        .addClass('d-block w-100 shadow-1-strong rounded img-fluid object-fit-cover');

        startBtn.append(thumbnail);
        $('#product-image-thumbnail').append(startBtn);
    });
}

function renderSeller(seller) {
    $('#txt-seller-name').text(seller.name);
    $('#txt-seller-email').attr({ href: "mailto:" + seller.email });
    $('#txt-seller-last-login-date').text(seller.lastLoginDate);
    $('#txt-seller-created-date').text(seller.createdDate);
    $('#txt-store-name').text(seller.storeName);
    $('#txt-business-address').text(seller.businessAddress);
    $('#txt-store-desc').text(seller.storeDesc);
}

function renderReview(review){

}
