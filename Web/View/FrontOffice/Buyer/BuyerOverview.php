<!DOCTYPE html>
<?php
require '../Layout.php';
?>

<div class="container p-5">
    <div class="row d-flex justify-content-center h-100 mt-5">
        <div class="col-3 card h-100 ">
            <!-- Tab side navs -->
            <div class="nav flex-column nav-tabs rounded" id="nav-tabs" role="tablist" aria-orientation="vertical">
                <a class="nav-link ripple rounded-top" id="buyer-view-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="buyer-view" aria-selected="false" href="#buyer-view"><i class="fas fa-user pe-3"></i>Profile Overview</a>
                <a class="nav-link ripple" id="buyer-edit-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="buyer-edit" aria-selected="false" href="#buyer-edit"><i class="fas fa-user-edit pe-3"></i>Edit Profile</a>
                <a class="nav-link ripple" id="buyer-change-password-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="buyer-change-password" aria-selected="false" href="#buyer-change-password"><i class="fas fa-user-lock pe-3"></i>Change Password</a>
                <a class="nav-link ripple" id="buyer-delete-nav-tab" data-mdb-ripple-color="info" data-mdb-toggle="tab" role="tab" aria-controls="buyer-delete" aria-selected="false" href="#buyer-delete"><i class="fas fa-user-times pe-3"></i>Delete Account</a>
            </div>
        </div>

        <div class="col col-lg-9 ">
            <div class="card shadow text-black tab-content rounded-0 rounded-bottom ">
                <?php require 'BuyerRead.php' ?>
                <?php require 'BuyerUpdate.php' ?>
                <?php require 'BuyerChangePassword.php' ?>
                <?php require 'BuyerDelete.php' ?>
            </div>
        </div>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/FrontOffice/Buyer/BuyerDelete.js"></script>
<!-- <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/TARUMT_Event_Ticketing/Web/Script/FrontOffice/User/UserRead.js" type="text/javascript"></script> -->
<!-- <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/TARUMT_Event_Ticketing/Web/Script/FrontOffice/User/UserUpdate.js" type="text/javascript"></script> -->