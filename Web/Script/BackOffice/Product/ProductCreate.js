$(document).ready(function () {
    var index = 0;


    var dataTable = $('#product-detail-create').DataTable({
        lengthMenu: [3, 5, 10, 25, 50], // Change 3 to the desired value
        pageLength: 3,
        ordering: false,
        searching: false
    });

    // todo: bll add product, check product detail unique
    $(`#form-product-create`).submit(function (event) {

        event.preventDefault();

        preparePostData(dataTable);


    });

    drawRow(dataTable, index);

    $('#btn-row-add').on('click', function () {
        index++;
        drawRow(dataTable, index);
    });

    $('#product-detail-create').on('click', '.delete-row', function () {
        if (dataTable.rows().count() > 1) {
            var row = $(this).closest('tr');
            dataTable.row(row).remove().draw(false);
        }
    });
});

function preparePostData(dataTable) {
    // Product Detail
    var productDetails = [];
    var index = 0;

    dataTable.rows().data().each(function (row) {

        var size = $(`#txt-size-${index}`).val();
        var color = $(`#txt-color-${index}`).val();
        var material = $(`#txt-material-${index}`).val();
        var minStockQty = $(`#txt-min-stock-qty-${index}`).val();
        var availableStockQty = $(`#txt-available-stock-qty-${index}`).val();

        productDetails.push({
            size: size,
            color: color,
            material: material,
            minStockQty: minStockQty,
            availableStockQty: availableStockQty
        });
        index++;
    });

    post(
        '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductCreate.php',
        [
            submitData('product',
                JSON.stringify({
                    name: $('#txt-name').val(),
                    price: $('#txt-price').val(),
                    description: $('#txt-description').val(),
                    productDetails: productDetails
                })),
            // submitData('productDetail', JSON.stringify(productDetails)),
            submitData('productImage', $('#txt-image')[0].files[0])
        ]
    );
}

function drawRow(dataTable, index) {
    dataTable.row.add([
        `<button class="btn btn-danger btn-floating delete-row" type="button"><i class="fa-solid fa-trash-can"></i></button>`,
        `<div class="form-outline">
            <input type="text" id="txt-size-${index}" class="form-control border bg-white" required />
            <div class="invalid-feedback">Required</div>
        </div>`,
        `<div class="form-outline">
            <input type="text" id="txt-color-${index}" class="form-control border bg-white" required />
            <div class="invalid-feedback">Required</div>
        </div>`,
        `<div class="form-outline">
            <input type="text" id="txt-material-${index}" class="form-control border bg-white" required />
            <div class="invalid-feedback">Required</div>
        </div>`,
        `<div class="form-outline">
            <input type="number" id="txt-min-stock-qty-${index}" class="form-control border bg-white" required min="0"/>
            <div class="invalid-feedback">Required</div>
        </div>`,
        `<div class="form-outline">
            <input type="number" id="txt-available-stock-qty-${index}" class="form-control border bg-white" required min="0"/>
            <div class="invalid-feedback">Required</div>
        </div>`
    ]).draw(false);
};