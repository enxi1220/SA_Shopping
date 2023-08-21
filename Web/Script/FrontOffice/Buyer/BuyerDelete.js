$(`#form-buyer-delete`).submit(function (event) {
    event.preventDefault();
    if (!$(`#form-buyer-delete`)[0].checkValidity()) {
        return;
    }

    $(`#modal-buyer-delete`).modal('show');
    $(`#btn-buyer-delete`).click(function () {
        // todo: get buyer id & change buyer status 
        $(`#modal-buyer-delete`).modal('hide');
    });
});