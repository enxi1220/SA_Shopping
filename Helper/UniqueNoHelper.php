<?php

class UniqueNoHelper {
    public static function RandomCode($prefix) {
        $dt = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
        $dt = $dt->format("Y/md/H:i:s.u");
        // $dt = $dt->format("Y/md/H:i:s.u");
        return $prefix.$dt;
    }
    
    public static function RandomUsername($email, $prefix) {
        $randomNumber = rand(100,999); // Generate a random number between 100 and 999
        $username = $prefix . $randomNumber . substr(trim($email), 0, 5);
        return $username;
    }

}
