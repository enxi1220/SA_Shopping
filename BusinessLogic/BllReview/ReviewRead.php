<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";

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
                $order = new Order();
                $order
                    // ->setOrderId($row['order_id'])
                    // ->setOrderNo($row['order_no'])
                    ->setProductDetailId($row['product_detail_id'])
                    ->setProductDetailNo($row['product_detail_no'])
                    // ->setBuyerId($row['buyer_id'])
                    // ->setStatus($row['status'])
                    // ->setProductName($row['product_name'])
                    // ->setPrice($row['price'])
                    // ->setQuantity($row['quantity'])
                    ->setSize($row['size'])
                    ->setColor($row['color'])
                    ->setMaterial($row['material'])
                    // ->setDeliveryAddress($row['delivery_address'])
                    // ->setDeliveryFee($row['delivery_fee'])
                    // ->setTotalPrice($row['total_price'])
                    // ->setCreatedDate($row['created_date'])
                    // ->setUpdatedDate($row['updated_date']);
                ;

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
}
