<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col justify-content-between mb-5">
            <h2 class="pt-5">Product Summary</h2>
            <a class="btn btn-dark btn-lg btn-floating float-end" title="Add" href="ProductCreate.php" role="button">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <table id="product-summary" class="table table-striped w-100">
        <thead>
            <tr>
                <th>Product No</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!----------------------- Modal ----------------------->
<div class="modal fade" id="modal-product-activate" tabindex="-1" aria-labelledby="txt-modal-product-activate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="txt-modal-product-activate">Confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to activate the product?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-product-activate">Sure</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-product-deactivate" tabindex="-1" aria-labelledby="txt-modal-product-deactivate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="txt-modal-product-deactivate">Confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to deactivate the product?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-product-deactivate">Sure</button>
            </div>
        </div>
    </div>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductSummary.js"></script>