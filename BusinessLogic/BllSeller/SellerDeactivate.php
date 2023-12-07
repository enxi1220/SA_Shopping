<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

class SellerDeactivate
{
    public static function Deactivate(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($seller) {
            self::DeactivateSeller($dataAccess, $seller);
        });
    }

    private static function DeactivateSeller(DataAccess $dataAccess, Seller $seller)
    {
        $dataAccess->NonQuery(
            "UPDATE seller
             SET
               status = ?,
               email = ?,
               updated_date = NOW()
             WHERE
               seller_id = ?",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(1, UserStatusConstant::INACTIVE);
                $pstmt->bindValue(2, "Deleted User". $seller->getSellerId()); 
                $pstmt->bindValue(3, $seller->getSellerId());
            }
        );
    }
}
