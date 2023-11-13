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
                AND b.email = IF(:email IS NULL, b.email, :email)   
             ORDER BY b.created_date DESC",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(":buyer_id", $buyer->getBuyerId(), PDO::PARAM_INT);
                $pstmt->bindValue(":status", $buyer->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(":email", $buyer->getEmail(), PDO::PARAM_STR);
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

    public static function ReadWithCode(Buyer $buyer)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($buyer) {
                return self::ReadBuyerWithCode($dataAccess, $buyer);
            }
        );

        return $result;
    }

    private static function ReadBuyerWithCode(DataAccess $dataAccess, Buyer $buyer)
    {
        return $dataAccess->Reader(
            "SELECT 
                b.email,
                b.reset_code
             FROM buyer b
             WHERE
                b.email = IF(:email IS NULL, b.email, :email)
                AND b.reset_code = IF(:reset_code IS NULL, b.reset_code, :reset_code)
             ORDER BY b.created_date DESC",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(":email", $buyer->getEmail(), PDO::PARAM_STR);
                $pstmt->bindValue(":reset_code", $buyer->getResetCode(), PDO::PARAM_STR);
            },
            function ($row) {
                $buyer = new Buyer();

                return $buyer
                    ->setEmail($row['email'])
                    ->setResetCode($row['reset_code']);
            }
        );
    }
}
