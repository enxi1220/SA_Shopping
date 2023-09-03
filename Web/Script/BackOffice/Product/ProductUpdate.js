$(document).ready(function () {
    var index = 0;

    // todo: bll add product, check product detail unique

    var dataTable = $('#product-detail-update').DataTable({
        lengthMenu: [3, 5, 10, 25, 50], // Change 3 to the desired value
        pageLength: 3,
        ordering: false,
        searching: false
    });

    $('#btn-row-add').on('click', function () {
        index++;
        addRow(dataTable, index);
    });
    // rm hardcode
    dataTable.row.add([
        `<button class="btn btn-secondary btn-floating toggle-status" type="button"><i class="fa-solid fa-check"></i></button>`,
        `Discontinued`,
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
    dataTable.row.add([
        `<button class="btn btn-secondary btn-floating toggle-status" type="button"><i class="fa-solid fa-times"></i></button>`,
        `Available`,
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
    // rm hardcode

    $('#product-detail-update').on('click', '.delete-row', function () {
        var row = $(this).closest('tr');
        dataTable.row(row).remove().draw(false);
    });

    $('#product-detail-update').on('click', '.toggle-status', function () {
        var row = $(this).closest('tr');
        // Get the data for the clicked row
        var rowData = dataTable.row(row).data();

        if (rowData[1] == "Available") {
            rowData[0] = `<button class="btn btn-secondary btn-floating toggle-status" type="button"><i class="fa-solid fa-check"></i></button>`;
            rowData[1] = "Discontinued";
        } else {
            rowData[0] = `<button class="btn btn-secondary btn-floating toggle-status" type="button"><i class="fa-solid fa-times"></i></button>`,
                rowData[1] = "Available";
        }

        // Invalidate the specific row to trigger a redraw
        dataTable.row(row).invalidate().draw(false);;
    });
});

// added product detail through update product
function addRow(dataTable, index) {
    dataTable.row.add([
        `<button class="btn btn-danger btn-floating delete-row" type="button"><i class="fa-solid fa-trash-can"></i></button>`,
        ``,
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