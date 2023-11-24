<?php
require '../Layout.php';
require '../CheckLogin.php';
?>

<head>
    <style>
        .carousel-controls {
            position: absolute;
            top: 0;
            right: 0;
            margin-top: 10px;
            /* Adjust the margin as needed */
            margin-right: 10px;
            /* Adjust the margin as needed */
            display: flex;
            flex-direction: row;
            /* Make the buttons align horizontally */
        }

        /* .carousel-control-prev, */
        .carousel-control-next {
            /* Add any additional styling you need for the buttons */
            transform: rotate(360deg);
            /* Rotate the buttons 90 degrees */
        }
    </style>
</head>
<div class="p-5 shadow bg-white offset-2 h-100">
    <div class="row">
        <div class="col justify-content-between mb-5">
            <h2 class="pt-5">Product Review Sentiment</h2>
        </div>
    </div>
    <div id="carousel-charts" class="carousel slide carousel-dark" data-mdb-ride="carousel" data-mdb-carousel-init>
        <div class="carousel-inner">
            <!-- Single item -->
            <div id="review" class="carousel-item active">
                <canvas id="chart-review" width="200" height="100"></canvas>
            </div>

            <!-- Single item -->
            <div id="stock" class="carousel-item ">
                <canvas id="chart-stock" width="200" height="100"></canvas>
            </div>

            <!-- Single item -->
            <div id="sales" class="carousel-item">
                <canvas id="chart-sales" width="200" height="100"></canvas>
            </div>
            <!-- <canvas id="myPieChart" width="400" height="300"></canvas> -->
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <div class="carousel-controls">
            <!-- <button class="carousel-control-prev" type="button" data-mdb-target="#carousel-charts" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button> -->
            <button class="carousel-control-next" type="button" data-mdb-target="#carousel-charts" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel wrapper -->
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Dashboard.js"></script>