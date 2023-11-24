<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/EncryptionHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/EmailTypeConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/MailHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerUpdate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);

        $buyer = new Buyer();
        $buyer->setEmail($data->email);

        $result = BuyerRead::Read($buyer);

        if (empty($result)) {
            // email not found
            echo ResponseHelper::createJsonResponse("Please check your email.");
            exit;
        }

        $result = $result[0];

        $resetCode = rand(100, 999);
        $encryptedData = EncryptionHelper::Encrypt($buyer->getEmail() . $resetCode);
    
        $placeholders = ['ResetCode' => urlencode($encryptedData)];

        $buyer->setResetCode($resetCode);
        
        MailHelper::SendMail(
            $buyer->getEmail(),
            $result->getName(),
            EmailTypeConstant::BUYER_RESET_PASS,
            $placeholders
        );

        BuyerUpdate::ResetCode($buyer);

        echo ResponseHelper::createJsonResponse("An email has been sent. Please check your mailbox.");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);        echo $e->getMessage();
    }
}
