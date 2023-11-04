<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/OrderStatusConstant.php";

class ReviewCreate
{
    public static function Create(Review $review)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($review) {
            $reviewId = self::CreateReview($dataAccess, $review);
            self::UpdateOrder($dataAccess, $review->getOrder());
        });
    }

    private static function CreateReview(DataAccess $dataAccess, Review $review)
    {
        $reviewId = $dataAccess->NonQuery(
            "INSERT INTO review (
                product_id,
                order_id,
                buyer_email,
                review_text,
                status,
                sentiment,
                created_date
            ) VALUES (?, ?, ?, ?, ?, ?, NOW())",
            function (PDOStatement $pstmt) use ($review) {
                $pstmt->bindValue(1, $review->getOrder()->getProductId(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $review->getOrder()->getOrderId(), PDO::PARAM_INT);
                $pstmt->bindValue(3, $review->getBuyer()->getEmail(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $review->getReviewText(), PDO::PARAM_STR);
                $pstmt->bindValue(5, $review->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(6, $review->getSentiment(), PDO::PARAM_STR);
            }
        );
        return $reviewId;
    }

    private static function UpdateOrder(DataAccess $dataAccess, Order $order)
    {
        $dataAccess->NonQuery(
            "UPDATE `order`
                 SET
                    status = ?,
                    updated_date = NOW()
                 WHERE
                    order_id = ?",
            function (PDOStatement $pstmt) use ($order) {
                $pstmt->bindValue(1, OrderStatusConstant::CLOSED, PDO::PARAM_STR);
                $pstmt->bindValue(2, $order->getOrderId(), PDO::PARAM_INT);
            }
        );
    }
}
