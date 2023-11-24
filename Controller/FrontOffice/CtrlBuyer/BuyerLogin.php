<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['buyer'])) {
            throw new Exception("User information is not complete.");
        }

        $data = json_decode($_POST['buyer']);

        $buyer = new Buyer();
        $buyer->setEmail($data->email);

        $result = BuyerRead::Read($buyer);

        if (empty($result)) {
            // email not found
            throw new Exception("Incorrect email or password.");
        }

        $result = $result[0];

        if (!password_verify($data->password, $result->getPassword())) {
            // password not match
            throw new Exception("Incorrect email or password.");
        }

        if ($result->getStatus() == UserStatusConstant::INACTIVE) {
            // account is deleted
            throw new Exception("Account has been deleted.");
        }

        // create session
        session_start();
        $_SESSION['buyer']['buyerId'] = $result->getBuyerId();
        $_SESSION['buyer']['buyerEmail'] = $result->getEmail();

        echo ResponseHelper::createJsonResponse("Login successfully.", "/SA_Shopping/Web/View/FrontOffice/Product/ProductSummary.php");

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);        echo $e->getMessage();
    }
}
