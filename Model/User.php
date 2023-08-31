<?php 

class User {
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

    public function setUsername($username)
    {
        $this->username = $username;
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
}

?>