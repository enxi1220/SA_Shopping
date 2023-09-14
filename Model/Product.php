<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/PrefixConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ImagePathConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/UniqueNoHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/DateHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductDetail.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/ProductImage.php";

class Product
{
    private $productId;
    private $productNo;
    private $sellerId;
    private $name;
    private $price;
    private $status;
    private $description;
    private $createdDate;
    private $updatedDate;
    private Seller $seller;
    private Review $review;
    private ProductDetail $productDetail;
    private ProductImage $productImage;
    private $productDetails = array();
    private $productImages = array();
    private $reviews = array();

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    public function getProductNo()
    {
        return $this->productNo;
    }

    public function setProductNo($productNo = null)
    {
        $this->productNo = $productNo == null? UniqueNoHelper::RandomCode($this->prefix()): $productNo;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
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

    public function getSeller()
    {
        return $this->seller;
    }

    public function setSeller($seller)
    {
        $this->seller = $seller;
        return $this;
    }

    public function getReview()
    {
        return $this->review;
    }

    public function setReview($review)
    {
        $this->review = $review;
        return $this;
    }

    public function getProductDetail()
    {
        return $this->productDetail;
    }

    public function getProductImage()
    {
        return $this->productImage;
    }

    public function setProductImage($productImage){
        $this->productImage = $productImage;
        return $this;
    }

    public function setProductDetail($productDetail){
        $this->productDetail = $productDetail;
        return $this;
    }

    public function getProductDetails()
    {
        return $this->productDetails;
    }

    public function setProductDetails($productDetails){
        $this->productDetails = $productDetails;
        return $this;
    }

    public function getProductImages()
    {
        return $this->productImages;
    }

    public function setProductImages($productImages){
        $this->productImages = $productImages;
        return $this;
    }


    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews){
        $this->reviews = $reviews;
        return $this;
    }

    public function imagePath()
    {
        return ImagePathConstant::PATH;
    }

    public function prefix()
    {
        return PrefixConstant::PRODUCT;
    }
}
