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
                $product = $order->getProduct();
                return [
                    'orderId' => $order->getOrderId(),
                    'orderNo' => $order->getOrderNo(),
                    'status' => $order->getStatus(),
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
                    'quantity' => $order->getQuantity(),
                    'deliveryAddress' => $order->getDeliveryAddress(),
                    'totalPrice' => $order->getTotalPrice(),
                    'paymentMethod' => $order->getPaymentMethod(),
                    'createdDate' => $order->getCreatedDate(),
                    'updatedDate' => $order->getUpdatedDate()
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
