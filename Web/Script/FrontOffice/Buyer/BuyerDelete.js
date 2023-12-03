$(`#form-buyer-delete`).submit(function (event) {
    event.preventDefault();
    if (!$(`#form-buyer-delete`)[0].checkValidity()) {
        return;
    }

    $(`#modal-buyer-delete`).modal('show');
    $(`#btn-buyer-delete`).click(function () {
        event.preventDefault();
        post(
            baseUrl + 'FrontOffice/CtrlBuyer/BuyerDelete.php',
            [
                submitData('buyer',
                    JSON.stringify({
                        password: $('#txt-password-delete').val()
                    }))
            ]
        );
        $(`#modal-buyer-delete`).modal('hide');
    });
});