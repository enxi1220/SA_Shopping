<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewRead.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        session_start();
        $buyerId = $_SESSION['buyer']['buyerId'];

        $order = new Order();

        $order->setBuyerId($buyerId);

        $result = OrderRead::Read($order);

        foreach ($result as $order) {
            $review = new Review();
            $review->setOrderId($order->getOrderId());
            $reviews = ReviewRead::Read($review);
            if(empty($reviews)){
                $order->setReview(new Review());
            }else{
                $order->setReview($reviews[0]);
            }
            
        }

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $output = array_map(
            function ($order) {
                $product = $order->getProduct();
                $review = $order->getReview();
                // $review = $order->getReview() == null? new Review() : $order->getReview();
                return [
                    'orderId' => $order->getOrderId(),
                    'orderNo' => $order->getOrderNo(),
                    'status' => $order->getStatus(),
                    'quantity' => $order->getQuantity(),
                    'deliveryAddress' => $order->getDeliveryAddress(),
                    'totalPrice' => $order->getTotalPrice(),
                    'paymentMethod' => $order->getPaymentMethod(),
                    'createdDate' => $order->getCreatedDate(),
                    'updatedDate' => $order->getUpdatedDate(),
                    'product' => array(
                        'productId' => $product->getProductId(),
                        'name' => $product->getName(),
                        'price' => $product->getPrice(),
                        'productDetail' => array(
                            'productDetailId' => $product->getProductDetail()->getProductDetailId(),
                            'productDetailNo' => $product->getProductDetail()->getProductDetailNo(),
                            'size' => $product->getProductDetail()->getSize(),
                            'color' => $product->getProductDetail()->getColor(),
                            'material' => $product->getProductDetail()->getMaterial(),
                        )
                    ),
                    'review' => array(
                        'reviewId' => $review->getReviewId(),
                        'reviewText' => $review->getReviewText()
                    )
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
