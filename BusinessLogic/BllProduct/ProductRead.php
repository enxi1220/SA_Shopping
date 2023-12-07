<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";

class ProductRead
{
    public static function Read(Product $product, ProductDetail $productDetail, ProductImage $productImage)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($product, $productDetail, $productImage) {
                $products = [];

                $products =  self::ReadProduct($dataAccess, $product, $productDetail);

                foreach ($products as $product) {
                    $productDetail->setProductId($product->getProductId());
                    $productDetails = self::ReadProductDetail($dataAccess, $productDetail);
                    $product->setProductDetails($productDetails);
                }

                foreach ($products as $product) {
                    $productImage->setProductId($product->getProductId());
                    $productImages = self::ReadProductImage($dataAccess, $productImage);
                    $product->setProductImages($productImages);
                }

                return $products;
            }
        );

        return $result;
    }

    public static function ReadForReport(Product $product)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($product) {
                return self::ReadProductLowerThanThreshold($dataAccess, $product);
            }
        );

        return $result;
    }

    public static function ReadImage(ProductImage $productImage)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($productImage) {
                return self::ReadProductImage($dataAccess, $productImage);
            }
        );

        return $result;
    }

    private static function ReadProduct(DataAccess $dataAccess, Product $product, ProductDetail $productDetail)
    {
        return $dataAccess->Reader(
            "SELECT DISTINCT
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
             LEFT JOIN product_detail pd ON p.product_id = pd.product_id
             JOIN seller s ON s.seller_id = p.seller_id
             WHERE
                p.product_id =  IF(:product_id IS NULL, p.product_id, :product_id)
                AND p.seller_id = IF(:seller_id IS NULL, p.seller_id, :seller_id)
                AND p.status = IF(:pStatus IS NULL, p.status, :pStatus)
                AND s.status = IF(:sStatus IS NULL, s.status, :sStatus)
                AND pd.product_detail_id =  IF(:product_detail_id IS NULL, pd.product_detail_id, :product_detail_id)
            ORDER BY p.product_id DESC",
            function (PDOStatement $pstmt) use ($product, $productDetail) {
                $pstmt->bindValue(":product_id", $product->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(":seller_id", $product->getSellerId(), PDO::PARAM_INT);
                $pstmt->bindValue(":pStatus", $product->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(":sStatus", $product->getSellerStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(":product_detail_id", $productDetail->getProductDetailId(), PDO::PARAM_STR);
            },
            function ($row) {
                $product = new Product();

                return $product
                    ->setProductId($row['product_id'])
                    ->setProductNo($row['product_no'])
                    ->setSellerId($row['seller_id'])
                    ->setName($row['name'])
                    ->setPrice($row['price'])
                    ->setStatus($row['status'])
                    ->setDescription($row['description'])
                    ->setCreatedDate($row['created_date'])
                    ->setUpdatedDate($row['updated_date']);
            }
        );
    }

    private static function ReadProductDetail(DataAccess $dataAccess, ProductDetail $productDetail)
    {
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
            function (PDOStatement $pstmt) use ($productDetail) {
                $pstmt->bindValue(":product_detail_id", $productDetail->getProductDetailId(), PDO::PARAM_INT);
                $pstmt->bindValue(":product_id", $productDetail->getProductId(), PDO::PARAM_INT);
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

    private static function ReadProductImage(DataAccess $dataAccess, ProductImage $productImage)
    {
        return $dataAccess->Reader(
            "SELECT 
                pi.product_image_id,
                pi.product_id, 
                pi.image_name
             FROM product_image pi
             WHERE
                pi.product_id = IF(:product_id IS NULL, pi.product_id, :product_id)
                AND  pi.product_image_id = IF(:product_image_id IS NULL, pi.product_image_id, :product_image_id)",
            function (PDOStatement $pstmt) use ($productImage) {
                $pstmt->bindValue(":product_id", $productImage->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(":product_image_id", $productImage->getProductImageId(), PDO::PARAM_INT);
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

    private static function ReadProductLowerThanThreshold(DataAccess $dataAccess, Product $product)
    {
        return $dataAccess->Reader(
            "SELECT 
                p.name, 
                p.product_id,
                pd.product_detail_id, 
                product_detail_no, 
                pd.available_qty, 
                pd.min_stock_qty
             FROM product_detail pd
             JOIN product p ON p.product_id = pd.product_id
             WHERE pd.available_qty <= pd.min_stock_qty
             AND p.seller_id = :seller_id",
            function (PDOStatement $pstmt) use ($product) {
                $pstmt->bindValue(":seller_id", $product->getSellerId(), PDO::PARAM_INT);
            },
            function ($row) {
                $productDetail = new ProductDetail();

                return $productDetail
                    ->setProductDetailId($row['product_detail_id'])
                    ->setProductDetailNo($row['product_detail_no'])
                    ->setProductId($row['product_id'])
                    ->setMinStockQty($row['min_stock_qty'])
                    ->setAvailableQty($row['available_qty'])
                    ->setProductName($row['name']);
            }
        );
    }
}
