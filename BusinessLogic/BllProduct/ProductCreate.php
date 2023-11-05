<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
// ing
class ProductCreate
{
    public static function Create(Product $product)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($product) {
                return self::CreateProduct($dataAccess, $product);
            }
        );

        return $result;
    }

    private static function CreateProduct(DataAccess $dataAccess, Product $product)
    {
        $productId = $dataAccess->NonQuery(
            "INSERT INTO `product` (
                product_no, 
                seller_id, 
                name, 
                price, 
                status, 
                description, 
                created_date
                ) VALUES (?, ?, ?, ?, ?, ?, NOW())",
            function (PDOStatement $pstmt) use ($product) {
                $pstmt->bindValue(1, $product->getProductNo(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $product->getSellerId(), PDO::PARAM_INT);
                $pstmt->bindValue(3, $product->getName(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $product->getPrice(), PDO::PARAM_STR);
                $pstmt->bindValue(5, $product->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(6, $product->getDescription(), PDO::PARAM_STR);
            },
            function (Exception $ex) {
                if (str_contains($ex, 'Duplicate entry') && str_contains($ex, 'product_no_UNIQUE')) {
                    throw new Exception("Duplicate product no is generated. Please try again.", 500);
                }
            }
        );
        return $productId;
    }

    
}
