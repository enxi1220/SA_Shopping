<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

class ProductImageCreate
{
    public static function Create(ProductImage $productImage)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($productImage) {

                $fileName = FileHelper::UploadImage($productImage->getTempImageName(), $productImage->imagePath());
                $productImage->setImageName($fileName);

                self::CreateProductImage($dataAccess, $productImage);
            }
        );

        return $result;
    }

    private static function CreateProductImage(DataAccess $dataAccess, ProductImage $productImage)
    {
        return $dataAccess->NonQuery(
            "INSERT INTO product_image (
                product_id, 
                image_name  
            ) VALUES (
                ?, ?)",
            function (PDOStatement $pstmt) use ($productImage) {
                $pstmt->bindValue(1, $productImage->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(2, $productImage->getShortImageName(), PDO::PARAM_STR);
            }
        );
    }
}
