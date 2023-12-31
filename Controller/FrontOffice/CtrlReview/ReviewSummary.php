<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewReadCount.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['productId'])) {
            throw new Exception("Product not found.");
        }

        $productId = json_decode($_GET['productId']);

        $review = new Review();

        $review->setProductId($productId);

        $result = ReviewRead::Read($review);

        if(empty($result)){
            exit;
        }

        $reviewCount = ReviewReadCount::Read($review)[0];

        $output = [
            'reviewCount' => [
                'productId' => $reviewCount->getProductId(),
                'negativeReview' => $reviewCount->getNegativeReviewCount(),
                'neutralReview' => $reviewCount->getNeutralReviewCount(),
                'positiveReview' => $reviewCount->getPositiveReviewCount(),
                'totalReview' => $reviewCount->getTotalReviewCount(),
            ],
            'reviews' => array_map(
                function ($review) {
                    return [
                        'reviewId' => $review->getReviewId(),
                        'productId' => $review->getProductId(),
                        'orderId' => $review->getOrderId(),
                        'buyerEmail' => $review->getBuyerEmail(),
                        'reviewText' => $review->getReviewText(),
                        'status' => $review->getStatus(),
                        'sentiment' => $review->getSentiment(),
                        'sentimentLabel' => $review->getSentimentLabel(),
                        'sentimentRecommendation' => $review->getSentimentRecommendation(),
                        'createdDate' => $review->getCreatedDate(),
                        'updatedDate' => $review->getUpdatedDate(),
                        'order' => array(
                            'productDetail' => array(
                                'productDetailId' => $review->getOrder()->getProduct()->getProductDetail()->getProductDetailId(),
                                'productDetailNo' => $review->getOrder()->getProduct()->getProductDetail()->getProductDetailNo(),
                                'size' => $review->getOrder()->getProduct()->getProductDetail()->getSize(),
                                'color' => $review->getOrder()->getProduct()->getProductDetail()->getColor(),
                                'material' => $review->getOrder()->getProduct()->getProductDetail()->getMaterial()
                            )
                        ),
                    ];
                },
                $result
            )
        ];

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
                echo $e->getMessage();
    }
}
