<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ImagePathConstant.php";

class ProductRead
{
    public static function Read(Product $product, ProductDetail $productDetail, ProductImage $productImage)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($product, $productDetail, $productImage) {
                $products = [];
                
                $products =  self::ReadProduct($dataAccess, $product);
                
                foreach ($products as $product) {
                    $productDetails = self::ReadProductDetail($dataAccess, $product, $productDetail);
                    $product->setProductDetails($productDetails);
                }

                foreach ($products as $product) {
                    $productImages = self::ReadProductImage($dataAccess, $product, $productImage);
                    $product->setProductImages($productImages);
                }
                
                return $products;
            }
        );

        return $result;
    }

    private static function ReadProduct(DataAccess $dataAccess, Product $product)
    {
        return $dataAccess->Reader(
            "SELECT 
                p.product_id, 
                p.product_no, 
                p.seller_id, 
                p.name, 
                p.price, 
                p.status,
                p.description, 
                p.created_date, 
                p.updated_date
             FROM product p
             JOIN seller s on p.seller_id = s.seller_id
             WHERE
                p.product_id =  IF(:product_id IS NULL, p.product_id, :product_id)
                AND p.seller_id = IF(:seller_id IS NULL, p.seller_id, :seller_id)
                AND p.status = IF(:status IS NULL, p.status, :status)
             ORDER BY p.product_id DESC",
            function (PDOStatement $pstmt) use ($product) {
                $pstmt->bindValue(":product_id", $product->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(":seller_id", $product->getSellerId(), PDO::PARAM_STR);
                $pstmt->bindValue(":status", $product->getStatus(), PDO::PARAM_STR);
            },
            function ($row) {
                $product = new Product();

                return $product
                ->setProductId($row['product_id'])
                ->setProductNo($row['product_no'])
                ->setSellerId($row['seller_id'])
                ->setName($row['name'])
                ->setPrice($row['price'])
                ->setDescription($row['description'])
                ->setCreatedDate($row['created_date'])
                ->setUpdatedDate($row['updated_date']);
            }
        );
    }

    private static function ReadProductDetail(DataAccess $dataAccess, Product $product, ProductDetail $productDetail){
        return $dataAccess->Reader(
            "SELECT 
                pd.product_detail_id,
                pd.product_detail_no,
                pd.product_id,
                pd.size,
                pd.status,
                pd.color,
                pd.material,
                pd.min_stock_qty,
                pd.available_qty,
                pd.sales_out_qty,
                pd.created_date,
                pd.updated_date,
                pd.updated_by
             FROM product_detail pd
             WHERE
                pd.product_detail_id = IF(:product_detail_id IS NULL, pd.product_detail_id, :product_detail_id)
                AND pd.product_id =  IF(:product_id IS NULL, pd.product_id, :product_id)
                AND pd.status = IF(:status IS NULL, pd.status, :status)",
            function (PDOStatement $pstmt) use ($product, $productDetail) {
                $pstmt->bindValue(":product_detail_id", $productDetail->getProductDetailId(), PDO::PARAM_INT);
                $pstmt->bindValue(":product_id", $product->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(":status", $productDetail->getStatus(), PDO::PARAM_STR);
            },
            function ($row) {
                $productDetail = new ProductDetail();

                return $productDetail
                ->setProductDetailId($row['product_detail_id'])
                ->setProductDetailNo($row['product_detail_no'])
                ->setProductId($row['product_id'])
                ->setSize($row['size'])
                ->setStatus($row['status'])
                ->setColor($row['color'])
                ->setMaterial($row['material'])
                ->setMinStockQty($row['min_stock_qty'])
                ->setAvailableQty($row['available_qty'])
                ->setSalesOutQty($row['sales_out_qty'])
                ->setCreatedDate($row['created_date'])
                ->setUpdatedDate($row['updated_date'])
                ->setUpdatedBy($row['updated_by']);
            }
        );
    }

    private static function ReadProductImage(DataAccess $dataAccess, Product $product, ProductImage $productImage){
        return $dataAccess->Reader(
            "SELECT 
                pi.product_image_id,
                pi.product_id, 
                pi.image_name
             FROM product_image pi
             WHERE
                pi.product_id =  IF(:product_id IS NULL, pi.product_id, :product_id)",
            function (PDOStatement $pstmt) use ($product, $productImage) {
                $pstmt->bindValue(":product_id", $product->getProductId(), PDO::PARAM_INT);
            },
            function ($row) {
                $productImage = new ProductImage();

                return $productImage
                ->setProductImageId($row['product_image_id'])
                ->setProductId($row['product_id'])
                ->setImageName($row['image_name']);
            }
        );
    }
}