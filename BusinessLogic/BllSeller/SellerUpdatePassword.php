<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";

class SellerUpdatePassword
{
    public static function Update(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($seller) {
            self::UpdateSeller($dataAccess, $seller);
        });
    }

    public static function Reset(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($seller) {
            self::ResetSeller($dataAccess, $seller);
        });
    }

    private static function UpdateSeller(DataAccess $dataAccess, Seller $seller)
    {
        $dataAccess->NonQuery(
            "UPDATE seller
             SET
               password = ?,
               updated_date = NOW()
             WHERE
               seller_id = ?",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(1, $seller->getPassword());
                $pstmt->bindValue(2, $seller->getSellerId());
            }
        );
    }

    private static function ResetSeller(DataAccess $dataAccess, Seller $seller)
    {
        $dataAccess->NonQuery(
            "UPDATE seller
             SET
               password = ?,
               reset_code = NULL,
               updated_date = NOW()
             WHERE
               email = ?",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(1, $seller->getPassword());
                $pstmt->bindValue(2, $seller->getEmail());
            }
        );
    }
}
