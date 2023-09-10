<?php 

interface IUser {
    public function setUsername($username);    
    public function getUsername();
    public function setName($name);    
    public function getName();
    public function setEmail($email);    
    public function getEmail();
    public function setPassword($password);    
    public function getPassword();
    public function setPhone($phone);    
    public function getPhone();
    public function setStatus($status);    
    public function getStatus();
    public function setResetCode($resetCode);    
    public function getResetCode();
    public function setCreatedDate($createdDate);    
    public function getCreatedDate();
    public function setCreatedBy($createdBy);    
    public function getCreatedBy();
    public function setUpdatedDate($updatedDate);    
    public function getUpdatedDate();
    public function setUpdatedBy($updatedBy);    
    public function getUpdatedBy();}

?>