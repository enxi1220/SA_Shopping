$(document).ready(function () {
    $("#txt-review").focus();

    $(`#form-review-create`).submit(function (event) {
        event.preventDefault();
        if (!$(`#form-review-create`)[0].checkValidity()) {
            return;
        }

        // todo: post;
    });
});