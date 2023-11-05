<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";

class OrderUpdate
{
    public static function Update(Order $order)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($order) {
            self::UpdateOrder($dataAccess, $order);
        });
    }

    private static function UpdateOrder(DataAccess $dataAccess, Order $order)
    {
        $dataAccess->NonQuery(
            "UPDATE `order`
             SET
               status = ?,
               updated_date = NOW()
             WHERE
               order_id = ?",
            function (PDOStatement $pstmt) use ($order) {
                $pstmt->bindValue(1, $order->getStatus());
                $pstmt->bindValue(2, $order->getOrderId());
            }
        );
    }
}
