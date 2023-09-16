<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";

class BuyerRead
{
    public static function Read(Buyer $buyer)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($buyer) {
                return self::ReadBuyer($dataAccess, $buyer);
            }
        );

        return $result;
    }

    private static function ReadBuyer(DataAccess $dataAccess, Buyer $buyer)
    {
        return $dataAccess->Reader(
            "SELECT 
                b.buyer_id,
                b.username,
                b.name,
                b.email,
                b.password,
                b.phone,
                b.status,
                b.reset_code,
                b.created_date,
                b.updated_date,
                b.delivery_address
             FROM buyer b
             WHERE
                b.buyer_id = IF(:buyer_id IS NULL, b.buyer_id, :buyer_id)
                AND b.status = IF(:status IS NULL, b.status, :status)
             ORDER BY b.created_date DESC",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(":buyer_id", $buyer->getBuyerId(), PDO::PARAM_INT);
                $pstmt->bindValue(":status", $buyer->getStatus(), PDO::PARAM_STR);
            },
            function ($row) {
                $buyer = new Buyer();

                return $buyer
                    ->setBuyerId($row['buyer_id'])
                    ->setUsername($row['username'])
                    ->setName($row['name'])
                    ->setEmail($row['email'])
                    ->setPassword($row['password'])
                    ->setPhone($row['phone'])
                    ->setStatus($row['status'])
                    ->setResetCode($row['reset_code'])
                    ->setCreatedDate($row['created_date'])
                    ->setUpdatedDate($row['updated_date'])
                    ->setDeliveryAddress($row['delivery_address'])
                    ;
            }
        );
    }
}
