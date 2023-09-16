<?php

#  Author: Lim En Xi

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";

class BuyerUpdate
{
    public static function Update(Buyer $buyer)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($buyer) {
            self::UpdateBuyer($dataAccess, $buyer);
        });
    }

    private static function UpdateBuyer(DataAccess $dataAccess, Buyer $buyer)
    {
        $dataAccess->NonQuery(
            "UPDATE buyer
             SET
               name = ?,
               phone = ?,
               delivery_address = ?,
               updated_date = NOW()
             WHERE
               buyer_id = ?",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(1, $buyer->getName());
                $pstmt->bindValue(2, $buyer->getPhone());
                $pstmt->bindValue(3, $buyer->getDeliveryAddress());
                $pstmt->bindValue(4, $buyer->getBuyerId());
            }
        );
    }
}
