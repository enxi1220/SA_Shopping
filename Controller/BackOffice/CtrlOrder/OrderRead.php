<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['orderId'])) {
            throw new Exception("Order not found.");
        }

        $orderId = json_decode($_GET['orderId']);

        $order = new Order();

        $order->setOrderId($orderId);

        $result = OrderRead::Read($order);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

    $result = $result[0];

        $output = array(
            'orderId' => $result->getOrderId(),
            'orderNo' => $result->getOrderNo(),
            'productDetailId' => $result->getProductDetailId(),
            'productDetailNo' => $result->getProductDetailNo(),
            'buyerId' => $result->getBuyerId(),
            'status' => $result->getStatus(),
            'productName' => $result->getProductName(),
            'price' => $result->getPrice(),
            'quantity' => $result->getQuantity(),
            'size' => $result->getSize(),
            'color' => $result->getColor(),
            'material' => $result->getMaterial(),
            'deliveryAddress' => $result->getDeliveryAddress(),
            'deliveryFee' => $result->getDeliveryFee(),
            'totalPrice' => $result->getTotalPrice(),
            'createdDate' => $result->getCreatedDate(),
            'updatedDate' => $result->getUpdatedDate(),
            'buyerName' => $result->getBuyerName(),
            'buyerPhone' => $result->getBuyerPhone(),
            'buyerEmail' => $result->getBuyerEmail()
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
