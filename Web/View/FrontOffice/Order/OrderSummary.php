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
                <a class="nav-link ripple rounded-top" id="v-tabs-confirmed-payment-tab" data-mdb-toggle="tab" href="#confirmed" role="tab" aria-controls="v-tabs-confirmed-payment" aria-selected="false">Confirmed</a>
                <a class="nav-link ripple" id="v-tabs-shipped-tab" data-mdb-toggle="tab" href="#shipped" role="tab" aria-controls="v-tabs-shipped" aria-selected="false">Shipped</a>
                <a class="nav-link ripple" id="v-tabs-delivered-tab" data-mdb-toggle="tab" href="#delivered" role="tab" aria-controls="v-tabs-delivered" aria-selected="false">Delivered</a>
                <a class="nav-link ripple" id="v-tabs-closed-tab" data-mdb-toggle="tab" href="#closed" role="tab" aria-controls="v-tabs-closed" aria-selected="false">Closed</a>
            </div>
            <!-- Tab navs -->
        </div>

        <div class="col col-9">
            <!-- Tab content -->
            <div class="tab-content" id="v-tabs-tabContent">
                <div class="tab-pane fade" id="confirmed" role="tabpanel" aria-labelledby="confirmed-nav-tab">
                    <!-- loop -->
                    <div class="bg-light p-3 mb-4 shadow-1">
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
                    <div class="bg-light p-3 mb-4 shadow-1">
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
                <div class="tab-pane fade show" id="shipped" role="tabpanel" aria-labelledby="v-tabs-shipped-tab">

                </div>
                <div class="tab-pane fade" id="shipped" role="tabpanel" aria-labelledby="v-tabs-shipped-tab">

                </div>
                <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="v-tabs-delivered-tab">

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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="POST" id="form-review-create needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write Review <span class="text-danger">*</span></h5>
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
                    <!-- submit button not linking to js -->
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