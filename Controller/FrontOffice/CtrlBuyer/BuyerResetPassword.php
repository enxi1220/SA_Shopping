<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/EncryptionHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/EmailTypeConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/MailHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerUpdatePassword.php";
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

        $buyer = new Buyer();
        $buyer
            ->setEmail($email)
            ->setResetCode($resetCode);

        $result = BuyerRead::ReadWithCode($buyer);

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

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);

        $emailCode = EncryptionHelper::Decrypt($data->resetCode);

        $email = substr($emailCode, 0, strlen($emailCode) - 3);
        $resetCode = substr($emailCode, -3);

        $buyer = new Buyer();
        $buyer
            ->setEmail($email)
            ->setPassword(password_hash($data->password, PASSWORD_DEFAULT))
            ->setResetCode($resetCode);

        $result = BuyerRead::ReadWithCode($buyer);

        if (empty($result)) {
            // email not found or email and reset code not match
            throw new Exception("Invalid link.");
        }

        $result = BuyerUpdatePassword::Reset($buyer);

        echo ResponseHelper::createJsonResponse("Reset password successfully.", "/SA_Shopping/Web/View/FrontOffice/Buyer/BuyerLogin.php");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);        echo $e->getMessage();
    }
}
