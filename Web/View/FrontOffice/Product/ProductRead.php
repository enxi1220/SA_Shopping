<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb" class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="ProductSummary.php">Product Catalog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
    </ol>
</nav>
<div class="p-5 pt-3 bg-white">
    <div class="row">
        <!-------- Product Images -------->
        <div class="col-xs-12 col-md-4 mt-3 mb-5">
            <div id="carouselMDExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                <!----- Slides ----->
                <div id="product-image" class="carousel-inner mb-5 shadow-1-strong rounded-3">
                </div>
                <!----- Slides ----->

                <!----- Controls ----->
                <button class="carousel-control-prev text-muted" type="button" data-mdb-target="#carouselMDExample" data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next text-muted" type="button" data-mdb-target="#carouselMDExample" data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <!----- Controls ----->

                <!----- Thumbnails ----->
                <div id="product-image-thumbnail" class="carousel-indicators" style="margin-bottom: -20px;">

                </div>
                <!----- Thumbnails ----->
            </div>
        </div>
        <!-------- End Product Images -------->

        <!-------- Product -------->
        <div class="col-xs-12 col-md-8 mt-2 position-relative">
            <h2 id="txt-name"></h2>
            <h4>RM <span id="txt-price"></span> </h4>
            <div class="border-top pt-3 mb-3 pt-4">
                <h6>Description</h6>
                <p id="txt-description">
                </p>
            </div>

            <!----- Product Detail ----->
            <div class="row d-flex align-items-center mb-3 mt-4">
                <div class="col">
                    <h6>
                        <label required>Variations</label>
                        <label class="text-muted mt-2 ms-2"><span id="txt-available-qty"></span> item(s) left</label>
                    </h6>
                    <div class="form-outline">
                        <div id="product-detail">
                        </div>

                    </div>

                </div>
            </div>
            <!----- Quantity ----->
            <div class="col-md-12 d-flex justify-content-between align-items-center mt-4 pb-4">
                <div class="col-md-6">
                    <h6 class="mb-0"><label required>Quantity</label> </h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button class="btn btn-link px-2" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input id="txt-quantity" min="1" value="1" name="quantity" type="number" class="form-control form-control-sm text-center" />

                    <button class="btn btn-link px-2" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!----- End Quantity ----->
            <!-------- End Product Details -------->

            <!-- Seller  -->
            <div class="row d-flex justify-content-center border-top pt-3">
                <div class="col-xs-12 col-md-12 col-lg-3 card h-100 p-4 text-center">
                    <span class="mb-0 fs-5 fw-" id="txt-seller-name"></span>
                    <p class="mb-2 ms-3 text-muted"><small> Last login at <span id="txt-seller-last-login-date"></span></small></p>
                    <p class="mb-2">Join on <span id="txt-seller-created-date"></span></p>

                    <a class="btn btn-outline-info mb-3" role="button" id="txt-seller-email" hrerf>Email me</a>
                    <button class="btn btn-outline-dark">Whatsapp me</button>
                </div>

                <div class="col-xs-12 col-md-12 col-lg-9 ps-4 pt-4">
                    <h4 id="txt-store-name"></h4>
                    <div>
                        <i class="fas fa-location-dot fs-5"></i>
                        <p id="txt-business-address"></p>
                    </div>
                    <div>
                        <i class="fas fa-circle-info fs-5"></i>
                        <p id="txt-store-desc"></p>
                    </div>
                </div>
            </div>
            <!-- End of seller -->

            <div class="row mt-3 position-absolute bottom-0 end-0">
                <div class="col-md-12 mt-2">
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="submit" id="btn-buy-now">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />
    <?php
    require '../Review/ReviewSummary.php';
    ?>
</div>

<button type="button" class="btn btn-black btn-floating btn-lg m-2 opacity-75" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<?php
require '../Footer.php';
?>

<script src="../../../Script/FrontOffice/Product/ProductRead.js"></script>
<script src="../../../Script/FrontOffice/Review/ReviewSummary.js"></script>