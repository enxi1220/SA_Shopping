<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/IUser.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/UniqueNoHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/PrefixConstant.php";

class Buyer implements IUser {
    private $buyerId;
    private $username;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $status;
    private $resetCode;
    private $createdDate;
    private $updatedDate;
    private $deliveryAddress;

    public function getBuyerId() {
        return $this->buyerId;
    }

    public function setBuyerId($buyerId) {
        $this->buyerId = $buyerId;
        return $this;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username = null) {
        $this->username = $username;
        $this->username = $username == null? UniqueNoHelper::RandomUsername($this->email, $this->prefix()) : $username;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function getResetCode() {
        return $this->resetCode;
    }

    public function setResetCode($resetCode) {
        $this->resetCode = $resetCode;
        return $this;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
        return $this;
    }

    // public function getCreatedBy() {
    //     return $this->createdBy;
    // }

    // public function setCreatedBy($createdBy) {
    //     $this->createdBy = $createdBy;
    //     return $this;
    // }

    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;
        return $this;
    }

    // public function getUpdatedBy() {
    //     return $this->updatedBy;
    // }

    // public function setUpdatedBy($updatedBy) {
    //     $this->updatedBy = $updatedBy;
    //     return $this;
    // }

    public function getDeliveryAddress() {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress($deliveryAddress) {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function prefix(){
        return PrefixConstant::BUYER;
    }
}
