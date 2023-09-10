$(document).ready(function() {
    backToTop();

    get(
        '/SA_Shopping/Controller/CtrlProduct/ProductRead.php',
        { productId: new URLSearchParams(window.location.search).get('productId') },
        function (success) {
            console.log(success);
            var product = JSON.parse(success);
            display(product);
        }
    )
});

function display(product){
    $('#txt-name').text(product.name);
    $('#txt-price').text(product.price);
    $('#txt-description').text(product.description);
}

