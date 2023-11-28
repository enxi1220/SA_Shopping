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
    <title></title>
</head>

<body>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <!-- Container wrapper -->
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand" href="/SA_Shopping/Web/View/FrontOffice/Product/ProductSummary.php">
                <img src="/SA_Shopping/Web/Image/iu-fighting.gif" height="40" alt="" loading="lazy" />
            </a>
            <!-- Search  -->
            <div class="input-group my-auto mx-4">
                <input type="text" class="form-control" placeholder="Search product" aria-label="Search product" aria-describedby="btn-search" />
                <button class="btn btn-danger" type="button" id="btn-search" data-mdb-ripple-color="dark">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center btn btn-outline-dark btn-floating text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/SA_Shopping/Web/View/FrontOffice/Buyer/BuyerOverview.php">My profile</a></li>
                        <li><a class="dropdown-item" href="/SA_Shopping/Web/View/FrontOffice/Order/OrderSummary.php">Purchase History</a></li>
                      <?php if (isset($_SESSION['buyer'])) : ?>
                        <li><a class="dropdown-item" href="#" onclick="logout()">Logout</a></li>
                      <?php else : ?>
                        <li><a class="dropdown-item" href="/SA_Shopping/Web/View/FrontOffice/Buyer/BuyerLogin.php">Login</a></li>
                      <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>