<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/SA_Shopping/sweetalert2.all.min.js" type="text/javascript"></script>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['buyer'])) {
    echo "
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Login Required',
                text: 'Please login to proceed',
                showCancelButton: false,
                confirmButtonText: 'Log In',
            })
            setTimeout(function() {
                window.location.href = window.location.origin + '/SA_Shopping/FrontOffice/Buyer/BuyerLogin.php';
            }, 2000);
        </script>";
    exit;
}