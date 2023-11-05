$(`#form-seller-delete`).submit(function (event) {
    event.preventDefault();
    if (!$(`#form-seller-delete`)[0].checkValidity()) {
        return;
    }

    $(`#modal-seller-delete`).modal('show');
    $(`#btn-seller-delete`).click(function () {
        event.preventDefault();
        post(
            '/SA_Shopping/Controller/BackOffice/CtrlSeller/SellerDelete.php',
            [
                submitData('seller',
                    JSON.stringify({
                        password: $('#txt-password-delete').val()
                    }))
            ]
        );
        $(`#modal-seller-delete`).modal('hide');
    });
});