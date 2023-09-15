<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

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
            'buyerId' => $result->getBuyerId(),
            'username' => $result->getUsername(),
            'name' => $result->getName(),
            'email' => $result->getEmail(),
            'phone' => $result->getPhone(),
            'status' => $result->getStatus(),
            'deliveryAddress' => $result->getDeliveryAddress(),
            'createdDate' => $result->getCreatedDate(),
            'updatedDate' => $result->getUpdatedDate()
        );

        echo json_encode($output);
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
