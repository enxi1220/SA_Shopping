<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col justify-content-between mb-5">
            <h2 class="pt-5">Order Summary</h2>
        </div>
    </div>
    <table id="order-summary" class="table table-striped">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Product Name</th>
                <th>SKU No</th>
                <th>Status</th>
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
<div class="modal fade" id="modal-order-update" tabindex="-1" aria-labelledby="txt-modal-update-order" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="txt-modal-update-order">Confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure <label class="text-lowercase" id="lbl-action"></label> the order?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-order">Sure</button>
            </div>
        </div>
    </div>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Order/OrderSummary.js"></script>