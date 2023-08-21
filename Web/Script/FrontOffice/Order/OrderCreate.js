$(document).ready(function () {
    $("#txt-delivery-address").focus();

    $("#txt-card-number").on("input", function () {
        const cardNumber = $(this).val().replace(/\s/g, '');
        const formattedCardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');

        $(this).val(formattedCardNumber);
    });
    // end of formatting

    $(`#form-order-create`).submit(function (event) {
        event.preventDefault();
        if (!$(`#form-order-create`)[0].checkValidity()) {
            return;
        }
        var paymentMethod = $("button[type=submit]:focus").val();
            // todo: post;
    });
});