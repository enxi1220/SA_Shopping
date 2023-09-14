<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewCreate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ReviewStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['review'])) {
            throw new Exception("Review information is not complete.");
        }

        $data = json_decode($_POST['review']);

        // todo: replace buyer session 
        $buyerId = 1;

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

        $review = new Review();
        $review
            ->setReviewText($data->reviewText)
            ->setStatus(ReviewStatusConstant::NEW)
            // todo: replace with ml
            ->setSentiment(0.9)
            ->setOrder($orderResult)
            ->setBuyer($buyerResult);

        ReviewCreate::Create($review);

        echo "Review is posted";

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
