<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col">
            <h2 class="float-start mb-5 pt-5">View Order</h2>
        </div>
    </div>
    <form id="form-order-read" method="GET">
        <!-- Order Info -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-order-no" class="form-control" readonly />
                    <label class="form-label" for="txt-order-no">Order No</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-status" class="form-control" readonly />
                    <label class="form-label" for="txt-status">Status</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-price" class="form-control" readonly />
                    <label class="form-label" for="txt-price">Order Total (RM)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-delivery-fee" class="form-control" readonly />
                    <label class="form-label" for="txt-delivery-fee">Delivery Fee</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-created-date" class="form-control" readonly />
                    <label class="form-label" for="txt-created-date">Created Date</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-updated-date" class="form-control" readonly />
                    <label class="form-label" for="txt-updated-date">Updated Date</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <textarea class="form-control" id="txt-delivery-address" rows="4" readonly></textarea>
                    <label class="form-label" for="txt-delivery-address">Delivery Address</label>
                </div>
            </div>
        </div>

        <!-- Product Information -->
        <fieldset class="mb-3 border p-3">
            <legend class="w-auto">Purchase</legend>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-product-name" class="form-control" readonly />
                        <label class="form-label" for="txt-product-name">Product Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-price" class="form-control" readonly />
                        <label class="form-label" for="txt-price">Price (RM)</label>
                    </div>

                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-quantity" class="form-control" readonly />
                        <label class="form-label" for="txt-quantity">Quantity</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-payment-method" class="form-control" readonly />
                        <label class="form-label" for="txt-payment-method">Payment Method</label>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-outline">
                        <input type="text" id="txt-product-size" class="form-control" readonly />
                        <label class="form-label" for="txt-product-size">Size</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-outline">
                        <input type="text" id="txt-product-color" class="form-control" readonly />
                        <label class="form-label" for="txt-product-color">Color</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-outline">
                        <input type="text" id="txt-product-material" class="form-control" readonly />
                        <label class="form-label" for="txt-product-material">Material</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- Buyer Information -->
        <fieldset class="mb-3 border p-3">
            <legend class="w-auto">Buyer Information</legend>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-buyer-name" class="form-control" readonly />
                        <label class="form-label" for="txt-buyer-name">Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-buyer-phone" class="form-control" readonly />
                        <label class="form-label" for="txt-buyer-phone">Phone</label>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-outline">
                        <input type="text" id="txt-buyer-email" class="form-control" readonly />
                        <label class="form-label" for="txt-buyer-email">Email</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- Action -->
        <div class="col d-flex justify-content-end mb-4">
            <a class="btn btn-secondary btn-floating float-end" title="Back" href="OrderSummary.php" role="button">
                <i class="fas fa-arrow-left"></i>
            </a>
            <button type="button" id="btn-confirm" class="btn btn-success btn-floating float-end ms-2" title="Confirm">
                <i class="fas fa-check"></i>
            </button>
            <button type="button" id="btn-ship" class="btn btn-primary btn-floating float-end ms-2" title="Ship">
                <i class="fas fa-box"></i>
            </button>
            <button type="button" id="btn-deliver" class="btn btn-warning btn-floating float-end ms-2" title="Deliver">
                <i class="fas fa-truck"></i>
            </button>
        </div>
    </form>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductCreate.js"></script>