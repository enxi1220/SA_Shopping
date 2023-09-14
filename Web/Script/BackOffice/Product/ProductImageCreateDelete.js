$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');

    if (productId) {
        get(
            '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductImageCreateDelete.php',
            { productId: new URLSearchParams(window.location.search).get('productId') },
            function (success) {
                console.log(success);
                productImages = JSON.parse(success);
                renderProductImages(productImages);
            }
        );
    }


    $(`#form-product-image-create`).submit(function (event) {

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
// todo: html no param pass yet 
function deleteProductImage(id) {
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

function renderProductImages(productImages) {
    productImages.forEach(element => {
        $('#product-images').append(
            `
            <div class="col">
                <div class="overflow-hidden m-2 d-flex justify-content-end position-relative">
                    <img src="${element.imageName}" class="h-100 w-100 object-fit-cover" />
                    <button class="position-absolute btn btn-floating btn-danger text-white m-3" type="button" onclick="deleteProductImage(${element.productImageId})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            `
        );
    });
}