<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";

class SellerUpdate
{
    public static function Update(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($seller) {
            self::UpdateSeller($dataAccess, $seller);
        });
    }

    public static function Login(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($seller) {
            self::UpdateSellerLogin($dataAccess, $seller);
        });
    }

    private static function UpdateSeller(DataAccess $dataAccess, Seller $seller)
    {
        $dataAccess->NonQuery(
            "UPDATE seller
             SET
               name = ?,
               phone = ?,
               store_name = ?,
               store_desc = ?,
               business_address = ?,
               updated_date = NOW()
             WHERE
               seller_id = ?",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(1, $seller->getName());
                $pstmt->bindValue(2, $seller->getPhone());
                $pstmt->bindValue(3, $seller->getStoreName());
                $pstmt->bindValue(4, $seller->getStoreDesc());
                $pstmt->bindValue(5, $seller->getBusinessAddress());
                $pstmt->bindValue(6, $seller->getSellerId());
            }
        );
    }

    private static function UpdateSellerLogin(DataAccess $dataAccess, Seller $seller)
    {
        $dataAccess->NonQuery(
            "UPDATE seller
             SET
               last_login_date = NOW()
             WHERE
               email = ?",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(1, $seller->getEmail());
            }
        );
    }


}
