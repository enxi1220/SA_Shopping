<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col">
            <h2 class="float-start mb-5 pt-5">View Product</h2>
        </div>
    </div>
    <form id="form-product-read">
        <!-- Product -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" name="ProductNo" id="txt-product-no" maxlength="150" class="form-control" tabindex="1" readonly />
                    <label class="form-label" for="txt-product-no">Product No</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" name="Name" id="txt-name" maxlength="150" class="form-control" tabindex="2"  readonly />
                    <label class="form-label" for="txt-name" required>Product Name</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-price" class="form-control" tabindex="3" readonly />
                    <label class="form-label" for="txt-price" required>Price (RM)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <textarea id="txt-description" class="form-control" tabindex="4" rows="4" readonly></textarea>
                    <label class="form-label" for="txt-description" required>Description</label>
                </div>
            </div>
        </div>

        <!-- Product Detail  -->
        <hr />
        <label class="fs-3">Product Detail</label>
        <table id="product-detail-summary" class="table table-striped w-100">
            <thead>
                <tr>
                    <th class="w-auto">SKU No.</th>
                    <th class="w-auto">Status</th>
                    <th class="w-auto">Size</th>
                    <th class="w-auto">Color</th>
                    <th class="w-auto">Material</th>
                    <th class="w-auto">Minimum Stock Quantity</th>
                    <th class="w-auto">Available Stock Quantity</th>
                    <th class="w-auto">Sales Out Quantity</th>
                    <th class="w-auto">Created Date</th>
                    <th class="w-auto">Updated Date</th>
                    <th class="w-auto">Updated By</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Image -->
        <hr />
        <label class="fs-3 mb-3">Product Images </label>
        <div id="product-images" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
            
        </div>

        <!-- Action -->
        <div class="col d-flex justify-content-end mb-4">
            <a class="btn btn-secondary btn-floating float-end" title="Back" href="ProductSummary.php" role="button">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </form>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductRead.js"></script>