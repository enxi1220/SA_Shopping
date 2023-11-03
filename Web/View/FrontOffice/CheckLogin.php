<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/SA_Shopping/Web/Library/sweetalert2.all.min.js" type="text/javascript"></script>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['buyer'])) {
    echo "
        <script>
            Swal.fire({
                title: 'Login Required',
                text: 'You need to log in to access this page.',
                icon: 'info',
                showCancelButton: false,
                confirmButtonText: 'Log In',
            })
            setTimeout(function() {
                window.location.href = '../Buyer/BuyerLogin.php';
            }, 2000);
        </script>";
    // header('Location: ../Buyer/BuyerLogin.php');
    exit;
}