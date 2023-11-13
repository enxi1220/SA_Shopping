<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/OrderStatusConstant.php";

class ReviewUpdate
{
    public static function Update(Review $review)
    {
        $dataAccess = DataAccess::getInstance();

        return $dataAccess->BeginDatabase(function ($dataAccess) use ($review) {
            self::UpdateReview($dataAccess, $review);
        });
    }

    private static function UpdateReview(DataAccess $dataAccess, Review $review)
    {
        return $dataAccess->NonQuery(
            "UPDATE review
            SET
                review_text = ?,
                status = ?,
                sentiment = ?,
               updated_date = NOW()
            WHERE
                order_id = ?",
            function (PDOStatement $pstmt) use ($review) {
                $pstmt->bindValue(1, $review->getReviewText(), PDO::PARAM_STR);
                $pstmt->bindValue(2, $review->getStatus(), PDO::PARAM_STR);
                $pstmt->bindValue(3, $review->getSentiment(), PDO::PARAM_STR);
                $pstmt->bindValue(4, $review->getOrder()->getOrderId(), PDO::PARAM_INT);
            }
        );
    }
}
