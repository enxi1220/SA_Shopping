<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/EncryptionHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/EmailTypeConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/MailHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerUpdatePassword.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        if (!isset($_GET['resetCode']) || empty($_GET['resetCode'])) {
            throw new Exception("Invalid URL.");
        }
        $data = $_GET['resetCode'];

        $emailCode = EncryptionHelper::Decrypt($data);

        $email = substr($emailCode, 0, strlen($emailCode) - 3);
        $resetCode = substr($emailCode, -3);

        $seller = new Seller();
        $seller
            ->setEmail($email)
            ->setResetCode($resetCode);

        $result = SellerRead::ReadWithCode($seller);

        if (empty($result)) {
            // email not found or email and reset code not match
            throw new Exception("Invalid link.");
        }

        echo "User is verified. Please reset your password.";
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);        echo $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['seller'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['seller']);
        
        ValidationHelper::ValidatePassword($data->password);

        $emailCode = EncryptionHelper::Decrypt($data->resetCode);

        $email = substr($emailCode, 0, strlen($emailCode) - 3);
        $resetCode = substr($emailCode, -3);

        $seller = new Seller();
        $seller
            ->setEmail($email)
            ->setPassword(password_hash($data->password, PASSWORD_DEFAULT))
            ->setResetCode($resetCode);

        $result = SellerRead::ReadWithCode($seller);

        if (empty($result)) {
            // email not found or email and reset code not match
            throw new Exception("Invalid URL.");
        }

        $result = SellerUpdatePassword::Reset($seller);

        echo ResponseHelper::createJsonResponse("Reset password successfully.", "/SA_Shopping/Web/View/BackOffice/Seller/SellerLogin.php");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
