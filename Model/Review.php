<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
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
    private Buyer $buyer;

    private $productDetailNo;
    private $negativeReviewCount;
    private $neutralReviewCount;
    private $positiveReviewCount;
    private $totalReviewCount;
    
    private $sellerId;
    private $productName;
    private $productNo;

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

    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
        return $this;
    }

    public function getBuyer()
    {
        return $this->buyer;
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

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    public function getProductNo()
    {
        return $this->productNo;
    }

    public function setProductNo($productNo)
    {
        $this->productNo = $productNo;
        return $this;
    }

    public function getSentimentRecommendation(): string
    {
        switch ($this->sentiment) {
            case -3:
                return SentimentRecommendationConstant::VERY_NEG;
            case -2:
                return SentimentRecommendationConstant::NEGATIVE;
            case -1:
                return SentimentRecommendationConstant::SLIGHT_NEG;
            case 1:
                return SentimentRecommendationConstant::SLIGHT_POS;
            case 2:
                return SentimentRecommendationConstant::POSITIVE;
            case 3:
                return SentimentRecommendationConstant::VERY_POS;
            default:
                return SentimentRecommendationConstant::NEUTRAL;
        }
    }
    
    public function getSentimentLabel(): string
    {
        switch ($this->sentiment) {
            case -3:
                return SentimentLabelConstant::VERY_NEG;
            case -2:
                return SentimentLabelConstant::NEGATIVE;
            case -1:
                return SentimentLabelConstant::SLIGHT_NEG;
            case 1:
                return SentimentLabelConstant::SLIGHT_POS;
            case 2:
                return SentimentLabelConstant::POSITIVE;
            case 3:
                return SentimentLabelConstant::VERY_POS;
            default:
                return SentimentLabelConstant::NEUTRAL;
        }
    }
}
