<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/SentimentRecommendationConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/SentimentLabelConstant.php";

class Review
{
    private $reviewId;
    private $productId;
    private $orderId;
    private $buyerEmail;
    private $reviewText;
    private $status;
    private $sentiment;
    private $createdDate;
    private $updatedDate;
    private Order $order;

    private $productDetailNo;
    private $negativeReviewCount;
    private $neutralReviewCount;
    private $positiveReviewCount;
    private $totalReviewCount;

    public function getReviewId()
    {
        return $this->reviewId;
    }

    public function setReviewId($reviewId)
    {
        $this->reviewId = $reviewId;
        return $this;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    public function setBuyerEmail($buyerEmail)
    {
        $this->buyerEmail = $buyerEmail;
        return $this;
    }

    public function getReviewText()
    {
        return $this->reviewText;
    }

    public function setReviewText($reviewText)
    {
        $this->reviewText = $reviewText;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getSentiment()
    {
        return $this->sentiment;
    }

    public function setSentiment($sentiment)
    {
        $this->sentiment = $sentiment;
        return $this;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    public function getProductDetailNo()
    {
        return $this->productDetailNo;
    }

    public function setProductDetailNo($productDetailNo)
    {
        $this->productDetailNo = $productDetailNo;
        return $this;
    }

    public function getNegativeReviewCount()
    {
        return $this->negativeReviewCount;
    }

    public function setNegativeReviewCount($count)
    {
        $this->negativeReviewCount = $count;
        return $this;
    }

    public function getNeutralReviewCount()
    {
        return $this->neutralReviewCount;
    }

    public function setNeutralReviewCount($count)
    {
        $this->neutralReviewCount = $count;
        return $this;
    }

    public function getPositiveReviewCount()
    {
        return $this->positiveReviewCount;
    }

    public function setPositiveReviewCount($count)
    {
        $this->positiveReviewCount = $count;
        return $this;
    }

    public function getTotalReviewCount()
    {
        return $this->totalReviewCount;
    }

    public function setTotalReviewCount($count)
    {
        $this->totalReviewCount = $count;
        return $this;
    }

    public function getSentimentRecommendation(): string
    {
        switch (true) {
            case $this->sentiment < 0:
                return SentimentRecommendationConstant::NEGATIVE;
            case $this->sentiment > 0:
                return SentimentRecommendationConstant::POSITIVE;
            default:
                return SentimentRecommendationConstant::NEUTRAL;
        }
    }
    
    public function getSentimentLabel(): string
    {
        switch (true) {
            case $this->sentiment < 0:
                return SentimentLabelConstant::NEGATIVE;
            case $this->sentiment > 0:
                return SentimentLabelConstant::POSITIVE;
            default:
                return SentimentLabelConstant::NEUTRAL;
        }
    }
}
