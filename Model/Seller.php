<?php 

class Seller extends User{
    private $sellerId;
    private $businessAddress;
    private $storeName;
    private $storeDesc;
    private $lastLoginDate;

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
}

?>