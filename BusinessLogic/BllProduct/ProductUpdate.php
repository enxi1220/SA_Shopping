<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

class ProductUpdate
{
    public static function Update(Product $product)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($product) {
                self::UpdateProduct($dataAccess, $product);

                foreach ($product->getProductDetails() as $detail) {
                    if (empty($detail->getProductDetailId())) {
                        self::CreateProductDetail($dataAccess, $detail);
                    } else {
                        self::UpdateProductDetail($dataAccess, $detail);
                    }
                }
            }
        );

        return $result;
    }

    private static function UpdateProduct(DataAccess $dataAccess, Product $product)
    {
        $dataAccess->NonQuery(
            "UPDATE product
                SET
                    name = ?,
                    price = ?,
                    description = ?,
                    updated_date = NOW()
                WHERE
                    product_id = ?",
            function (PDOStatement $pstmt) use ($product) {
                $pstmt->bindValue(1, $product->getName(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $product->getPrice(), PDO::PARAM_STR);
                $pstmt->bindValue(3, $product->getDescription(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $product->getProductId(), PDO::PARAM_INT);
            }
        );
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
            }
        );
    }

    private static function UpdateProductDetail(DataAccess $dataAccess, ProductDetail $productDetail)
    {
        return $dataAccess->NonQuery(
            "UPDATE product_detail
                SET
                    size = ?,
                    color = ?,
                    material = ?,
                    min_stock_qty = ?,
                    available_qty = ?,
                    status = ?,
                    updated_date = NOW()
                WHERE
                    product_detail_no = ?",
            function (PDOStatement $pstmt) use ($productDetail) {
                $pstmt->bindValue(1, $productDetail->getSize(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $productDetail->getColor(), PDO::PARAM_STR);
                $pstmt->bindValue(3, $productDetail->getMaterial(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $productDetail->getMinStockQty(), PDO::PARAM_STR);
                $pstmt->bindValue(5, $productDetail->getAvailableQty(), PDO::PARAM_STR);
                $pstmt->bindValue(6, $productDetail->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(7, $productDetail->getProductDetailNo(), PDO::PARAM_STR);
            }
        );
    }
}
