<?php

class UniqueNoHelper
{
    public static function RandomCode($prefix)
    {
        $dt = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
        $dtFormatted = $dt->format("M H:i:s.u");
        $parsedDt = DateTime::createFromFormat("M H:i:s.u", $dtFormatted);

        // Extract individual components
        $month = $parsedDt->format('M');
        $hours = $parsedDt->format('H');
        $minutes = $parsedDt->format('i');
        $seconds = $parsedDt->format('s');
        $microseconds = $parsedDt->format('u');

        $time = $hours . $minutes . $seconds;
        $number = $time + $microseconds;

        return $prefix . $number . strtoupper($month);
    }

    public static function RandomUsername($email, $prefix)
    {
        $randomNumber = rand(100, 999); // Generate a random number between 100 and 999
        $username = $prefix . $randomNumber . substr(trim($email), 0, 5);
        return $username;
    }
}
