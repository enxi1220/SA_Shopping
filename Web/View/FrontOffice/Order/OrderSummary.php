<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb " class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../Product/ProductSummary.php">Product Catalog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Purchase History</li>
    </ol>
</nav>

<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-3 card h-100 fixed">
            <!-- Tab navs -->
            <div class="nav flex-column nav-tabs text-center rounded" id="v-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link ripple rounded-top" id="v-tabs-confirm-tab" data-mdb-toggle="tab" href="#confirm" role="tab" aria-controls="v-tabs-confirm" aria-selected="false"></a>
                <a class="nav-link ripple" id="v-tabs-ship-tab" data-mdb-toggle="tab" href="#ship" role="tab" aria-controls="v-tabs-ship" aria-selected="false"></a>
                <a class="nav-link ripple" id="v-tabs-deliver-tab" data-mdb-toggle="tab" href="#deliver" role="tab" aria-controls="v-tabs-deliver" aria-selected="false"></a>
                <a class="nav-link ripple" id="v-tabs-review-tab" data-mdb-toggle="tab" href="#review" role="tab" aria-controls="v-tabs-review" aria-selected="false"></a>
                <a class="nav-link ripple" id="v-tabs-closed-tab" data-mdb-toggle="tab" href="#closed" role="tab" aria-controls="v-tabs-closed" aria-selected="false"></a>
            </div>
            <!-- Tab navs -->
        </div>

        <div class="col col-9">
            <div class="tab-content" id="v-tabs-tabContent">
            <!-- Tab content -->
                <div class="tab-pane fade" id="confirm" role="tabpanel" aria-labelledby="confirm-nav-tab">
                </div>
                <div class="tab-pane fade" id="ship" role="tabpanel" aria-labelledby="v-tabs-ship-tab">
                </div>
                <div class="tab-pane fade" id="deliver" role="tabpanel" aria-labelledby="v-tabs-deliver-tab">
                </div>
                <div class="tab-pane fade show" id="review" role="tabpanel" aria-labelledby="v-tabs-review-tab">
                </div>
                <div class="tab-pane fade" id="closed" role="tabpanel" aria-labelledby="v-tabs-closed-tab">
                </div>
            <!-- Tab content -->
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-black btn-floating btn-lg m-2 opacity-75" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modal-review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-review-create" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><label required>Write Review</label></h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-outline">
                        <textarea id="txt-review" class="form-control" required rows="4" placeholder="Write something..."></textarea>
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Post review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/FrontOffice/Order/OrderSummary.js"></script>