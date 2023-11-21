

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
                COALESCE(r.product_id, 2) AS product_id,
                COALESCE(SUM(CASE WHEN r.sentiment = 1 THEN 1 ELSE 0 END), 0) AS negative_reviews,
                COALESCE(SUM(CASE WHEN r.sentiment = 2 THEN 1 ELSE 0 END), 0) AS positive_reviews,
                COALESCE(SUM(CASE WHEN r.sentiment = 0 THEN 1 ELSE 0 END), 0) AS neutral_reviews,
                COALESCE(COUNT(r.review_id), 0) AS total_reviews
             FROM (
                SELECT product_id
                FROM product 
             ) AS p
             LEFT JOIN review r ON p.product_id = r.product_id
             WHERE p.product_id = IF(:product_id IS NULL, p.product_id, :product_id)
             GROUP BY p.product_id",
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
