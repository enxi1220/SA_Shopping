<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/PathConstant.php";

class ProductImage
{
    private $productImageId;
    private $productId;
    private $imageName;

    private $tmpImageName;
    private $count;

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
        return PathConstant::ACTUAL_IMAGE_PATH . $this->imageName;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    }

    public function imagePath()
    {
        return PathConstant::IMAGE_PATH;
    }


    public function actualImagePath()
    {
        return PathConstant::ACTUAL_IMAGE_PATH;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function setTempImageName($tmpImageName){
        $this->tmpImageName = $tmpImageName;
        return $this;
    }
    
    public function getTempImageName(){
        return $this->tmpImageName;
    }

    public function getShortImageName(){
        return $this->imageName;
    }
}