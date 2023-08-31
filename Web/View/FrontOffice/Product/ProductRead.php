<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb " class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="ProductSummary.php">Product Catalog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
    </ol>
</nav>

<div class="container p-3 bg-white mt-3">
    <div class="row">
        <!-------- Product Images -------->
        <div class="col-xs-12 col-md-5 mt-3 mb-5">
            <div id="carouselMDExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                <!----- Slides ----->
                <div class="carousel-inner mb-5 shadow-1-strong rounded-3">

                    <div class="carousel-item active">
                        <img src="https://images.threadsmagazine.com/app/uploads/5139/13/11201922/131-turn-of-cloth-01-main.jpg" class="d-block w-100" alt="..." style="object-fit: cover;" />
                    </div>

                    <!-- loop from second-->
                    <div class="carousel-item">
                        <img src="https://media.glamour.com/photos/607f2749febb5e66fe7c52cf/1:1/w_1200,h_1200,c_limit/terry%20cloth%20trend_jumpsuit.jpg" class="d-block w-100" alt="..." style="object-fit: cover;" />
                    </div>
                    <div class="carousel-item">
                        <img src="https://down-my.img.susercontent.com/file/85317e6d1ed48cd1acf01c39386d5357" class="d-block w-100" alt="..." style="object-fit: cover;" />
                    </div>
                    <div class="carousel-item">
                        <img src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="d-block w-100" alt="..." style="object-fit: cover;" />
                    </div>
                    <!-- end of loop  -->
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
                <div class="carousel-indicators" style="margin-bottom: -20px;">
                    <button type="button" data-mdb-target="#carouselMDExample" data-mdb-slide-to="0" class="active" aria-current="true" style="width: 100px;">
                        <img class="d-block w-100 shadow-1-strong rounded" src="https://images.threadsmagazine.com/app/uploads/5139/13/11201922/131-turn-of-cloth-01-main.jpg" class="img-fluid" style="object-fit: cover;" />
                    </button>
                    <!-- loop from second -->
                    <button type="button" data-mdb-target="#carouselMDExample" data-mdb-slide-to="1" style="width: 100px;">
                        <img class="d-block w-100 shadow-1-strong rounded" src="https://media.glamour.com/photos/607f2749febb5e66fe7c52cf/1:1/w_1200,h_1200,c_limit/terry%20cloth%20trend_jumpsuit.jpg" class="img-fluid" style="object-fit: cover;" />
                    </button>
                    <button type="button" data-mdb-target="#carouselMDExample" data-mdb-slide-to="2" style="width: 100px;">
                        <img class="d-block w-100 shadow-1-strong rounded" src="https://down-my.img.susercontent.com/file/85317e6d1ed48cd1acf01c39386d5357" class="img-fluid" style="object-fit: cover;" />
                    </button>
                    <button type="button" data-mdb-target="#carouselMDExample" data-mdb-slide-to="3" style="width: 100px;">
                        <img class="d-block w-100 shadow-1-strong rounded" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="img-fluid" style="object-fit: cover;" />
                    </button>
                    <!-- end of loop  -->
                </div>
                <!----- Thumbnails ----->
            </div>
        </div>
        <!-------- Product Images -------->

        <!-------- Product -------->
        <div class="col-xs-12 col-md-7 mt-2">
            <h1>Product Name</h1>
            <h3>RM</h3>
            <div class="border-top pt-3 mb-3" style="min-height: 138px;">
                <p>description...</p>
            </div>

            <!----- Product Detail ----->
            <div class="row d-flex align-items-center mb-3">
                <div class="col">
                    <h6>Variations</h6>
                    <input type="radio" class="btn-check" name="details-option" id="${details.1}" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary mt-1" for="${details.1}">Pink - S - Cotton</label>
                    <input type="radio" class="btn-check" name="details-option" id="${details.2}" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary mt-1" for="${details.2}">Yellow - S - Cotton</label>
                    <input type="radio" class="btn-check" name="details-option" id="${details.3}" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary mt-1" for="${details.3}">Blue - S - Cotton</label>
                    <input type="radio" class="btn-check" name="details-option" id="${details.4}" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary mt-1" for="${details.4}">Blue - S - Cotton</label>
                    <input type="radio" class="btn-check" name="details-option" id="${details.5}" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary mt-1" for="${details.5}">Blue - S - Cotton</label>
                    <input type="radio" class="btn-check" name="details-option" id="${details.6}" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary mt-1" for="${details.6}">Blue - S - Cotton</label>
                </div>
            </div>
            <!----- Quantity ----->
            <div class="col-md-12 d-flex justify-content-between align-items-center border-bottom mt-4 pb-4">
                <div class="col-md-6">
                    <h6 class="mb-0">Quantity</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input id="txt-quantity" min="1" name="quantity" value="1" type="number" class="form-control form-control-sm text-center" />
                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!----- Quantity ----->
            <!-------- Product Details -------->

            <div class="mt-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-shop fs-5"></i>
                    <span class="mx-2" id="txt-store-name">Store 1</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-location-dot fs-5"></i>
                    <span class="mx-2" id="txt-business-address">123 Business St</span>
                </div>
            </div>

            <div class="row mt-3 align-items-center">
                <div class="col-md-12 mt-2">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-dark w-25" type="button" id="btn-buy-now">Buy Now</button>
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
<!------------------- Outer Container ------------------->
<!-- <script src="<%=request.getContextPath()%>/Scripts/FrontOffice/Product/Fo.ProductView.js" type="text/javascript"></script> -->