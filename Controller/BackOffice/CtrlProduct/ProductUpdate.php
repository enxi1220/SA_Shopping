<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductUpdate.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/FileHelper.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['product'])) {
            throw new Exception("Please complete the product information.");
        }
        $dataProduct = json_decode($_POST['product']);

        if (!isset($dataProduct->productDetails) || empty($dataProduct->productDetails)) {
            throw new Exception("Please complete the product detail.");
        }
        $arrayProductDetail = $dataProduct->productDetails;

        $product = new Product();
        $product->setProductId($dataProduct->productId);
        $product->setName($dataProduct->name);
        $product->setPrice($dataProduct->price);
        $product->setDescription($dataProduct->description);

        foreach ($arrayProductDetail as $detail) {

            $productDetail = new ProductDetail();
            $productDetail->setProductDetailNo($detail->productDetailNo);
            $productDetail->setSize($detail->size);
            $productDetail->setColor($detail->color);
            $productDetail->setMaterial($detail->material);
            $productDetail->setMinStockQty($detail->minStockQty);
            $productDetail->setAvailableQty($detail->availableStockQty);

            if (empty($detail->productDetailId)) {
                $productDetail->setProductId($dataProduct->productId);
                $productDetail->setProductDetailNo();
            }else{
                $productDetail->setProductDetailId($detail->productDetailId);
            }

            if ($detail->status == ProductDetailStatusConstant::UNAVAILABLE) {
                $productDetail->setStatus(ProductDetailStatusConstant::UNAVAILABLE);
            } else {
                $productDetail->setStatus(
                    $detail->availableStockQty < 1 ? ProductDetailStatusConstant::OUTOFSTOCK : ProductDetailStatusConstant::AVAILABLE
                );
            }


            $product->pushProductDetails($productDetail);
        }

        ProductUpdate::Update($product);

        echo ResponseHelper::createJsonResponse("Update product successfully.", "/SA_Shopping/Web/View/BackOffice/Product/ProductSummary.php");
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
