<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductDetail.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (!isset($_GET['productId'])) {
            throw new Exception("Product not found.");
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
        $output = array_map(
            function ($image) {
                return [
                    'productImageId' => $image->getProductImageId(),
                    'productId' => $image->getProductId(),
                    'imageName' => $image->getImageName(),
                ];
            },
            $result->getProductImages()
        );

        echo json_encode($output);

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}