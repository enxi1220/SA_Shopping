$(document).ready(function () {
    backToTop();

    var productId = new URLSearchParams(window.location.search).get('productId');
    var product = null;

    if (productId) {
        get(
            '/SA_Shopping/Controller/CtrlProduct/ProductRead.php',
            { productId: productId },
            function (success) {
                console.log(success);
                product = JSON.parse(success);
                render(product);
            }
        )
    }

    // show available quantity according to selected variation
    $(document).on('change', 'input[name="OptionGroup"]', function () {
        var selectedProductId = $(this).attr('id');
        const selectedProductDetail = product.productDetails.filter(detail => detail.productDetailId == selectedProductId);
        $('#txt-available-qty').text(selectedProductDetail[0].availableQty);
        $(`#txt-quantity`).attr("max", $('#txt-available-qty').text()); 
    });
});

function render(product) {
    $('#txt-name').text(product.name);
    $('#txt-price').text(product.price);
    $('#txt-description').text(product.description);
    
    $('#txt-available-qty').text(product.productDetails.reduce((accumulator, currentValue) => accumulator + currentValue.availableQty, 0));
    
    product.productDetails.forEach(element => {
        var label = $('<label>').
            attr('for', element.productDetailId)
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
}
