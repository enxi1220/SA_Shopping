<?php
require '../Layout.php';
?>
<div class="p-5 shadow bg-white offset-2 h-100 overflow-auto">
    <div class="row">
        <div class="col justify-content-between mb-5">
            <h2 class="pt-5">Review Summary</h2>
        </div>
    </div>
    <table id="review-summary" class="table table-striped w-100">
        <thead>
            <tr>
                <th>SKU No.</th>
                <th>Buyer Email</th>
                <th>Reviews</th>
                <th>Sentiment</th>
                <th>Created Date</th>
                <th>Updated Date</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- Action -->
    <div class="col d-flex justify-content-end mb-4">
        <a class="btn btn-secondary btn-floating float-end" title="Back" href="../Product/ProductSummary.php" role="button">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Review/ReviewSummary.js"></script>