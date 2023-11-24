<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderRead.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        $order = new Order();

        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        $order->setSellerId($sellerId);

        $result = OrderRead::Read($order);

        if (empty($result)) {
            echo json_encode($result);
            exit;
        }

        $output = array_map(
            function ($order) {
                $product = $order->getProduct();
                return [
                    'orderId' => $order->getOrderId(),
                    'orderNo' => $order->getOrderNo(),
                    'product' => array(
                        // 'productId' => $product->getProductId(),
                        'name' => $product->getName(),
                        // 'price' => $product->getPrice(),
                        'productDetail' => array(
                            // 'productDetailId' => $product->getProductDetail()->getProductDetailId(),
                            'productDetailNo' => $product->getProductDetail()->getProductDetailNo(),
                            // 'size' => $product->getProductDetail()->getSize(),
                            // 'color' => $product->getProductDetail()->getColor(),
                            // 'material' => $product->getProductDetail()->getMaterial(),
                        )
                    ),
                    // 'productDetailId' => $order->getProductDetailId(),
                    // 'productDetailNo' => $order->getProductDetailNo(),
                    // 'buyerId' => $order->getBuyerId(),
                    'status' => $order->getStatus(),
                    // 'productName' => $order->getProductName(),
                    // 'price' => $order->getPrice(),
                    // 'quantity' => $order->getQuantity(),
                    // 'size' => $order->getSize(),
                    // 'color' => $order->getColor(),
                    // 'material' => $order->getMaterial(),
                    // 'deliveryAddress' => $order->getDeliveryAddress(),
                    // 'deliveryFee' => $order->getDeliveryFee(),
                    // 'totalPrice' => $order->getTotalPrice(),
                    'createdDate' => $order->getCreatedDate(),
                    'updatedDate' => $order->getUpdatedDate(),
                    // 'buyerName' => $order->getBuyerName(),
                    // 'buyerPhone' => $order->getBuyerPhone(),
                    // 'buyerEmail' => $order->getBuyerEmail()
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
