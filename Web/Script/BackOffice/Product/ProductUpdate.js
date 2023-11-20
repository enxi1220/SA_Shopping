$(document).ready(function () {
    var productId = new URLSearchParams(window.location.search).get('productId');
    var index = 0;
    get(
        '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductRead.php',
        { productId: productId },
        function (success) {
            var product = JSON.parse(success);
            renderProducts(product);
            index = renderProductDetails(dataTable, product.productDetails, index);
        }
    );

    $(`#form-product-update`).submit(function (event) {
        event.preventDefault();
        var productDetails = preparePostData(dataTable);

        post(
            '/SA_Shopping/Controller/BackOffice/CtrlProduct/ProductUpdate.php',
            [
                submitData('product',
                    JSON.stringify({
                        productId: productId,
                        name: $('#txt-name').val(),
                        price: $('#txt-price').val(),
                        description: $('#txt-description').val(),
                        productDetails: productDetails
                    }))
            ]
        );
    });

    var dataTable = $('#product-detail-update').DataTable({
        lengthMenu: [25, 50, 100, 250, 300], // Change 3 to the desired value
        // pageLength: 3,
        ordering: false,
        searching: false
    });

    $('#btn-row-add').on('click', function () {
        addRow(dataTable, index);
        index++;
    });

    $('#product-detail-update').on('click', '.delete-row', function () {
        var row = $(this).closest('tr');
        dataTable.row(row).remove().draw(false);
    });

    $('#product-detail-update').on('click', '.toggle-status', function () {
        var row = $(this).closest('tr');
        var rowIndex = dataTable.row(row).index();
        // Get the data for the clicked row
        var rowData = dataTable.row(row).data();

        var pdId = $(`#btn-sku-id-${rowIndex}`).val();

        if ( $(`#txt-status-${rowIndex}`).text() == ProductDetailStatus.Available) {
            rowData[0] = `<button class="btn btn-secondary btn-floating toggle-status" type="button" id="btn-sku-id-${rowIndex}" value="${pdId}"><i class="fa-solid fa-check"></i></button>`;

            $(`#txt-status-${rowIndex}`).text(ProductDetailStatus.Unavailable);
            rowData[2] = `<span id="txt-status-${rowIndex}">${ProductDetailStatus.Unavailable}</span>`;
        } else {
            rowData[0] = `<button class="btn btn-secondary btn-floating toggle-status" type="button" id="btn-sku-id-${rowIndex}" value="${pdId}"><i class="fa-solid fa-times"></i></button>`;

            $(`#txt-status-${rowIndex}`).text(ProductDetailStatus.Available);
            rowData[2] = `<span id="txt-status-${rowIndex}">${ProductDetailStatus.Available}</span>`;
        }

        // Invalidate the specific row to trigger a redraw
        dataTable.row(row).invalidate().draw(false);
    });
});

function preparePostData(dataTable) {
    // Product Detail
    var productDetails = [];
    var index = 0;

    dataTable.rows().data().each(function () {
        var skuId = $(`#btn-sku-id-${index}`).val();
        var skuNo = $(`#txt-sku-no-${index}`).text();
        var status = $(`#txt-status-${index}`).text();
        var size = $(`#txt-size-${index}`).val();
        var color = $(`#txt-color-${index}`).val();
        var material = $(`#txt-material-${index}`).val();
        var minStockQty = $(`#txt-min-stock-qty-${index}`).val();
        var availableStockQty = $(`#txt-available-stock-qty-${index}`).val();

        productDetails.push({
            productDetailId: skuId,
            productDetailNo: skuNo,
            status: status,
            size: size,
            color: color,
            material: material,
            minStockQty: minStockQty,
            availableStockQty: availableStockQty
        });
        index++;
    });

    console.log(productDetails);

    return productDetails;
}

function renderProducts(product) {
    $('#txt-product-no').val(product.productNo);
    $('#txt-name').val(product.name);
    $('#txt-price').val(product.price);
    $('#txt-description').val(product.description);

    // todo: rm shitty code
    $('#txt-product-no').focus();
    $('#txt-name').focus();
    $('#txt-price').focus();
    $('#txt-description').focus();
    $('#txt-description').blur();
}

function renderProductDetails(dataTable, details, index) {
    details.forEach(element => {
        dataTable.row.add([
            element.status == ProductDetailStatus.Available ?
                `<button class="btn btn-secondary btn-floating toggle-status" type="button" id="btn-sku-id-${index}" value="${element.productDetailId}">
                    <i class="fa-solid fa-times"></i>
                </button>`:
                element.status == ProductDetailStatus.Unavailable ?
                    `<button class="btn btn-secondary btn-floating toggle-status" type="button" id="btn-sku-id-${index}" value="${element.productDetailId}">
                    <i class="fa-solid fa-check"></i>
                </button>` :
                    `<button class="btn btn-secondary btn-floating d-none toggle-status" type="button" id="btn-sku-id-${index}" value="${element.productDetailId}">
                </button>`,
            `<span id="txt-sku-no-${index}">${element.productDetailNo}</span>`,
            `<span id="txt-status-${index}">${element.status}</span>`,
            `<div class="form-outline">
                    <input type="text" id="txt-size-${index}" class="form-control border bg-white" required value="${element.size}"/>
                    <div class="invalid-feedback">Required</div>
                </div>`,
            `<div class="form-outline">
                    <input type="text" id="txt-color-${index}" class="form-control border bg-white" required value="${element.color}"/>
                    <div class="invalid-feedback">Required</div>
                </div>`,
            `<div class="form-outline">
                    <input type="text" id="txt-material-${index}" class="form-control border bg-white" required value="${element.material}"/>
                    <div class="invalid-feedback">Required</div>
                </div>`,
            `<div class="form-outline">
                    <input type="number" id="txt-min-stock-qty-${index}" class="form-control border bg-white" required min="0" value="${element.minStockQty}"/>
                    <div class="invalid-feedback">Required</div>
                </div>`,
            `<div class="form-outline">
                    <input type="number" id="txt-available-stock-qty-${index}" class="form-control border bg-white" required min="0" value="${element.availableQty}"/>
                    <div class="invalid-feedback">Required</div>
                </div>`
        ]).draw(false);

        index++;
    });
    return index;
}

// add product detail through update product
function addRow(dataTable, index) {
    dataTable.row.add([
        `<button class="btn btn-danger btn-floating delete-row" type="button"><i class="fa-solid fa-trash-can"></i></button>`,
        `<span id="txt-sku-no-${index}"></span>`,
        `<span id="txt-status-${index}"></span>`,
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
}