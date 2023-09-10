<?php

class ProductDetail
{
    private $productDetailId;
    private $productDetailNo;
    private $productId;
    private $size;
    private $status;
    private $color;
    private $material;
    private $minStockQty;
    private $availableQty;
    private $salesOutQty;
    private $createdDate;
    private $updatedDate;
    private $updatedBy;

    public function getProductDetailId()
    {
        return $this->productDetailId;
    }

    public function setProductDetailId($productDetailId)
    {
        $this->productDetailId = $productDetailId;
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

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
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

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function setMaterial($material)
    {
        $this->material = $material;
        return $this;
    }

    public function getMinStockQty()
    {
        return $this->minStockQty;
    }

    public function setMinStockQty($minStockQty)
    {
        $this->minStockQty = $minStockQty;
        return $this;
    }

    public function getAvailableQty()
    {
        return $this->availableQty;
    }

    public function setAvailableQty($availableQty)
    {
        $this->availableQty = $availableQty;
        return $this;
    }

    public function getSalesOutQty()
    {
        return $this->salesOutQty;
    }

    public function setSalesOutQty($salesOutQty)
    {
        $this->salesOutQty = $salesOutQty;
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

    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }
}
