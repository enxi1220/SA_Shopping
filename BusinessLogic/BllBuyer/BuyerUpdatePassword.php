<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";

class BuyerUpdatePassword
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
               password = ?,
               updated_date = NOW()
             WHERE
               buyer_id = ?",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(1, $buyer->getPassword());
                $pstmt->bindValue(2, $buyer->getBuyerId());
            }
        );
    }
}
