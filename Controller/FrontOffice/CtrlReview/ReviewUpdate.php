<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewUpdate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ReviewStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['review'])) {
            throw new Exception("Review information is not complete.");
        }

        $data = json_decode($_POST['review']);

        session_start();
        $buyerId = $_SESSION['buyer']['buyerId'];

        $buyer = new Buyer();
        $buyer->setBuyerId($buyerId);

        $buyerResult = BuyerRead::Read($buyer);

        if (empty($buyerResult)) {
            throw new Exception("Buyer not found");
        }
        $buyerResult = $buyerResult[0];

        $order = new Order();
        $order->setOrderId($data->orderId);

        $orderResult = OrderRead::Read($order);
        if (empty($orderResult)) {
            throw new Exception("Order not found");
        }
        $orderResult = $orderResult[0];

    // Communication with Py
        $reviewText = array('text' => $data->reviewText);
        $apiURL = "http://127.0.0.1:5000/process_data";
        
        $client = curl_init($apiURL);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($reviewText));
        curl_setopt($client, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($client);

        if ($response === FALSE) {
            throw new Exception("Error in predicting sentiment");
        }
        $sentiment = json_decode($response, true);
        curl_close($client);

    // End Communication with Py

        $review = new Review();
        $review
            ->setReviewText($data->reviewText)
            ->setStatus(ReviewStatusConstant::UPDATED)
            // todo: replace with ml
            ->setSentiment($sentiment['result'])
            ->setOrder($orderResult)
            ->setBuyer($buyerResult);

        ReviewUpdate::Update($review);

        echo ResponseHelper::createJsonResponse("Review is updated with " . strtolower($review->getSentimentLabel()) . " emotion.");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);

        echo $e->getMessage();
    }
}
