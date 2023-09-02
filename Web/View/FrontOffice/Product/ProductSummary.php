<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb " class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Product Catalog</li>
    </ol>
</nav>
<!-- 
    https://media.glamour.com/photos/607f2749febb5e66fe7c52cf/1:1/w_1200,h_1200,c_limit/terry%20cloth%20trend_jumpsuit.jpg
    https://down-my.img.susercontent.com/file/85317e6d1ed48cd1acf01c39386d5357
    https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a
    https://rukminim1.flixcart.com/image/450/500/l51d30w0/shoe/z/w/c/10-mrj1914-10-aadi-white-black-red-original-imagft9k9hydnfjp.jpeg?q=90&crop=false
    https://abaro.com.my/image/cache/data/Products/Men%20Formal%20Shoes/COMMERPLUS/FMA733F3%20-01-1000x1000_0.jpg
    https://cf.shopee.ph/file/590f003ff837b620b0f4121d516b7a19
    https://rukminim2.flixcart.com/image/550/650/klqx30w0/jean/i/t/v/32-kttladiesjeans848-kotty-original-imagyt4gu8sperbe.jpeg?q=90&crop=false 
-->
<div class="p-5 pt-3 bg-light">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        <!-- products  -->
        <div class="col">
            <a class="text-reset" href="ProductRead.php?productId=">
                <div class="card h-100 hover-shadow ">
                    <img width="500" height="400" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="card-img-top" alt="Palm Springs Road" loading="lazy" />
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" id="progress-bar-negative" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-warning fs-5" id="progress-bar-neutral" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-success fs-5" id="progress-bar-positive" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">Negative</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">16</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Neutral</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">35</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Positive</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end of ptoducts  -->
        <!-- hard code  -->
        <div class="col">
            <a class="text-reset" href="ProductRead.php?productId=">
                <div class="card h-100 hover-shadow">
                    <img width="500" height="400" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="card-img-top" alt="Palm Springs Road" />
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" id="progress-bar-negative" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-warning fs-5" id="progress-bar-neutral" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-success fs-5" id="progress-bar-positive" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">Negative</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">16</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Neutral</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">35</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Positive</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col">
            <a class="text-reset" href="ProductRead.php?productId=">
                <div class="card h-100 hover-shadow">
                    <img width="500" height="400" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="card-img-top" alt="Palm Springs Road" />
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" id="progress-bar-negative" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-warning fs-5" id="progress-bar-neutral" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-success fs-5" id="progress-bar-positive" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">Negative</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">16</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Neutral</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">35</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Positive</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col">
            <a class="text-reset" href="ProductRead.php?productId=">
                <div class="card h-100 hover-shadow">
                    <img width="500" height="400" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="card-img-top" alt="Palm Springs Road" />
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" id="progress-bar-negative" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-warning fs-5" id="progress-bar-neutral" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-success fs-5" id="progress-bar-positive" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">Negative</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">16</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Neutral</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">35</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Positive</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col">
            <a class="text-reset" href="ProductRead.php?productId=">
                <div class="card h-100 hover-shadow">
                    <img width="500" height="400" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="card-img-top" alt="Palm Springs Road" />
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" id="progress-bar-negative" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-warning fs-5" id="progress-bar-neutral" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-success fs-5" id="progress-bar-positive" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">Negative</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">16</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Neutral</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">35</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Positive</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col">
            <a class="text-reset" href="ProductRead.php?productId=">
                <div class="card h-100 hover-shadow">
                    <img width="500" height="400" src="https://down-my.img.susercontent.com/file/869ca7cd68610f89beafbf107230860a" class="card-img-top" alt="Palm Springs Road" />
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                    <div class="card-footer">
                        <div class="progress rounded h-25">
                            <div class="progress-bar bg-danger fs-5" id="progress-bar-negative" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-warning fs-5" id="progress-bar-neutral" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="m-2"></div>
                            <div class="progress-bar bg-success fs-5" id="progress-bar-positive" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between my-2">
                            <div class="fs-6">
                                <span class="text-muted">Negative</span>
                                <br />
                                <i class="far fa-face-frown text-danger"></i>
                                <span id="txt-negative">16</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Neutral</span>
                                <br />
                                <i class="far fa-face-meh text-warning"></i>
                                <span id="txt-neutral">35</span>
                            </div>
                            <div class="">
                                <span class="text-muted">Positive</span>
                                <br />
                                <i class="far fa-face-smile text-success"></i>
                                <span id="txt-positive">101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<button type="button" class="btn btn-black btn-floating btn-lg m-2 opacity-75" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<?php
require '../Footer.php';
?>
<script src="../../../Script/FrontOffice/Product/ProductSummary.js"></script>