<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        $review = new Review();
        $review->setSellerId($sellerId);
        $product = new Product();
        $product->setSellerId($sellerId);
        $order = new Order();
        $order->setSellerId($sellerId);

        $reviewResult = ReviewRead::ReadForReport($review);
        $stockResult = ProductRead::ReadForReport($product);
        $salesResult = OrderRead::ReadForReport($order);
// todo: one report no data, others wont show. 
        if (empty($reviewResult)) {
            echo json_encode($reviewResult);
            exit;
        }

        if (empty($stockResult)) {
            echo json_encode($stockResult);
            exit;
        }

        if (empty($salesResult)) {
            echo json_encode($salesResult);
            exit;
        }

        $output = array(
            'reviews' => array_map(
                function ($review) {
                    return [
                        'productId' => $review->getProductId(),
                        'productName' => $review->getProductName(),
                        'negativeReview' => $review->getNegativeReviewCount(),
                        'neutralReview' => $review->getNeutralReviewCount(),
                        'positiveReview' => $review->getPositiveReviewCount(),
                        'totalReview' => $review->getTotalReviewCount()
                    ];
                },
                $reviewResult
            ),
            'stocks' => array_map(
                function ($stocks) {
                    return [
                        'productId' => $stocks->getProductId(),
                        'productName' => $stocks->getProductName(),
                        'minStockQty' => $stocks->getMinStockQty(),
                        'availableQty' => $stocks->getAvailableQty(),
                        'productDetailId' => $stocks->getProductDetailId(),
                        'productDetailNo' => $stocks->getProductDetailNo(),
                    ];
                },
                $stockResult
            ),
            'sales' => array_map(
                function ($sales) {
                    return [
                        'totalPrice' => $sales->getTotalPrice(),
                        'orderMonth' => $sales->getOrderMonth(),
                        'salesCount' => $sales->getSalesCount()
                    ];
                },
                $salesResult
            )
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
