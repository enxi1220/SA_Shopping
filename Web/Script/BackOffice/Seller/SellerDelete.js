$(`#form-seller-delete`).submit(function (event) {
    event.preventDefault();
    if (!$(`#form-seller-delete`)[0].checkValidity()) {
        return;
    }

    $(`#modal-seller-delete`).modal('show');
    $(`#btn-seller-delete`).click(function () {
        // todo: get seller id & change seller status 
        $(`#modal-seller-delete`).modal('hide');
    });
});