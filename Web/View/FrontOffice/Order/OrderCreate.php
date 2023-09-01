<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb " class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../Product/ProductSummary.php">Product Catalog</a></li>
        <li class="breadcrumb-item"><a href="../Product/ProductRead.php?productId=">Product Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order Form</li>
    </ol>
</nav>

<form class="m-4 needs-validation" id="form-order-create" method="POST" novalidate>
    <div class="row">
        <div class="col-8">
            <div class="container p-3 m-1">
                <div class="row">
                    <div class="col-3">
                        <img id="img-product" class="img-fluid rounded float-start" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" alt="Product name" />
                        <span class="badge rounded-pill badge-notification bg-danger fs-6" id="txt-quantity">1</span>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-between">
                        <div id="txt-product-name-size-color-material" class="fs-5">Product name - size/color/material</div>
                        <div id="txt-unit-price" class="fs-5">RM 34</div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-outline">
                <textarea id="txt-delivery-address" class="form-control" required rows="4" tabindex="1"></textarea>
                <label class="form-label" for="txt-delivery-address">Delivery Address <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-4">
            <div class="card p-5 m-1">
                <h5 class="mb-4">The total amount</h5>
                <div class="d-flex justify-content-between">
                    <div>Order</div>
                    <div id="txt-price">RM 34</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>Delivery</div>
                    <div id="txt-delivery-fee">RM 4.90</div>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">Total</div>
                    <div id="txt-total-price">RM 38.90</div>
                </div>
                <hr />
                <h5 class="mb-4">Select a payment method <span class="text-danger">*</span></h5>

                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-cod" data-mdb-toggle="pill" href="#pills-cod" role="tab" aria-controls="pills-cod" aria-selected="true">COD</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-e-wallet" data-mdb-toggle="pill" href="#pills-e-wallet" role="tab" aria-controls="pills-e-wallet" aria-selected="false">e-wallet</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-card" data-mdb-toggle="pill" href="#pills-card" role="tab" aria-controls="pills-card" aria-selected="false">card</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show" id="pills-cod" role="tabpanel" aria-labelledby="tab-cod">
                        <div class="alert alert-info">
                            <strong>Note:</strong> Please keep the exact amount ready for payment when the delivery is made.
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary w-100 mt-4 btn-rounded" value="Cash on Delivery">Check Out</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-e-wallet" role="tabpanel" aria-labelledby="tab-e-wallet">
                        <div class="alert alert-info">
                            <strong>Note:</strong> You will be redirected to the e-wallet payment page for completing the transaction. Please make sure you have your e-wallet credentials ready.
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary w-100 mt-4 btn-rounded" value="E-Wallet">Check Out</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-card" role="tabpanel" aria-labelledby="tab-card">
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-outline">
                                    <input type="text" id="txt-card-number" class="form-control" tabindex="5" pattern="^\d{4}\s?\d{4}\s?\d{4}\s?\d{4}$" minlength="19" maxlength="19" placeholder="0000 0000 0000 0000"/>
                                    <label class="form-label" for="txt-card-number">Card Number <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-outline">
                                    <input type="password" id="txt-cvv" class="form-control" tabindex="6" pattern="^\d{3}$" minlength="3" maxlength="3" placeholder="000"/>
                                    <label class="form-label" for="txt-cvv">CVV <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-outline">
                                    <input type="text" id="txt-expiry-date" class="form-control" tabindex="7" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" maxlength="5" minlength="5" placeholder="12/30"/>
                                    <label class="form-label" for="txt-expiry-date">Expiry Date <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary w-100 mt-4 btn-rounded" value="Card">Check Out</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pills content -->
            </div>
        </div>
    </div>
</form>

<?php
require '../Footer.php';
?>
<script src="../../../Script/FrontOffice/Order/OrderCreate.js"></script>