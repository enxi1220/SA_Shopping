<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderUpdate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/OrderStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['order'])) {
            throw new Exception("Please choose an order.");
        }

        $data = json_decode($_POST['order']);

        $order = new Order();
        $order->setOrderId($data->orderId);
        
        switch ($data->action) {
            case OrderStatusConstant::CONFIRM:
                $order->setStatus(OrderStatusConstant::SHIP);
                break;
            
            case OrderStatusConstant::SHIP:
                $order->setStatus(OrderStatusConstant::DELIVER);
                break;
            
            case OrderStatusConstant::DELIVER:
                $order->setStatus(OrderStatusConstant::REVIEW);
                break;
        }

        OrderUpdate::Update($order);

        echo ResponseHelper::createJsonResponse("Update order successfully");

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
