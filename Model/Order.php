<?php

class Order {
    private $orderId;
    private $orderNo;
    private $productDetailId;
    private $productDetailNo;
    private $buyerId;
    private $status;
    private $productName;
    private $price;
    private $quantity;
    private $size;
    private $color;
    private $material;
    private $deliveryAddress;
    private $deliveryFee;
    private $totalPrice;
    private $createdDate;
    private $updatedDate;

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

    public function setOrderNo($orderNo) {
        $this->orderNo = $orderNo;
        return $this;
    }

    public function getProductDetailId() {
        return $this->productDetailId;
    }

    public function setProductDetailId($productDetailId) {
        $this->productDetailId = $productDetailId;
        return $this;
    }

    public function getProductDetailNo() {
        return $this->productDetailNo;
    }

    public function setProductDetailNo($productDetailNo) {
        $this->productDetailNo = $productDetailNo;
        return $this;
    }

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

    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
        return $this;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function setMaterial($material) {
        $this->material = $material;
        return $this;
    }

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

    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
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
}
