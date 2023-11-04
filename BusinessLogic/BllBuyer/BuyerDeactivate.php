<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

class BuyerDeactivate
{
    public static function Deactivate(Buyer $buyer)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($buyer) {
            self::DeactivateBuyer($dataAccess, $buyer);
        });
    }

    private static function DeactivateBuyer(DataAccess $dataAccess, Buyer $buyer)
    {
        $dataAccess->NonQuery(
            "UPDATE buyer
             SET
               status = ?,
               updated_date = NOW()
             WHERE
               buyer_id = ?",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(1, UserStatusConstant::INACTIVE);
                $pstmt->bindValue(2, $buyer->getBuyerId());
            }
        );
    }
}
