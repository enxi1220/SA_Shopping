<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerDeactivate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        // todo: replace buyer session
        $buyerId = 2;

        // data from user input, buyer from database

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);


        $buyer = new Buyer();
        $buyer->setBuyerId($buyerId);

        $result = BuyerRead::Read($buyer);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];

        if($data->password != $result->getPassword()){
            throw new Exception("Incorrect password. Delete profile failed.");
        }

        BuyerDeactivate::Deactivate($buyer);

        echo "Delete profile successfully";
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
