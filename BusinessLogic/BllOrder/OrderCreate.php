<?php

#  Author: Lim En Xi

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";

class OrderCreate
{
    public static function Create(Order $order)
    {
        $productDetail = $order->getProduct()->getProductDetail();
        $productDetail->updateAfterPurchase($order->getQuantity());

        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($order, $productDetail) {
            $orderId = self::CreateOrder($dataAccess, $order);

            self::UpdateProductDetail($dataAccess, $productDetail);
        });
    }

    private static function CreateOrder(DataAccess $dataAccess, Order $order)
    {
        $orderId = $dataAccess->NonQuery(
            "INSERT INTO `order` (
                order_no,
                product_detail_id,
                product_detail_no,
                buyer_id,
                status,
                product_name,
                price,
                quantity,
                size,
                color,
                material,
                delivery_address,
                delivery_fee,
                total_price,
                payment_method,
                product_id,
                created_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())",
            function (PDOStatement $pstmt) use ($order) {
                $pstmt->bindValue(1, $order->getOrderNo(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $order->getProductDetailId(), PDO::PARAM_INT);
                $pstmt->bindValue(3, $order->getProduct()->getProductDetail()->getProductDetailNo(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $order->getBuyerId(), PDO::PARAM_INT);
                $pstmt->bindValue(5, $order->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(6, $order->getProduct()->getName(), PDO::PARAM_STR);
                $pstmt->bindValue(7, $order->getProduct()->getPrice(), PDO::PARAM_STR);
                $pstmt->bindValue(8, $order->getQuantity(), PDO::PARAM_INT);
                $pstmt->bindValue(9, $order->getProduct()->getProductDetail()->getSize(), PDO::PARAM_STR);
                $pstmt->bindValue(10, $order->getProduct()->getProductDetail()->getColor(), PDO::PARAM_STR);
                $pstmt->bindValue(11, $order->getProduct()->getProductDetail()->getMaterial(), PDO::PARAM_STR);
                $pstmt->bindValue(12, $order->getDeliveryAddress(), PDO::PARAM_STR);
                $pstmt->bindValue(13, $order->getDeliveryFee(), PDO::PARAM_STR);
                $pstmt->bindValue(14, $order->getTotalPrice(), PDO::PARAM_STR);
                $pstmt->bindValue(15, $order->getPaymentMethod(), PDO::PARAM_STR);
                $pstmt->bindValue(16, $order->getProduct()->getProductId(), PDO::PARAM_INT);
            },
            function (Exception $ex) {
                if (str_contains($ex, 'Duplicate entry') && str_contains($ex, 'order_no_UNIQUE')) {
                    throw new Exception("Duplicate order no is generated. Please try again.", 500);
                }
            }
        );
        return $orderId;
    }

    private static function UpdateProductDetail(DataAccess $dataAccess, ProductDetail $productDetail)
    {
        $dataAccess->NonQuery(
            "UPDATE product_detail
                 SET
                    status = ?,
                    available_qty = ?,
                    sales_out_qty = ?,
                    updated_by = ?,
                    updated_date = NOW()
                 WHERE
                    `product_detail_id` = ?;",
            function (PDOStatement $pstmt) use ($productDetail) {
                $pstmt->bindValue(1, $productDetail->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $productDetail->getAvailableQty(), PDO::PARAM_INT);
                $pstmt->bindValue(3, $productDetail->getSalesOutQty(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $productDetail->getUpdatedBy(), PDO::PARAM_STR);
                $pstmt->bindValue(5, $productDetail->getProductDetailId(), PDO::PARAM_INT);
            }
        );
    }
}
