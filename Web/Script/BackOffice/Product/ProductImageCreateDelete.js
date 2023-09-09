$(document).ready(function () {
    $(`#form-product-image-create`).submit(function (event) {
        event.preventDefault();
        if ($(`#form-product-image-create`)[0].checkValidity()) {
            console.log('hi');
            // if single file, then files[0]
            var data = submitData('productImage', $('#txt-image')[0].files);
            console.log(data);

            // todo: add images
            // var productId = JSON.stringify({
            //     productId: new URLSearchParams(window.location.search).get('productId')
            // });

            // post('url',
            //     [
            //         submitData('productId', productId),
            //         submitData('productImg', $('#txt-image')[0].files[0])
            //     ]
            // );
        }
    });

});

// todo: change to multiple pic
function picturePreview(input) {
    if (input.files) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
// todo: no param pass yet 
function deleteProductImage(id) {
    var productId = new URLSearchParams(window.location.search).get('productId');
    $('#modal-product-image-delete').modal('show');
    $('#btn-product-image-delete').click(function () {
        // todo: back end 
        //     var productImage = JSON.stringify({
        //         "productImageId": id.toString()
        //     });

        //     post('Controller',
        //         productImage,
        //     );
    });
}