<!DOCTYPE html>
<?php
require '../Layout.php';
require '../CheckLogin.php';
?>

<div class="container p-5">
    <div class="row d-flex justify-content-center h-100 mt-5">
        <div class="col-3 card h-100 ">
            <!-- Tab side navs -->
            <div class="nav flex-column nav-tabs rounded" id="nav-tabs" role="tablist" aria-orientation="vertical">
                <a class="nav-link ripple rounded-top" id="seller-view-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="seller-view" aria-selected="false" href="#seller-view"><i class="fas fa-user pe-3"></i>Profile Overview</a>
                <a class="nav-link ripple" id="seller-edit-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="seller-edit" aria-selected="false" href="#seller-edit"><i class="fas fa-user-edit pe-3"></i>Update Profile</a>
                <a class="nav-link ripple" id="seller-change-password-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="seller-change-password" aria-selected="false" href="#seller-change-password"><i class="fas fa-user-lock pe-3"></i>Change Password</a>
                <a class="nav-link ripple" id="seller-delete-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="seller-delete" aria-selected="false" href="#seller-delete"><i class="fas fa-user-times pe-3"></i>Delete Account</a>
            </div>
        </div>

        <div class="col col-lg-9 ">
            <div class="card shadow text-black tab-content rounded-0 rounded-bottom ">
                <?php require 'SellerRead.php' ?>
                <?php require 'SellerUpdate.php' ?>
                <?php require 'SellerChangePassword.php' ?>
                <?php require 'SellerDelete.php' ?>
            </div>
        </div>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/BackOffice/Seller/SellerRead.js"></script>
<script src="../../../Script/BackOffice/Seller/SellerUpdate.js"></script>
<script src="../../../Script/BackOffice/Seller/SellerChangePassword.js"></script>
<script src="../../../Script/BackOffice/Seller/SellerDelete.js"></script>