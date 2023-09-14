<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductDetail.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllProduct/ProductRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllReview/ReviewReadCount.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductDetailStatusConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ProductStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        $product = new Product();
        $product->setStatus(ProductStatusConstant::ACTIVE);

        $productDetail = new ProductDetail();
        $productDetail->setStatus(ProductDetailStatusConstant::AVAILABLE);

        $result = ProductRead::Read($product, $productDetail, new ProductImage());

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        foreach ($result as $data) {
            $review = new Review();
            $review->setProductId($data->getProductId());

            $reviewCount = ReviewReadCount::Read($review);

            $data->setReview($reviewCount[0]);
        }

        $output = array_map(
            function ($data) {
                // bcz product creation must have 1 image, can predefine [0]

                $image = $data->getProductImages()[0];

                return [
                    'productId' => $data->getProductId(),
                    'productNo' => $data->getProductNo(),
                    'sellerId' => $data->getSellerId(),
                    'name' => $data->getName(),
                    'price' => $data->getPrice(),
                    'description' => $data->getDescription(),
                    'createdDate' => $data->getCreatedDate(),
                    'updatedDate' => $data->getUpdatedDate(),
                    'reviewCount' => array(
                        'productId' => $data->getReview()->getProductId(),
                        'negativeReview' => $data->getReview()->getNegativeReviewCount(),
                        'neutralReview' => $data->getReview()->getNeutralReviewCount(),
                        'positiveReview' => $data->getReview()->getPositiveReviewCount(),
                        'totalReview' => $data->getReview()->getTotalReviewCount()
                    ),
                    'productImage' => array(
                        'productImageId' => $image->getProductImageId(),
                        'productId' => $image->getProductId(),
                        'imageName' => $image->getImageName(),
                    )
                ];
            },
            $result
        );

        echo json_encode($output);
        
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        // echo $e->getMessage();
        echo $e;
    }
}
