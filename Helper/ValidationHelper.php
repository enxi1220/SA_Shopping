<?php

class ValidationHelper
{
    public static function ValidateText()
    {
        $dt = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
        return $dt->format("Y-m-d H:i:s");
    }

    public static function ValidatePassword()
    {
        $dt = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
        return $dt->format("Y-m-d H:i");
    }

    public static function ValidateNumber(){
        
    }
}
