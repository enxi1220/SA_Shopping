<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductCreate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        if (!isset($_POST['product'])) {
            throw new Exception("Please complete the product information.");
        }
        $dataProduct = json_decode($_POST['product']);

        ValidationHelper::ValidateText($dataProduct->name);
        ValidationHelper::ValidateText($dataProduct->description);
        ValidationHelper::ValidatePrice($dataProduct->price);

        if (!isset($dataProduct->productDetails) || empty($dataProduct->productDetails)) {
            throw new Exception("Please complete the product detail.");
        }
        $arrayProductDetail = $dataProduct->productDetails;
        foreach ($arrayProductDetail as $detail) {
            ValidationHelper::ValidateText($detail->size);
            ValidationHelper::ValidateText($detail->color);
            ValidationHelper::ValidateText($detail->material);
            ValidationHelper::ValidateNumber($detail->minStockQty, false);
            ValidationHelper::ValidateNumber($detail->availableStockQty, false);
        }

        if (!isset($_FILES['productImage'])) {
            throw new Exception("Please upload a product image.");
        }
        FileHelper::ValidateImage();

        $dataProductImage = $_FILES['productImage'];
        $productImage = new ProductImage();
        $productImage->setTempImageName($dataProductImage);

        $product = new Product();
        $product->setSellerId($sellerId);
        $product->setProductNo();
        $product->setStatus(ProductStatusConstant::ACTIVE);
        $product->setName($dataProduct->name);
        $product->setPrice($dataProduct->price);
        $product->setDescription($dataProduct->description);

        $product->setProductImage($productImage);

        foreach ($arrayProductDetail as $detail) {
            $productDetail = new ProductDetail();
            $productDetail->setSize($detail->size);
            $productDetail->setColor($detail->color);
            $productDetail->setMaterial($detail->material);
            $productDetail->setMinStockQty($detail->minStockQty);
            $productDetail->setAvailableQty($detail->availableStockQty);
            $productDetail->setProductDetailNo();
            $productDetail->setStatus($detail->availableStockQty < 1 ? ProductDetailStatusConstant::OUTOFSTOCK : ProductDetailStatusConstant::AVAILABLE);

            $product->pushProductDetails($productDetail);
        }

        $fileName = FileHelper::ProcessImage($productImage->getTempImageName(), $productImage->imagePath());
        $productImage->setImageName($fileName);

        ProductCreate::Create($product);

        echo ResponseHelper::createJsonResponse("Add product successfully.", "/SA_Shopping/BackOffice/Product/ProductSummary.php");

    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
