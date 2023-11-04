<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['orderId']) || empty($_GET['orderId'])) {
            throw new Exception("Please choose an order.");
        }

        $orderId = json_decode($_GET['orderId']);

        $order = new Order();

        $order->setOrderId($orderId);

        $result = OrderRead::Read($order);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];
        $product = $result->getProduct();
        $buyer = $result->getBuyer();

        $output = array(
            'orderId' => $result->getOrderId(),
            'orderNo' => $result->getOrderNo(),
            'buyerId' => $result->getBuyerId(),
            'status' => $result->getStatus(),
            'quantity' => $result->getQuantity(),
            'deliveryAddress' => $result->getDeliveryAddress(),
            'deliveryFee' => $result->getDeliveryFee(),
            'totalPrice' => $result->getTotalPrice(),
            'paymentMethod' => $result->getPaymentMethod(),
            'createdDate' => $result->getCreatedDate(),
            'updatedDate' => $result->getUpdatedDate(),
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
            'buyer' => array(
                'buyerId' => $buyer->getBuyerId(),
                'name' => $buyer->getName(),
                'phone' => $buyer->getPhone(),
                'email' => $buyer->getEmail(),
            )
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
