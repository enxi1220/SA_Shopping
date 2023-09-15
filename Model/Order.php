<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Buyer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Review.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/PrefixConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/UniqueNoHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/DateHelper.php";

class Order {
    private $orderId;
    private $orderNo;
    private $status;
    // private $productName;
    private $productDetailId;
    // private $productDetailNo;
    // private $price;
    private $quantity;
    // private $size;
    // private $color;
    // private $material;
    private $buyerId;
    private $deliveryAddress;
    private $deliveryFee;
    private $totalPrice;
    private $createdDate;
    private $updatedDate;
    private $paymentMethod;

    // private $buyerPhone;
    // private $buyerName;
    // private $buyerEmail;
    private $sellerId;
    private $productId;
    private Product $product;
    private Buyer $buyer;
    private Review $review;

    public function getOrderId() {
        return $this->orderId;
    }

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
        return $this;
    }

    public function getOrderNo() {
        return $this->orderNo;
    }

    public function setOrderNo($orderNo = null) {
        $this->orderNo = $orderNo == null ? UniqueNoHelper::RandomCode($this->prefix()) : $orderNo;
        return $this;
    }

    public function getProductDetailId() {
        return $this->productDetailId;
    }

    public function setProductDetailId($productDetailId) {
        $this->productDetailId = $productDetailId;
        return $this;
    }

    // public function getProductDetailNo() {
    //     return $this->productDetailNo;
    // }

    // public function setProductDetailNo($productDetailNo) {
    //     $this->productDetailNo = $productDetailNo;
    //     return $this;
    // }

    public function getBuyerId() {
        return $this->buyerId;
    }

    public function setBuyerId($buyerId) {
        $this->buyerId = $buyerId;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    // public function getProductName() {
    //     return $this->productName;
    // }

    // public function setProductName($productName) {
    //     $this->productName = $productName;
    //     return $this;
    // }

    // public function getPrice() {
    //     return $this->price;
    // }

    // public function setPrice($price) {
    //     $this->price = $price;
    //     return $this;
    // }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    // public function getSize() {
    //     return $this->size;
    // }

    // public function setSize($size) {
    //     $this->size = $size;
    //     return $this;
    // }

    // public function getColor() {
    //     return $this->color;
    // }

    // public function setColor($color) {
    //     $this->color = $color;
    //     return $this;
    // }

    // public function getMaterial() {
    //     return $this->material;
    // }

    // public function setMaterial($material) {
    //     $this->material = $material;
    //     return $this;
    // }

    public function getDeliveryAddress() {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress($deliveryAddress) {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function getDeliveryFee() {
        return $this->deliveryFee;
    }

    public function setDeliveryFee($deliveryFee) {
        $this->deliveryFee = $deliveryFee;
        return $this;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice = null) {
        $this->totalPrice = $totalPrice == null? ($this->product->getPrice() * $this->quantity ) + $this->deliveryFee : $totalPrice;
        return $this;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;
        return $this;
    }
    
    // public function getBuyerPhone() {
    //     return $this->buyerPhone;
    // }

    // public function setBuyerPhone($buyerPhone) {
    //     $this->buyerPhone = $buyerPhone;
    //     return $this;
    // }

    // public function getBuyerName() {
    //     return $this->buyerName;
    // }

    // public function setBuyerName($buyerName) {
    //     $this->buyerName = $buyerName;
    //     return $this;
    // }

    // public function getBuyerEmail() {
    //     return $this->buyerEmail;
    // }

    // public function setBuyerEmail($buyerEmail) {
    //     $this->buyerEmail = $buyerEmail;
    //     return $this;
    // }
    
    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
    
    public function getSellerId() {
        return $this->sellerId;
    }

    public function setSellerId($sellerId) {
        $this->sellerId = $sellerId;
        return $this;
    }
    
    public function getProductId() {
        return $this->productId;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
        return $this;
    }
    
    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }
    
    public function getBuyer() {
        return $this->buyer;
    }

    public function setBuyer($buyer) {
        $this->buyer = $buyer;
        return $this;
    }
    
    public function getReview() {
        return $this->review;
    }

    public function setReview($review) {
        $this->review = $review;
        return $this;
    }

    public function prefix(){
        return PrefixConstant::ORDER;
    }

}
