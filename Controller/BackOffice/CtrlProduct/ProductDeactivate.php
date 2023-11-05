<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductDeactivate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['product'])) {
            throw new Exception("Please choose a product.");
        }

        $data = json_decode($_POST['product']);

        $product = new Product();
        $product->setProductId($data->productId);

        ProductDeactivate::Deactivate($product);

        echo ResponseHelper::createJsonResponse("Deactivate product successfully. The product will be hidden from buyers.");
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
