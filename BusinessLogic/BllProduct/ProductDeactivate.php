<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";

class ProductDeactivate
{
    public static function Deactivate(Product $product)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($product) {
            self::DeactivateProduct($dataAccess, $product);
        });
    }

    private static function DeactivateProduct(DataAccess $dataAccess, Product $product)
    {
        $dataAccess->NonQuery(
            "UPDATE product
             SET
               status = ?,
               updated_date = NOW()
             WHERE
               product_id = ?",
            function (PDOStatement $pstmt) use ($product) {
                $pstmt->bindValue(1, ProductStatusConstant::INACTIVE);
                $pstmt->bindValue(2, $product->getProductId());
            }
        );
    }
}
