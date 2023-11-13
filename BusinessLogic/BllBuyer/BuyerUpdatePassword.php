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

    public static function Reset(Buyer $buyer)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($buyer) {
            self::ResetBuyer($dataAccess, $buyer);
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

    private static function ResetBuyer(DataAccess $dataAccess, Buyer $buyer)
    {
        $dataAccess->NonQuery(
            "UPDATE buyer
             SET
               password = ?,
               reset_code = NULL,
               updated_date = NOW()
             WHERE
               email = ?",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(1, $buyer->getPassword());
                $pstmt->bindValue(2, $buyer->getEmail());
            }
        );
    }
}
