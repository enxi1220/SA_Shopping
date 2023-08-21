<?php
require '../Layout.php';
?>

<div class="p-5 rounded-2">
    <div class="row">
        <div class="col">
            <h2 class="float-start mb-5">Product Summary</h2>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-lg btn-floating float-end" title="Add" href="EventCreate.php" role="button">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    <table id="product-summary" class="table table-striped w-100">
        <thead>
            <tr>
                <th>Event No</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Created Date</th>
                <th>Updated By</th>
                <th>Updated Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!----------------------- Modal ----------------------->
<div class="modal fade" id="modal-activate-event" tabindex="-1" aria-labelledby="txt-modal-activate-event" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="txt-modal-activate-event">Confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to activate the event?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-activate-event">Sure</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-deactivate-event" tabindex="-1" aria-labelledby="txt-modal-deactivate-event" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="txt-modal-deactivate-event">Confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to deactivate the event?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-deactivate-event">Sure</button>
            </div>
        </div>
    </div>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductSummary.js"></script>