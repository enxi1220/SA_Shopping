<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductDetail.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductImageCreate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductImageDelete.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        if (isset($_POST['productImage'])) {
            $dataProductImage = json_decode($_POST['productImage']);

            $productImage = new ProductImage();
            $productImage->setProductId($dataProductImage->productId);
            $result = ProductRead::ReadImage($productImage);

            if (count($result) < 2) {
                throw new Exception("Product must have at least one image.");
            }

            $productImage->setProductImageId($dataProductImage->productImageId);
            $result = ProductRead::ReadImage($productImage);

            if (empty($result)) {
                throw new Exception("Image not found.");
            }

            $result = $result[0];
            $productImage->setImageName($result->getShortImageName());

            ProductImageDelete::Delete($productImage);

            echo ResponseHelper::createJsonResponse("Delete product image successfully.");

        } else if (isset($_FILES['productImage'])) {

            if (!isset($_POST['product'])) {
                throw new Exception("Please complete the product information.");
            }
            $dataProduct = json_decode($_POST['product']);

            FileHelper::ValidateImage();

            $dataProductImage = $_FILES['productImage'];
            $productImage = new ProductImage();
            $productImage->setTempImageName($dataProductImage);
            $productImage->setProductId($dataProduct->productId);

            ProductImageCreate::Create($productImage);

            echo ResponseHelper::createJsonResponse("Add product image successfully.");
            
        } else {
            throw new Exception("Please upload or delete a product image.");
        }
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        if (!isset($_GET['productId']) || empty($_GET['productId'])) {
            throw new Exception("Please choose a product.");
        }

        $productId = json_decode($_GET['productId']);

        $product = new Product();
        $product->setProductId($productId);

        $productDetail = new ProductDetail();

        $productImage = new ProductImage();

        $result = ProductRead::Read($product, $productDetail, $productImage);

        if (empty($result)) {
            echo json_encode($result);
            exit;
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
