<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

class ProductCreate
{
    public static function Create(Product $product)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($product) {
                $productId =  self::CreateProduct($dataAccess, $product);

                foreach ($product->getProductDetails() as $detail) {
                    $detail->setProductId($productId);
                    self::CreateProductDetail($dataAccess, $detail);
                }
                
                $image = $product->getProductImage();
                $image->setProductId($productId);

                self::CreateProductImage($dataAccess, $image);
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

    private static function CreateProductDetail(DataAccess $dataAccess, ProductDetail $productDetail)
    {
        return $dataAccess->NonQuery(
            "INSERT INTO product_detail (
                product_detail_no, 
                product_id, 
                status,
                size,  
                color, 
                material, 
                min_stock_qty, 
                available_qty, 
                created_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())",
            function (PDOStatement $pstmt) use ($productDetail) {
                $pstmt->bindValue(1, $productDetail->getProductDetailNo(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $productDetail->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(3, $productDetail->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $productDetail->getSize(), PDO::PARAM_STR);
                $pstmt->bindValue(5, $productDetail->getColor(), PDO::PARAM_STR);
                $pstmt->bindValue(6, $productDetail->getMaterial(), PDO::PARAM_STR);
                $pstmt->bindValue(7, $productDetail->getMinStockQty(), PDO::PARAM_STR);
                $pstmt->bindValue(8, $productDetail->getAvailableQty(), PDO::PARAM_STR);
            },
            function (Exception $ex) {
                if (str_contains($ex, 'Duplicate entry') && str_contains($ex, 'product_detail_no_UNIQUE')) {
                    throw new Exception("Duplicate product detail no is generated. Please try again.", 500);
                }
                if (str_contains($ex, 'Duplicate entry') && str_contains($ex, 'composite_key')) {
                    throw new Exception("Duplicate product detail (size, color, material) is added. Please try again.", 500);
                }
            }
        );
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
