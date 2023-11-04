<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";

class SellerCreate
{
    public static function Create(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($seller) {
            $sellerId = self::CreateSeller($dataAccess, $seller);
        });
    }

    private static function CreateSeller(DataAccess $dataAccess, Seller $seller)
    {
        $sellerId = $dataAccess->NonQuery(
            "INSERT INTO seller (
                username,
                name,
                email,
                password,
                phone,
                status,
                created_date,
                store_name,
                store_desc,
                business_address
            ) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(1, $seller->getUsername());
                $pstmt->bindValue(2, $seller->getName());
                $pstmt->bindValue(3, $seller->getEmail());
                $pstmt->bindValue(4, $seller->getPassword());
                $pstmt->bindValue(5, $seller->getPhone());
                $pstmt->bindValue(6, $seller->getStatus());
                $pstmt->bindValue(7, $seller->getStoreName());
                $pstmt->bindValue(8, $seller->getStoreDesc());
                $pstmt->bindValue(9, $seller->getBusinessAddress());
            },
            function (Exception $ex) {
                if (str_contains($ex, 'Duplicate entry') && str_contains($ex, 'email_UNIQUE')) {
                    throw new Exception("Sorry, this email have been registered. Please try again", 500);
                }
                if (str_contains($ex, 'Duplicate entry') && str_contains($ex, 'username_UNIQUE')) {
                    throw new Exception("Sorry, duplicate username is generated. Please try again", 500);
                }
            }
        );
        return $sellerId;
    }
}
