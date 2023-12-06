<?php
require $_SERVER['DOCUMENT_ROOT'] . '/SA_Shopping/Web/StyleSheet/CSS_links.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Shop Scribe</title>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/SA_Shopping/logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white position-fixed top-0 bottom-0 left-0 pt-5 shadow-3 w-auto" style="z-index: 600;">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="/SA_Shopping/BackOffice/Report/Dashboard.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i>
                        <span>Main dashboard</span>
                    </a>
                    <a href="/SA_Shopping/BackOffice/Product/ProductSummary.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-box fa-fw me-3"></i>
                        <span>Products</span>
                    </a>
                    <a href="/SA_Shopping/BackOffice/Order/OrderSummary.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-chart-bar fa-fw me-3"></i>
                        <span>Orders</span>
                    </a>
                    <a href="/SA_Shopping/BackOffice/Seller/SellerOverview.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-user fa-fw me-3"></i>
                        <span>Profile</span>
                    </a>
                    <a onclick="logout()" href="#" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-right-from-bracket fa-fw me-3"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="/SA_Shopping/BackOffice/Report/Dashboard.php">
                    <img src="/SA_Shopping/logo.png" height="40" alt="" loading="lazy" />
                </a>
                <img src="/SA_Shopping/name.png" height="40" alt="" loading="lazy" />
                <div class="lead" id="lbl-store-name"><?php echo isset($_SESSION['seller']) ? $_SESSION['seller']['storeName'] : "" ?></div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->