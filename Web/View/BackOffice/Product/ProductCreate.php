<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100">
    <div class="row">
        <div class="col">
            <h2 class="float-start mb-5 pt-5">Add Product</h2>
        </div>
    </div>
    <form id="form-product-create" class="needs-validation" novalidate method="POST">
        <!-- Product Information & images -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" name="Name" id="txt-name" maxlength="150" class="form-control" tabindex="1" required />
                    <label class="form-label" for="txt-name">Product Name <span class="text-danger">*</span></label>
                    <div class="invalid-feedback">Required</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="text" id="txt-price" class="form-control" required tabindex="2" />
                    <label class="form-label" for="txt-price">Price (RM)<span class="text-danger">*</span></label>
                    <div class="invalid-feedback">Required</div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-outline">
                    <textarea id="txt-description" class="form-control" required rows="4" tabindex="3"></textarea>
                    <label class="form-label" for="txt-description">Description <span class="text-danger">*</span></label>
                    <div class="invalid-feedback">Required</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline">
                    <input type="file" id="txt-image" name="ProductImage" class="form-control" tabindex="4" required multiple accept="image/jpeg, image/png, image/gif">
                    <!-- <label class="form-label" for="txt-image">Product Image <span class="text-danger">*</span></label> -->
                    <div class="invalid-feedback">Required and only allow jpg, jpeg, png, gif file types</div>
                </div>
            </div>
        </div>

        <!-- Product Detail Information  -->
        <hr />
        <button type="button" id="btn-row-add" class="btn btn-success btn-floating mt-3" title="Add"><i class="fas fa-plus"></i></button>
        <span class="fs-5 fw-bold">Product Detail </span>
        <table id="product-detail-create" class="table table-striped w-100">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Material</th>
                    <th>Minimum Stock Quantity</th>
                    <th>Available Stock Quantity</th>
                </tr>
            </thead>
            <tbody>
                <!-- todo: make every row id unique -->
                <tr>
                    <td></td>
                    <td><input type="text" id="txt-size" class="form-control" required /></td>
                    <td><input type="text" id="txt-color" class="form-control" required /></td>
                    <td><input type="text" id="txt-material" class="form-control" required /></td>
                    <td><input type="number" id="txt-min-stock-qty" class="form-control" required min="0"/></td>
                    <td><input type="number" id="txt-available-stock-qty" class="form-control" required min="0"/></td>
                </tr>
            </tbody>
        </table>
        <!-- Action -->
        <div class="col d-flex justify-content-end mb-4">
            <a class="btn btn-secondary btn-floating float-end" title="Back" href="ProductSummary.php" role="button">
                <i class="fas fa-arrow-left"></i>
            </a>
            <button type="submit" id="btn-product-add" class="btn btn-dark btn-floating ms-4" title="Save">
                <i class="fas fa-floppy-disk"></i>
            </button>
        </div>
    </form>
</div>
<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductCreate.js"></script>