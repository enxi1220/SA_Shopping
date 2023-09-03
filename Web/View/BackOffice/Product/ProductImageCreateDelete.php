<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col">
            <h2 class="float-start mb-5 pt-5">Product Image</h2>
        </div>
    </div>
    <form action="POST" id="form-product-image-create" novalidate class="needs-validation">
        <label class="fs-3">Add Image</label>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-outline">
                    <input type="file" id="txt-image" name="ProductImage" class="form-control" tabindex="1" onchange="picturePreview(this)" required multiple accept="image/jpeg, image/png, image/gif">
                    <!-- <label class="form-label" for="txt-image" required>Product Image</label> -->
                    <div class="invalid-feedback">Required and only allow jpg, jpeg, png, gif file types</div>
                </div>
            </div>
            <div class="col-md-8">
                <div class=""></div>
                <img src="" id="img-preview" class="img-fluid" />
            </div>
        </div>
        <!-- Action -->
        <div class="col d-flex justify-content-end my-4">
            <button type="submit" id="btn-product-add" class="btn btn-dark btn-floating ms-4" title="Save">
                <i class="fas fa-floppy-disk"></i>
            </button>
        </div>
    </form>

    <form id="form-product-image-delete">
        <hr />
        <label class="fs-3">Delete Image</label>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 mb-4">
            <div class="col">
                <div class="overflow-hidden m-2 d-flex justify-content-end position-relative">
                    <img src="/SA_Shopping/Web/Image/iu-fighting.gif" class="h-100 w-auto object-cover" alt="Product Image" />
                    <button class="position-absolute btn btn-floating btn-danger text-white m-3" type="button" onclick="deleteProductImage(1)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="overflow-hidden m-2 d-flex justify-content-end position-relative">
                    <img src="/SA_Shopping/Web/Image/iu-fighting.gif" class="h-100 w-auto object-cover" alt="Product Image" />
                    <button class="position-absolute btn btn-floating btn-danger text-white m-3" type="button" onclick="deleteProductImage()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="overflow-hidden m-2 d-flex justify-content-end position-relative">
                    <img src="/SA_Shopping/Web/Image/iu-fighting.gif" class="h-100 w-auto object-cover" alt="Product Image" />
                    <button class="position-absolute btn btn-floating btn-danger text-white m-3" type="button" onclick="deleteProductImage()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="overflow-hidden m-2 d-flex justify-content-end position-relative">
                    <img src="/SA_Shopping/Web/Image/iu-fighting.gif" class="h-100 w-auto object-cover" alt="Product Image" />
                    <button class="position-absolute btn btn-floating btn-danger text-white m-3" type="button" onclick="deleteProductImage()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="overflow-hidden m-2 d-flex justify-content-end position-relative">
                    <img src="/SA_Shopping/Web/Image/iu-fighting.gif" class="h-100 w-auto object-cover" alt="Product Image" />
                    <button class="position-absolute btn btn-floating btn-danger text-white m-3" type="button" onclick="deleteProductImage()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Action -->
    <div class="col d-flex justify-content-end mb-4">
        <a class="btn btn-secondary btn-floating float-end" title="Back" href="ProductSummary.php" role="button">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-product-image-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to delete the image?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark" data-mdb-dismiss="modal" id="btn-product-image-delete">Confirm</button>
            </div>
        </div>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Product/ProductImageCreateDelete.js"></script>