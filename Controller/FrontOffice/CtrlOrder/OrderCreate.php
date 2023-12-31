<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ValidationHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/OrderStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllBuyer/BuyerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllOrder/OrderCreate.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        if (!isset($_GET['productDetailId']) || $_GET['productDetailId'] === 'undefined' || !isset($_GET['quantity'])) {
            throw new Exception("Please choose a variation.");
        }

        $productDetailId = json_decode($_GET['productDetailId']);
        $quantity = json_decode($_GET['quantity']);

        $product = new Product();
        $productDetail = new ProductDetail();
        $productDetail->setProductDetailId($productDetailId);
        $productImage = new ProductImage();

        $productResult = ProductRead::Read($product, $productDetail, $productImage);

        if (empty($productResult)) {
            throw new Exception("Product not found");
        }
        $productResult = $productResult[0];

        session_start();
        $buyerId = $_SESSION['buyer']['buyerId'];
        $buyer = new Buyer();
        $buyer->setBuyerId($buyerId);

        $buyerResult = BuyerRead::Read($buyer);

        if (empty($buyerResult)) {
            throw new Exception("Buyer not found");
        }
        $buyerResult = $buyerResult[0];

        $order = new Order();
        $order
            ->setProduct($productResult)
            ->setBuyer($buyerResult)
            // todo: replace delivery fee hardcode
            ->setDeliveryFee(5);

        $product = $order->getProduct();
        $buyer = $order->getBuyer();

        $output = array(
            'quantity' => $quantity,
            'deliveryFee' => $order->getDeliveryFee(),
            'product' => array(
                'productId' => $product->getProductId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'productDetail' => array(
                    'productDetailId' => $product->getProductDetails()[0]->getProductDetailId(),
                    // 'productDetailNo' => $product->getProductDetail()->getProductDetailNo(),
                    'size' => $product->getProductDetails()[0]->getSize(),
                    'color' => $product->getProductDetails()[0]->getColor(),
                    'material' => $product->getProductDetails()[0]->getMaterial(),
                ),
                'productImage' => array(
                    'imageName' => $product->getProductImages()[0]->getImageName()
                )
            ),
            'buyer' => array(
                // 'buyerId' => $buyer->getBuyerId(),
                'deliveryAddress' => $buyer->getDeliveryAddress()
            )
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (!isset($_POST['order'])) {
            throw new Exception("Order information is not complete.");
        }

        $data = json_decode($_POST['order']);

        ValidationHelper::ValidateNumber($data->productDetailId);
        ValidationHelper::ValidateNumber($data->quantity);
        ValidationHelper::ValidateText($data->deliveryAddress);
        ValidationHelper::ValidateText($data->paymentMethod);

        session_start();
        $buyerId = $_SESSION['buyer']['buyerId'];

        // check product availability
        $product = new Product();
        $product->setStatus(ProductStatusConstant::ACTIVE);

        $productDetail = new ProductDetail();
        $productDetail
            ->setProductDetailId($data->productDetailId)
            ->setStatus(ProductDetailStatusConstant::AVAILABLE);

        $productResult = ProductRead::Read($product, $productDetail, new ProductImage());

        // buyer buy right after seller deactivate product
        if (empty($productResult)) {
            throw new Exception("The product is no more selling now.");
        }
        $productResult = $productResult[0];

        $seller = new Seller();
        $seller
            ->setSellerId($productResult->getSellerId())
            ->setStatus(UserStatusConstant::ACTIVE);
        $sellerResult = SellerRead::Read($seller);

        // buyer buy right after seller delete account
        if (empty($sellerResult)) {
            throw new Exception("The shop is closed now.");
        }

        // buyer buy right after seller deactivate variation
        if (empty($productResult->getProductDetails())) {
            throw new Exception("The variation is unavailable now.");
        }

        // check variation quantity
        $productDetailResult = $productResult->getProductDetails()[0];
        if ($productDetailResult->getAvailableQty() < $data->quantity) {
            throw new Exception("The quantity exceeds available quantity, please buy not more than " . $productDetailResult->getAvailableQty(). ".");
        }

        $product = $productResult;
        $product->setProductDetail($productDetailResult);

        $order = new Order();
        $order
            ->setOrderNo()
            // todo: replace delivery fee hardcode
            ->setDeliveryFee(5)
            ->setDeliveryAddress($data->deliveryAddress)
            ->setProductDetailId($data->productDetailId)
            ->setQuantity($data->quantity)
            ->setBuyerId($buyerId)
            ->setStatus(OrderStatusConstant::CONFIRM)
            ->setProduct($product)
            ->setPaymentMethod($data->paymentMethod)
            ->setTotalPrice();

        OrderCreate::Create($order);

        echo ResponseHelper::createJsonResponse("Order is placed. Order No: " . $order->getOrderNo());
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        echo $e->getMessage();
    }
}
