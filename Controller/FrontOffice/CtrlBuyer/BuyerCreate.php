<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerCreate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);

        ValidationHelper::ValidateEmail($data->email);
        ValidationHelper::ValidatePhoneNumber($data->phone);
        ValidationHelper::ValidateText($data->name);
        ValidationHelper::ValidatePassword($data->password);

        $buyer = new Buyer();
        $buyer
            ->setEmail($data->email)
            ->setPhone($data->phone)
            ->setName($data->name)
            ->setPassword(password_hash($data->password, PASSWORD_DEFAULT))
            ->setDeliveryAddress($data->deliveryAddress)
            ->setUsername()
            ->setStatus(UserStatusConstant::ACTIVE);

        $buyerId = BuyerCreate::Create($buyer);

        // auto log in
        session_start();
        $_SESSION['buyer']['buyerId'] = $buyerId;
        $_SESSION['buyer']['buyerEmail'] = $buyer->getEmail();

        echo ResponseHelper::createJsonResponse("Register successfully.", "/SA_Shopping/FrontOffice/Product/ProductSummary.php");
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
