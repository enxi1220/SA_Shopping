<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/ImagePathConstant.php";

class ProductImage
{
    private $productImageId;
    private $productId;
    private $imageName;

    private $limit;

    public function getProductImageId()
    {
        return $this->productImageId;
    }

    public function setProductImageId($productImageId)
    {
        $this->productImageId = $productImageId;
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

    public function getImageName()
    {
        return ImagePathConstant::PATH . $this->imageName;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    
    }
    public function getLimit()
    {
        return $this->limit;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

}