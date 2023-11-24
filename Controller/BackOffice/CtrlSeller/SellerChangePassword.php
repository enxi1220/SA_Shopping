<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerUpdatePassword.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        if (!isset($_POST['seller'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['seller']);

        $seller = new Seller();
        $seller->setSellerId($sellerId);

        $result = SellerRead::Read($seller);

        if (empty($result)) {
            throw new Exception("User not found");
        }

        $result = $result[0];

        if(!password_verify($data->currentPassword, $result->getPassword())){
            throw new Exception("Incorrect password. Failed to change password.");
        }

        $seller->setPassword(password_hash($data->password, PASSWORD_DEFAULT));

        SellerUpdatePassword::Update($seller);

        echo ResponseHelper::createJsonResponse("Change password successfully");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
                echo $e->getMessage();
    }
}
