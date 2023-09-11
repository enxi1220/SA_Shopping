

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/DataAccess/DataAccess.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";

class ReviewReadCount
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
                r.product_id,
                SUM(CASE WHEN r.sentiment < 0 THEN 1 ELSE 0 END) AS negative_reviews,
                SUM(CASE WHEN r.sentiment > 0 THEN 1 ELSE 0 END) AS positive_reviews,
                SUM(CASE WHEN r.sentiment = 0 THEN 1 ELSE 0 END) AS neutral_reviews,
                COUNT(review_id) AS total_reviews
             FROM review r
             WHERE r.product_id = IF(:product_id IS NULL, r.product_id, :product_id)
             GROUP BY r.product_id",
            function (PDOStatement $pstmt) use ($review) {
                $pstmt->bindValue(":product_id", $review->getProductId(), PDO::PARAM_INT);
            },
            function ($row) {
                $review = new Review();

                return $review
                    ->setProductId($row['product_id'])
                    ->setNegativeReviewCount($row['negative_reviews'])
                    ->setNeutralReviewCount($row['neutral_reviews'])
                    ->setPositiveReviewCount($row['positive_reviews'])
                    ->setTotalReviewCount($row['total_reviews']);
            }
        );
    }
}
