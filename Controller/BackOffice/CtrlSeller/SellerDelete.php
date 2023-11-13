<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerDeactivate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        // data from user input, seller from database

        if (!isset($_POST['seller'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['seller']);

        $seller = new Seller();
        $seller->setSellerId($sellerId);

        $result = SellerRead::Read($seller);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];

        if(!password_verify($data->password, $result->getPassword())){
            throw new Exception("Incorrect password. Delete profile failed.");
        }

        SellerDeactivate::Deactivate($seller);

        echo ResponseHelper::createJsonResponse("Delete profile successfully", "/SA_Shopping/Web/View/BackOffice/Seller/SellerLogin.php");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        
        echo $e->getMessage();
    }
}
