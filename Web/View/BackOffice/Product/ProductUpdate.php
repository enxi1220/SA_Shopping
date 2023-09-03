<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col">
            <h2 class="float-start mb-5 pt-5">Update Product</h2>
        </div>
    </div>
    <form id="form-product-update" class="needs-validation" novalidate method="POST">
        <!-- Product Information -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" name="ProductNo" id="txt-product-no" maxlength="150" class="form-control" readonly />
                    <label class="form-label" for="txt-product-no">Product No</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" name="Name" id="txt-name" maxlength="150" class="form-control" tabindex="1" required />
                    <label class="form-label" for="txt-name" required>Product Name</label>
                    <div class="invalid-feedback">Required</div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-price" class="form-control" required tabindex="2" />
                    <label class="form-label" for="txt-price" required>Price (RM)</label>
                    <div class="invalid-feedback">Required</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <textarea id="txt-description" class="form-control" required rows="4" tabindex="3"></textarea>
                    <label class="form-label" for="txt-description" required>Description</label>
                    <div class="invalid-feedback">Required</div>
                </div>
            </div>
        </div>

        <!-- Product Detail Information  -->
        <hr />
        <button type="button" id="btn-row-add" class="btn btn-success btn-floating mt-3 float-end" title="Add"><i class="fas fa-plus"></i></button>
        <label class="fs-3 fw-bold">Product Detail </label>
        <table id="product-detail-update" class="table table-striped w-100">
            <thead>
                <tr>
                    <th class="w-auto">Action</th>
                    <th class="w-auto">Status</th>
                    <th class="w-auto">Size</th>
                    <th class="w-auto">Color</th>
                    <th class="w-auto">Material</th>
                    <th class="w-auto">Minimum Stock Quantity</th>
                    <th class="w-auto">Available Stock Quantity</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Action -->
        <div class="col d-flex justify-content-end mb-4">
            <a class="btn btn-secondary btn-floating float-end" title="Back" href="ProductSummary.php" role="button">
                <i class="fas fa-arrow-left"></i>
            </a>
            <button type="submit" id="btn-product-edit" class="btn btn-dark btn-floating ms-4" title="Save">
                <i class="fas fa-floppy-disk"></i>
            </button>
        </div>
    </form>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductUpdate.js"></script>