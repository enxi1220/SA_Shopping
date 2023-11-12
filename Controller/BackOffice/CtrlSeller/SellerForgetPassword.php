<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/EncryptionHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/EmailTypeConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/MailHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerUpdate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['seller'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['seller']);

        $seller = new Seller();
        $seller->setEmail($data->email);

        $result = SellerRead::Read($seller);

        if (empty($result)) {
            // email not found
            echo ResponseHelper::createJsonResponse("Please check your email.");
            exit;
        }

        $result = $result[0];

        $resetCode = rand(100, 999);
        $encryptedData = EncryptionHelper::Encrypt($seller->getEmail() . $resetCode);
    
        $placeholders = ['ResetCode' => urlencode($encryptedData)];

        $seller->setResetCode($resetCode);

        // $encryptedAES = EncryptionHelper::Encrypt("This is a secret message.");

        // $decryptedAES = EncryptionHelper::Decrypt($encryptedAES);

        // if (!EncryptionHelper::Verify($decryptedAES, $encryptedAES)) {

        //     throw new Exception("$encryptedAES and $decryptedAES");
        // }

        // throw new Exception(" and ");
        // exit;
        
        MailHelper::SendMail(
            $seller->getEmail(),
            $result->getName(),
            EmailTypeConstant::SELLER_RESET_PASS,
            $placeholders
        );

        SellerUpdate::ResetCode($seller);

        echo ResponseHelper::createJsonResponse("An email has been sent. Please check your mailbox.");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
