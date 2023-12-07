<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";

class ReviewRead
{
    public static function Read(Review $review)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($review) {
                return self::ReadReview($dataAccess, $review);
            }
        );

        return $result;
    }

    public static function ReadForReport(Review $review)
    {
        $dataAccess = DataAccess::getInstance();
        $result = $dataAccess->BeginDatabase(
            function (DataAccess $dataAccess) use ($review) {
                return self::ReadReviewForReport($dataAccess, $review);
            }
        );

        return $result;
    }

    private static function ReadReview(DataAccess $dataAccess, Review $review)
    {
        return $dataAccess->Reader(
            "SELECT
                r.review_id,
                r.product_id,
                r.order_id,
                r.buyer_email,
                r.review_text,
                r.status,
                r.sentiment,
                r.created_date,
                r.updated_date,
                o.product_detail_id,
                o.product_detail_no,
                o.size,
                o.color,
                o.material
             FROM review r
             JOIN `order` o ON r.order_id = o.order_id 
             WHERE
                r.review_id = IF(:review_id IS NULL, r.review_id, :review_id)
                AND r.order_id = IF(:order_id IS NULL, r.order_id, :order_id)
                AND r.product_id = IF(:product_id IS NULL, r.product_id, :product_id)
                AND r.status = IF(:status IS NULL, r.status, :status)
             ORDER BY r.created_date DESC",
            function (PDOStatement $pstmt) use ($review) {
                $pstmt->bindValue(":review_id", $review->getReviewId(), PDO::PARAM_INT);
                $pstmt->bindValue(":order_id", $review->getOrderId(), PDO::PARAM_INT);
                $pstmt->bindValue(":product_id", $review->getProductId(), PDO::PARAM_INT);
                $pstmt->bindValue(":status", $review->getStatus(), PDO::PARAM_STR);
            },
            function ($row) {
                $productDetail = new ProductDetail();
                $productDetail
                    ->setProductDetailId($row['product_detail_id'])
                    ->setProductDetailNo($row['product_detail_no'])
                    ->setSize($row['size'])
                    ->setColor($row['color'])
                    ->setMaterial($row['material']);

                $product = new Product();
                $product->setProductDetail($productDetail);

                $order = new Order();
                $order->setProduct($product);

                $review = new Review();
                return $review
                    ->setReviewId($row['review_id'])
                    ->setProductId($row['product_id'])
                    ->setOrderId($row['order_id'])
                    ->setBuyerEmail($row['buyer_email'])
                    ->setReviewText($row['review_text'])
                    ->setStatus($row['status'])
                    ->setSentiment($row['sentiment'])
                    ->setCreatedDate($row['created_date'])
                    ->setUpdatedDate($row['updated_date'])
                    ->setOrder($order);
            }
        );
    }

    private static function ReadReviewForReport(DataAccess $dataAccess, Review $review)
    {
        return $dataAccess->Reader(
            "SELECT
                p.product_id,
                COALESCE(SUM(CASE WHEN r.sentiment < 0 THEN 1 ELSE 0 END), 0) AS negative_reviews,
                COALESCE(SUM(CASE WHEN r.sentiment > 0 THEN 1 ELSE 0 END), 0) AS positive_reviews,
                COALESCE(SUM(CASE WHEN r.sentiment = 0 THEN 1 ELSE 0 END), 0) AS neutral_reviews,
                COALESCE(COUNT(r.review_id), 0) AS total_reviews,
                p.name,
                p.product_no
            FROM (
                SELECT product_id, name, product_no, seller_id
                FROM product 
            ) AS p
            LEFT JOIN review r ON p.product_id = r.product_id
            JOIN seller s ON s.seller_id = p.seller_id
            WHERE p.seller_id = :seller_id
            AND r.product_id IS NOT NULL
            GROUP BY p.product_id, p.name",
            function (PDOStatement $pstmt) use ($review) {
                $pstmt->bindValue(":seller_id", $review->getSellerId(), PDO::PARAM_INT);
            },
            function ($row) {
                $review = new Review();
                return $review
                    ->setProductId($row['product_id'])
                    ->setNegativeReviewCount($row['negative_reviews'])
                    ->setNeutralReviewCount($row['neutral_reviews'])
                    ->setPositiveReviewCount($row['positive_reviews'])
                    ->setTotalReviewCount($row['total_reviews'])
                    ->setProductName($row['name'])
                    ->setProductNo($row['product_no']);
            }
        );
    }
}
