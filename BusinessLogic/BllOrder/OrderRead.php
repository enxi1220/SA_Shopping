<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";

class OrderRead
{
    public static function Read(Order $order)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($order) {
                return self::ReadOrder($dataAccess, $order);
            }
        );

        return $result;
    }

    public static function ReadForReport(Order $order)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($order) {
                return self::ReadOrderForReport($dataAccess, $order);
            }
        );

        return $result;
    }

    private static function ReadOrder(DataAccess $dataAccess, Order $order)
    {
        return $dataAccess->Reader(
            "SELECT
                o.order_id,
                o.order_no,
                o.product_detail_id,
                o.product_detail_no,
                o.buyer_id,
                o.status,
                o.product_name,
                o.price,
                o.quantity,
                o.size,
                o.color,
                o.material,
                o.delivery_address,
                o.delivery_fee,
                o.total_price,
                o.payment_method,
                o.created_date,
                o.updated_date,
                b.name,
                b.phone,
                b.email,
                p.product_id
             FROM `order` o
             JOIN product_detail pd ON pd.product_detail_id = o.product_detail_id
             JOIN product p ON pd.product_id = p.product_id
             JOIN buyer b ON b.buyer_id = o.buyer_id
             WHERE
                o.order_id = IF(:order_id IS NULL, o.order_id, :order_id)
                AND o.status = IF(:status IS NULL, o.status, :status)
                AND o.buyer_id = IF(:buyer_id IS NULL, o.buyer_id, :buyer_id)
                AND p.seller_id = IF(:seller_id IS NULL, p.seller_id, :seller_id)
             ORDER BY o.created_date DESC",
            function (PDOStatement $pstmt) use ($order) {
                $pstmt->bindValue(":order_id", $order->getOrderId(), PDO::PARAM_INT);
                $pstmt->bindValue(":status", $order->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(":buyer_id", $order->getBuyerId(), PDO::PARAM_INT);
                $pstmt->bindValue(":seller_id", $order->getSellerId(), PDO::PARAM_INT);
            },
            function ($row) {
                $productDetail = new ProductDetail();
                $productDetail
                    ->setProductDetailId($row['product_detail_id'])
                    ->setProductDetailNo($row['product_detail_no'])
                    ->setSize($row['size'])
                    ->setColor($row['color'])
                    ->setMaterial($row['material']);

                $product = new Product();
                $product
                    ->setProductId($row['product_id'])
                    ->setName($row['product_name'])
                    ->setPrice($row['price'])
                    ->setProductDetail($productDetail);

                $buyer = new Buyer();
                $buyer
                    ->setBuyerId($row['buyer_id'])
                    ->setName($row['name'])
                    ->setPhone($row['phone'])
                    ->setEmail($row['email']);

                $order = new Order();

                return $order
                    ->setOrderId($row['order_id'])
                    ->setOrderNo($row['order_no'])
                    ->setBuyerId($row['buyer_id'])
                    ->setStatus($row['status'])
                    ->setQuantity($row['quantity'])
                    ->setDeliveryAddress($row['delivery_address'])
                    ->setDeliveryFee($row['delivery_fee'])
                    ->setTotalPrice($row['total_price'])
                    ->setPaymentMethod($row['payment_method'])
                    ->setCreatedDate($row['created_date'])
                    ->setUpdatedDate($row['updated_date'])
                    ->setProductId($row['product_id'])
                    ->setBuyer($buyer)
                    ->setProduct($product);
            }
        );
    }

    private static function ReadOrderForReport(DataAccess $dataAccess, Order $order)
    {
        return $dataAccess->Reader(
            "SELECT
                MONTHNAME(o.created_date) AS order_month,
                COUNT(o.order_id) AS sales_count,
                ROUND(SUM(o.total_price), 2) AS total_price
             FROM `order` o
             JOIN product p ON o.product_id = p.product_id
             WHERE p.seller_id = :seller_id
             GROUP BY order_month
             ORDER BY MONTH(o.created_date)",
            function (PDOStatement $pstmt) use ($order) {
                $pstmt->bindValue(":seller_id", $order->getSellerId(), PDO::PARAM_INT);
            },
            function ($row) {
                $order = new Order();

                return $order
                    ->setTotalPrice($row['total_price'])
                    ->setOrderMonth($row['order_month'])
                    ->setSalesCount($row['sales_count']);
            }
        );
    }
}
