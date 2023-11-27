<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductDetail.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        $product = new Product();
        $product->setSellerId($sellerId);

        $productDetail = new ProductDetail();

        $productImage = new ProductImage();

        $result = ProductRead::Read($product, $productDetail, $productImage);

        if (empty($result)) {
            echo json_encode($result);
            exit;
        }

        $output = array_map(
            function ($product) {
                return [
                    'productId' => $product->getProductId(),
                    'productNo' => $product->getProductNo(),
                    'sellerId' => $product->getSellerId(),
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'status' => $product->getStatus(),
                    'description' => $product->getDescription(),
                    'createdDate' => $product->getCreatedDate(),
                    'updatedDate' => $product->getUpdatedDate(),
                    // 'productDetails' => array_map(function ($detail) {
                    //     return [
                    //         'productDetailId' => $detail->getProductDetailId(),
                    //         'productDetailNo' => $detail->getProductDetailNo(),
                    //         'productId' => $detail->getProductId(),
                    //         'size' => $detail->getSize(),
                    //         'status' => $detail->getStatus(),
                    //         'color' => $detail->getColor(),
                    //         'material' => $detail->getMaterial(),
                    //         'minStockQty' => $detail->getMinStockQty(),
                    //         'availableQty' => $detail->getAvailableQty(),
                    //         'salesOutQty' => $detail->getSalesOutQty(),
                    //         'createdDate' => $detail->getCreatedDate(),
                    //         'updatedDate' => $detail->getUpdatedDate(),
                    //         'updatedBy' => $detail->getUpdatedBy()
                    //     ];
                    // }, $product->getProductDetails()),
                    // 'productImages' => array_map(function ($image) {
                    //     return [
                    //         'productImageId' => $image->getProductImageId(),
                    //         'productId' => $image->getProductId(),
                    //         'imageName' => $image->getImageName(),
                    //     ];
                    // }, $product->getProductImages())
                ];
            },
            $result
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
