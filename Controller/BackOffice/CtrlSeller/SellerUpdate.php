<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerUpdate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        if (!isset($_POST['seller'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['seller']);

        ValidationHelper::ValidateText($data->name);
        ValidationHelper::ValidatePhoneNumber($data->phone);
        ValidationHelper::ValidateText($data->storeName);
        ValidationHelper::ValidateText($data->storeDesc);
        ValidationHelper::ValidateText($data->businessAddress);

        $seller = new Seller();

        $seller
            ->setSellerId($sellerId)
            ->setPhone($data->phone)
            ->setName($data->name)
            ->setStoreName($data->storeName)
            ->setStoreDesc($data->storeDesc)
            ->setBusinessAddress($data->businessAddress);

        SellerUpdate::Update($seller);

        $_SESSION['seller']['storeName'] = $data->storeName;

        echo ResponseHelper::createJsonResponse("Update profile successfully");

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
                echo $e->getMessage();
    }
}
