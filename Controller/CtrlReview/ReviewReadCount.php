<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewReadCount.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['productId'])) {
            throw new Exception("Product not found.");
        }

        $productId = json_decode($_GET['productId']);

        $review = new Review();

        $review->setProductId($productId);

        $result = ReviewReadCount::Read($review);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];

        $output = array(
            'productId' => $result->getProductId(),
            'negativeReview' => $result->getNegativeReviewCount(),
            'neutralReview' => $result->getNeutralReviewCount(),
            'positiveReview' => $result->getPositiveReviewCount(),
            'totalReview' => $result->getTotalReviewCount(),
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
