<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewReadCount.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['productId']) || empty($_GET['productId'])) {
            throw new Exception("Please choose a product.");
        }

        $productId = json_decode($_GET['productId']);

        $review = new Review();

        $review->setProductId($productId);

        $result = ReviewRead::Read($review);

        $output = array_map(
            function ($review) {
                return [
                    'reviewId' => $review->getReviewId(),
                    // 'productId' => $review->getProductId(),
                    // 'orderId' => $review->getOrderId(),
                    'buyerEmail' => $review->getBuyerEmail(),
                    'reviewText' => $review->getReviewText(),
                    // 'status' => $review->getStatus(),
                    'sentiment' => $review->getSentiment(),
                    'sentimentLabel' => $review->getSentimentLabel(),
                    // 'sentimentRecommendation' => $review->getSentimentRecommendation(),
                    'createdDate' => $review->getCreatedDate(),
                    'updatedDate' => $review->getUpdatedDate(),
                    'productDetail' => array(
                        // 'productDetailId' => $review->getOrder()->getProductDetailId(),
                        'productDetailNo' => $review->getOrder()->getProduct()->getProductDetail()->getProductDetailNo(),
                        // 'size' => $review->getOrder()->getSize(),
                        // 'color' => $review->getOrder()->getColor(),
                        // 'material' => $review->getOrder()->getMaterial()
                    ),
                ];
            },
            $result
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
                echo $e->getMessage();
    }
}
