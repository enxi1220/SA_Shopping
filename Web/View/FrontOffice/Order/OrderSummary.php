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
                <a class="nav-link ripple rounded-top" id="v-tabs-confirm-tab" data-mdb-toggle="tab" href="#confirm" role="tab" aria-controls="v-tabs-confirm" aria-selected="false">Confirmed</a>
                <a class="nav-link ripple" id="v-tabs-ship-tab" data-mdb-toggle="tab" href="#ship" role="tab" aria-controls="v-tabs-ship" aria-selected="false">Shipped</a>
                <a class="nav-link ripple" id="v-tabs-deliver-tab" data-mdb-toggle="tab" href="#deliver" role="tab" aria-controls="v-tabs-deliver" aria-selected="false">Delivered</a>
                <a class="nav-link ripple" id="v-tabs-review-tab" data-mdb-toggle="tab" href="#review" role="tab" aria-controls="v-tabs-review" aria-selected="false">Review</a>
                <a class="nav-link ripple" id="v-tabs-closed-tab" data-mdb-toggle="tab" href="#closed" role="tab" aria-controls="v-tabs-closed" aria-selected="false">Closed</a>
            </div>
            <!-- Tab navs -->
        </div>

        <div class="col col-9">
            <!-- Tab content -->
            <div class="tab-content" id="v-tabs-tabContent">
                <div class="tab-pane fade" id="confirm" role="tabpanel" aria-labelledby="confirm-nav-tab">
                    <!-- loop -->
                    <div class="p-3 mb-4 bg-white shadow-3">
                        <h3 class="lead pb-2 fw-bold d-flex justify-content-between">
                            <label>Order No.</label>
                            <span class="fw-normal" id="txt-order-no">$orderNo <a class="text-primary">Copy</a></span>
                        </h3>
                        <a href="../Product/ProductRead.php?productId=" class="text-reset">
                            <div class="alert alert-light p-3 my-2 lead fs-6 hover-shadow">
                                <span id="txt-product-name" class="fs-5">Bio essence rose gold</span>
                                <span id="txt-product-size-color-material" class="text-capitalize">size-color-material</span>
                                <div class="d-flex justify-content-between">
                                    <label>
                                        <span id="txt-quantity">$quantity</span> item(s)
                                   </label>
                                    <label>RM <span id="txt-price">$price</span></label>
                                </div>
                            </div>
                        </a>
                        <div class="fw-bold mt-3">RM <span id="txt-total-price">$totalPrice</span></div>
                        <div>
                            <span id="txt-payment-method">$paymentMethod</span>
                        </div>
                        <div>Deliver to
                            <span id="txt-delivery-address">$deliveryAddress</span>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <div class="text-muted">Purchased on <span id="txt-order-date">$orderDate</span></div>
                            <button type="button" class="btn btn-outline-primary ms-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">review</button>
                        </div>
                    </div>
                    <!-- end of loop -->
                    <!-- loop -->
                    <div class="p-3 mb-4  bg-white shadow-3">
                        <h3 class="lead pb-2 fw-bold d-flex justify-content-between">
                            <label>Order No.</label>
                            <span class="fw-normal" id="txt-order-no">$orderNo <a class="text-primary">Copy</a></span>
                        </h3>
                        <a href="../Product/ProductRead.php?productId=" class="text-reset">
                            <div class="alert alert-light p-3 my-2 lead fs-6 hover-shadow">
                                <span id="txt-product-name" class="fs-5">Bio essence rose gold</span>
                                <span id="txt-product-size-color-material" class="text-capitalize">size-color-material</span>
                                <div class="d-flex justify-content-between">
                                    <label>
                                        <span id="txt-quantity">$quantity</span> item(s)
                                   </label>
                                    <label>RM <span id="txt-price">$price</span></label>
                                </div>
                            </div>
                        </a>
                        <div class="fw-bold mt-3">RM <span id="txt-total-price">$totalPrice</span></div>
                        <div>
                            <span id="txt-payment-method">$paymentMethod</span>
                        </div>
                        <div>Deliver to
                            <span id="txt-delivery-address">$deliveryAddress</span>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <div class="text-muted">Purchased on <span id="txt-order-date">$orderDate</span></div>
                            <button type="button" class="btn btn-outline-primary ms-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">review</button>
                        </div>
                    </div>
                    <!-- end of loop -->
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
<div class="modal fade" id="modal-review" tabindex="-1" aria-labelledby="modal-reviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="POST" id="form-review-create needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-reviewLabel"><label required>Write Review</label></h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-outline">
                        <textarea id="txt-review" class="form-control" required rows="4" autofocus></textarea>
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark" data-mdb-dismiss="modal">Post review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/FrontOffice/Order/OrderSummary.js"></script>