<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerUpdate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        session_start();
        $buyerId = $_SESSION['buyer']['buyerId'];

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);

        $buyer = new Buyer();

        $buyer
            ->setBuyerId($buyerId)
            ->setPhone($data->phone)
            ->setName($data->name)
            ->setDeliveryAddress($data->deliveryAddress);

        BuyerUpdate::Update($buyer);

        echo ResponseHelper::createJsonResponse("Update profile successfully");

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        
        echo $e->getMessage();
    }
}
