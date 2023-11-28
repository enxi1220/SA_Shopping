<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductActivate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['product'])) {
            throw new Exception("Please choose a product.");
        }

        $data = json_decode($_POST['product']);

        ValidationHelper::ValidateNumber($data->productId);

        $product = new Product();
        $product->setProductId($data->productId);

        ProductActivate::Activate($product);

        echo ResponseHelper::createJsonResponse("Activate product successfully. The product will be shown to buyers.");
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
                echo $e->getMessage();
    }
}
