<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/IUser.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/UniqueNoHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/PrefixConstant.php";

class Seller implements IUser{
    private $sellerId;
    private $businessAddress;
    private $storeName;
    private $storeDesc;
    private $lastLoginDate;
    private $username;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $status;
    private $resetCode;
    private $createdDate;
    private $createdBy;
    private $updatedDate;
    private $updatedBy;

    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;
        return $this;
    }
    
    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function setBusinessAddress($businessAddress)
    {
        $this->businessAddress = $businessAddress;
        return $this;
    }
    
    public function getBusinessAddress()
    {
        return $this->businessAddress;
    }

    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;
        return $this;
    }
    
    public function getStoreName()
    {
        return $this->storeName;
    }

    public function setStoreDesc($storeDesc)
    {
        $this->storeDesc = $storeDesc;
        return $this;
    }
    
    public function getStoreDesc()
    {
        return $this->storeDesc;
    }

    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;
        return $this;
    }
    
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    public function setUsername($username = null) {
        $this->username = $username;
        $this->username = $username == null? UniqueNoHelper::RandomUsername($this->email, $this->prefix()) : $username;
        return $this;
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

    public function setResetCode($resetCode)
    {
        $this->resetCode = $resetCode;
        return $this;
    }
    
    public function getResetCode()
    {
        return $this->resetCode;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }
    
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
        return $this;
    }
    
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }
    
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function prefix(){
        return PrefixConstant::SELLER;
    }
}

?>