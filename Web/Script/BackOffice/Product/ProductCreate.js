$(document).ready(function () {

// todo: bll add product, check product detail unique

    var dataTable = $('#product-detail-create').DataTable({
        lengthMenu: [3, 5, 10, 25, 50], // Change 3 to the desired value
        pageLength: 3,
        ordering: false,
        searching: false
    });

    $('#btn-row-add').on('click', function () {
        addRow(dataTable);
    });

    $('#product-detail-create').on('click', '.delete-row', function () {
        if (dataTable.rows().count() > 1) {
            var row = $(this).closest('tr');
            dataTable.row(row).remove().draw();
        }
    });
});

//  todo: make every row id unique
// todo: add row at the first line
function addRow(dataTable) {
    dataTable.row.add([
        `<button class="btn btn-danger btn-floating delete-row"><i class="fa-solid fa-trash-can"></i></button>`,
        `<input type="text" id="txt-size" class="form-control" required />`,
        `<input type="text" id="txt-color" class="form-control" required />`,
        `<input type="text" id="txt-material" class="form-control" required />`,
        `<input type="number" id="txt-min-stock-qty" class="form-control" required min="0"/>`,
        `<input type="number" id="txt-available-stock-qty" class="form-control" required min="0"/> `,
    ]).draw();
}