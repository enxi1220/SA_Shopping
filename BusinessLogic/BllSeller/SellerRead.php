<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";

class SellerRead
{
    public static function Read(Seller $seller)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($seller) {
                return self::ReadSeller($dataAccess, $seller);
            }
        );

        return $result;
    }

    private static function ReadSeller(DataAccess $dataAccess, Seller $seller)
    {
        return $dataAccess->Reader(
            "SELECT 
                s.seller_id,
                s.username,
                s.name,
                s.email,
                s.password,
                s.phone,
                s.status,
                s.reset_code,
                s.created_date,
                s.created_by,
                s.updated_date,
                s.updated_by,
                s.business_address,
                s.store_name,
                s.store_desc,
                s.last_login_date
             FROM seller s
             WHERE
                s.seller_id = IF(:seller_id IS NULL, s.seller_id, :seller_id)
                AND s.status = IF(:status IS NULL, s.status, :status)
             ORDER BY s.created_date DESC",
            function (PDOStatement $pstmt) use ($seller) {
                $pstmt->bindValue(":seller_id", $seller->getSellerId(), PDO::PARAM_INT);
                $pstmt->bindValue(":status", $seller->getStatus(), PDO::PARAM_STR);
            },
            function ($row) {
                $seller = new Seller();

                return $seller
                    ->setSellerId($row['seller_id'])
                    ->setUsername($row['username'])
                    ->setName($row['name'])
                    ->setEmail($row['email'])
                    ->setPassword($row['password'])
                    ->setPhone($row['phone'])
                    ->setStatus($row['status'])
                    ->setResetCode($row['reset_code'])
                    ->setCreatedDate($row['created_date'])
                    ->setCreatedBy($row['created_by'])
                    ->setUpdatedDate($row['updated_date'])
                    ->setUpdatedBy($row['updated_by'])
                    ->setBusinessAddress($row['business_address'])
                    ->setStoreName($row['store_name'])
                    ->setStoreDesc($row['store_desc'])
                    ->setLastLoginDate($row['last_login_date']);
            }
        );
    }
}
