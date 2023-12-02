<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb " class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Product Catalog</li>
    </ol>
</nav>

<div class="p-5 pt-3 bg-light">
    <div id="product" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 g-4">
    </div>
</div>
<button type="button" class="btn btn-black btn-floating btn-lg m-2 opacity-75" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<?php
require '../Footer.php';
?>
<script src="/SA_Shopping/FrontOffice/Product/ProductSummary.js"></script>