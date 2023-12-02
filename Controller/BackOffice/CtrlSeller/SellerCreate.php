<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerCreate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['seller'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['seller']);

        ValidationHelper::ValidateEmail($data->email);
        ValidationHelper::ValidatePhoneNumber($data->phone);
        ValidationHelper::ValidateText($data->name);
        ValidationHelper::ValidateText($data->storeName);
        ValidationHelper::ValidateText($data->storeDesc);
        ValidationHelper::ValidateText($data->businessAddress);
        ValidationHelper::ValidatePassword($data->password);

        $seller = new Seller();
        $seller
            ->setEmail($data->email)
            ->setPhone($data->phone)
            ->setName($data->name)
            ->setPassword(password_hash($data->password, PASSWORD_DEFAULT))
            ->setBusinessAddress($data->businessAddress)
            ->setStoreName($data->storeName)
            ->setStoreDesc($data->storeDesc)
            ->setUsername()
            ->setStatus(UserStatusConstant::ACTIVE);

        SellerCreate::Create($seller);

        echo ResponseHelper::createJsonResponse("Register successfully. Please proceed to login", "/SA_Shopping/BackOffice/Seller/SellerLogin.php");

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
                echo $e->getMessage();
    }
}
