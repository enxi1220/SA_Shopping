<?php

#  Author: Lim En Xi

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";

class BuyerCreate
{
    public static function Create(Buyer $buyer)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($buyer) {
            $buyerId = self::CreateBuyer($dataAccess, $buyer);
        });
    }

    private static function CreateBuyer(DataAccess $dataAccess, Buyer $buyer)
    {
        $buyerId = $dataAccess->NonQuery(
            "INSERT INTO buyer (
                username,
                name,
                email,
                password,
                phone,
                status,
                created_date,
                delivery_address
            ) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)",
            function (PDOStatement $pstmt) use ($buyer) {
                $pstmt->bindValue(1, $buyer->getUsername());
                $pstmt->bindValue(2, $buyer->getName());
                $pstmt->bindValue(3, $buyer->getEmail());
                $pstmt->bindValue(4, $buyer->getPassword()); // todo: encrypt password
                $pstmt->bindValue(5, $buyer->getPhone());
                $pstmt->bindValue(6, $buyer->getStatus());
                $pstmt->bindValue(7, $buyer->getDeliveryAddress());
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
        return $buyerId;
    }
}
