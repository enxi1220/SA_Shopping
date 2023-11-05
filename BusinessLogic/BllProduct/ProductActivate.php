<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";

class ProductActivate
{
    public static function Activate(Product $product)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($product) {
            self::ActivateProduct($dataAccess, $product);
        });
    }

    private static function ActivateProduct(DataAccess $dataAccess, Product $product)
    {
        $dataAccess->NonQuery(
            "UPDATE product
             SET
               status = ?,
               updated_date = NOW()
             WHERE
               product_id = ?",
            function (PDOStatement $pstmt) use ($product) {
                $pstmt->bindValue(1, ProductStatusConstant::ACTIVE);
                $pstmt->bindValue(2, $product->getProductId());
            }
        );
    }
}
