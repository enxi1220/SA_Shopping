<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerUpdatePassword.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        session_start();
        $buyerId = $_SESSION['buyer']['buyerId'];

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);

        $buyer = new Buyer();
        $buyer->setBuyerId($buyerId);

        $result = BuyerRead::Read($buyer);

        if (empty($result)) {
            throw new Exception("User not found");
        }

        $result = $result[0];

        if(!password_verify($data->currentPassword, $result->getPassword())){
            throw new Exception("Incorrect password. Failed to change password.");
        }

        $buyer->setPassword(password_hash($data->password, PASSWORD_DEFAULT));

        BuyerUpdatePassword::Update($buyer);

        echo ResponseHelper::createJsonResponse("Change password successfully");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        
        echo $e->getMessage();
    }
}
