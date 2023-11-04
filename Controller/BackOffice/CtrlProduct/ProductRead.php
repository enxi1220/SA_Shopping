<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductDetail.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['productId']) || empty($_GET['productId'])) {
            throw new Exception("Please choose a product.");
        }

        $productId = json_decode($_GET['productId']);

        $product = new Product();
        $product
            ->setProductId($productId);

        $productDetail = new ProductDetail();

        $productImage = new ProductImage();

        $result = ProductRead::Read($product, $productDetail, $productImage);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];
        $output = array(
            'productId' => $result->getProductId(),
            'productNo' => $result->getProductNo(),
            'sellerId' => $result->getSellerId(),
            'name' => $result->getName(),
            'price' => $result->getPrice(),
            'description' => $result->getDescription(),
            'createdDate' => $result->getCreatedDate(),
            'updatedDate' => $result->getUpdatedDate(),
            'productDetails' => array_map(function ($detail) {
                return [
                    'productDetailId' => $detail->getProductDetailId(),
                    'productDetailNo' => $detail->getProductDetailNo(),
                    'productId' => $detail->getProductId(),
                    'size' => $detail->getSize(),
                    'status' => $detail->getStatus(),
                    'color' => $detail->getColor(),
                    'material' => $detail->getMaterial(),
                    'minStockQty' => $detail->getMinStockQty(),
                    'availableQty' => $detail->getAvailableQty(),
                    'salesOutQty' => $detail->getSalesOutQty(),
                    'createdDate' => $detail->getCreatedDate(),
                    'updatedDate' => $detail->getUpdatedDate(),
                    'updatedBy' => $detail->getUpdatedBy()
                ];
            }, $result->getProductDetails()),
            'productImages' => array_map(function ($image) {
                return [
                    'productImageId' => $image->getProductImageId(),
                    'productId' => $image->getProductId(),
                    'imageName' => $image->getImageName(),
                ];
            }, $result->getProductImages())
        );

        echo json_encode($output);
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
