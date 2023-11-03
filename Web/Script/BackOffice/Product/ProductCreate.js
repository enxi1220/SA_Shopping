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
        // console.log(dataTable.cell(row, col).data());
        console.log(dataTable.cell(0,1).data());
        // the html recognized as string, cant get input...should have method, another project can 
        console.log('---');
        console.log(dataTable.cell(this).data());
        console.log('---');
        var allRowData = dataTable.rows().data();
        allRowData.each(function () {
            for (var i = 0; i < dataTable.columns().count(); i++) {
                var cellData = dataTable.cell(this, i).data();
                // cellData contains data for each cell in the row
                console.log(cellData);
            }
        });

        // idx = index

        // event.preventDefault();
        // post(
        //     '/SA_Shopping/Controller/FrontOffice/CtrlOrder/OrderCreate.php',
        //     [
        //         submitData('order', preparePostData())
        //     ],
        //     null,
        //     function () {
        //         location.href = "/SA_Shopping/Web/View/FrontOffice/Product/ProductSummary.php";
        //     }
        // );
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

function preparePostData() {

}

// todo: row hold unique value, id... no need unique ba
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
}