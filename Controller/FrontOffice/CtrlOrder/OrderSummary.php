<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        $order = new Order();

        // todo: replace buyer session
        $order->setBuyerId(1);
        
        $result = OrderRead::Read($order);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $output = array_map(
            function ($order) {
                return [
                    'orderId' => $order->getOrderId(),
                    'orderNo' => $order->getOrderNo(),
                // 'productDetailId' => $order->getProductDetailId(),
                    // 'productDetailNo' => $order->getProductDetailNo(),
                    // 'buyerId' => $order->getBuyerId(),
                    'status' => $order->getStatus(),
                    'productName' => $order->getProductName(),
                    'price' => $order->getPrice(),
                    'quantity' => $order->getQuantity(),
                    'size' => $order->getSize(),
                    'color' => $order->getColor(),
                    'material' => $order->getMaterial(),
                    'deliveryAddress' => $order->getDeliveryAddress(),
                    // 'deliveryFee' => $order->getDeliveryFee(),
                    'totalPrice' => $order->getTotalPrice(),
                    'createdDate' => $order->getCreatedDate(),
                    'updatedDate' => $order->getUpdatedDate(),
                    // 'buyerName' => $order->getBuyerName(),
                    // 'buyerPhone' => $order->getBuyerPhone(),
                    // 'buyerEmail' => $order->getBuyerEmail()
                    'productId' => $order->getProductId()
                ];
            },
            $result
        );

        echo json_encode($output);

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
