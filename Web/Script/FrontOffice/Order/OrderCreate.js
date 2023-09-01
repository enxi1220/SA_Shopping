$(document).ready(function () {
    enhanceUI();

    $(`#form-order-create`).submit(function (event) {
        event.preventDefault();
        if (!$(`#form-order-create`)[0].checkValidity()) {
            return;
        }
        var paymentMethod = $("button[type=submit]:focus").val();
        console.log(paymentMethod);
        // todo: post;
    });
});

function enhanceUI(){
    $(`#txt-delivery-address`).focus();

    $("#txt-card-number").on("input", function () {
        const cardNumber = $(this).val().replace(/\s/g, '');
        const formattedCardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');

        $(this).val(formattedCardNumber);
    });

    $("#txt-expiry-date").on("input", function () {
        const expiryDate = $(this).val().replace(/\//g, '');
        const formattedExpiryDate = expiryDate.replace(/(\d{2})(?=\d)/g, '$1/');
    
        $(this).val(formattedExpiryDate);
    });

    $('.tab-pane').on('click', function () {
        // if choosing card method
        if ($(`#pills-card`).hasClass('active')) {
            $('#txt-card-number').attr('required', true);
            $('#txt-cvv').attr('required', true);
            $('#txt-expiry-date').attr('required', true);
        } else {
            $('#txt-card-number').removeAttr('required');
            $('#txt-cvv').removeAttr('required');
            $('#txt-expiry-date').removeAttr('required');
        }
    });
}