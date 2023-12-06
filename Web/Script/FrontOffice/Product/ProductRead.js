$(document).ready(function () {
    backToTop();

    var productId = new URLSearchParams(window.location.search).get('productId');
    var product = null;

    get(
        baseUrl + 'FrontOffice/CtrlProduct/ProductRead.php',
        { productId: productId },
        function (success) {
            console.log(success);
            product = JSON.parse(success);
            renderMeta(product);
            renderProduct(product);
            renderSeller(product.seller);
        }
    );

    // show available quantity according to selected variation
    $(document).on('change', 'input[name="OptionGroup"]', function () {
        var selectedProductId = $(this).attr('id');
        const selectedProductDetail = product.productDetails.filter(detail => detail.productDetailId == selectedProductId);
        $('#txt-available-qty').text(selectedProductDetail[0].availableQty);
        $(`#txt-quantity`).attr("max", $('#txt-available-qty').text());
    });

    $(`#btn-buy-now`).click(function () {
        var productDetailId = $('input[name="OptionGroup"]:checked').attr('id');
        var quantity = $('#txt-quantity').val();
        location.href = `/SA_Shopping/FrontOffice/Order/OrderCreate.php?productDetailId=${productDetailId}&quantity=${quantity}`;
    });

    $(`#btn-whatsapp-me`).click(function () {
        var message = window.location.href + ' Hello from Shop Scribe buyer, I have inquiries about this product.';

        // Create the WhatsApp link
        var whatsappLink = 'https://wa.me/' + $('#btn-whatsapp-me').data('phone') + '?text=' + encodeURIComponent(message);

        // Open the WhatsApp chat in a new window/tab
        window.open(whatsappLink, '_blank');
    });
});

function renderMeta(product) {
    $('#og-desc').attr('content', product.name);
    $('#og-image').attr('content', product.productImages[0].imageName);
    $('#og-url').attr('content', window.location.href);
}

function renderProduct(product) {
    $('#txt-name').text(product.name);
    $('#txt-price').text(product.price);
    $('#txt-description').text(product.description);

    product.productDetails.forEach(element => {
        var label = $('<label>')
            .attr('for', element.productDetailId,)
            .text(element.color + " - " + element.size + " - " + element.material)
            .addClass("btn btn-outline-secondary mt-1 mx-1");

        var input = $('<input>')
            .attr({
                type: "radio",
                id: element.productDetailId,
                name: "OptionGroup"
            })
            .addClass("btn-check")
            .prop('required', true);

        $('#product-detail').append(input, label);
    });


    $('#txt-available-qty').text(product.productDetails.reduce((accumulator, currentValue) => accumulator + currentValue.availableQty, 0));

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
    $('#btn-whatsapp-me').data('phone', seller.phone);
    $('#txt-seller-last-login-date').text(seller.lastLoginDate);
    $('#txt-seller-created-date').text(seller.createdDate);
    $('#txt-store-name').text(seller.storeName);
    $('#txt-business-address').text(seller.businessAddress);
    $('#txt-store-desc').text(seller.storeDesc);
}
