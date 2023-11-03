<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerUpdate.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        // todo: replace buyer session
        $buyerId = 1;
        
        $buyer = new Buyer();
        $buyer->setBuyerId($buyerId);
        
        $result = BuyerRead::Read($buyer);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];
        $output = array(
            'email' => $result->getEmail(),
            'phone' => $result->getPhone(),
            'deliveryAddress' => $result->getDeliveryAddress()
        );

        echo json_encode($output);
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        // todo: replace buyer session
        $buyerId = 1;

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

        echo "Update profile successfully";

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}