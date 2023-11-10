<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

class ProductImageDelete
{
    public static function Delete(ProductImage $productImage)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($productImage) {

                FileHelper::DeleteImage($productImage->getImageName());

                self::DeleteProductImage($dataAccess, $productImage);
            }
        );

        return $result;
    }

    private static function DeleteProductImage(DataAccess $dataAccess, ProductImage $productImage)
    {
        return $dataAccess->NonQuery(
            "DELETE FROM product_image 
             WHERE product_image_id = ?",
            function (PDOStatement $pstmt) use ($productImage) {
                $pstmt->bindValue(1, $productImage->getProductImageId(), PDO::PARAM_INT);
            }
        );
    }
}
