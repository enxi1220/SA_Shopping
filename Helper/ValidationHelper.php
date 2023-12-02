<?php

class ValidationHelper
{
    public static function ValidateText(&$text)
    {
        $text = trim($text);
        if (empty($text)) {
            throw new Exception("Text is required.");
        }
    }

    public static function ValidatePassword(&$password)
    {
        $password = trim($password);
        if (empty($password)) {
            throw new Exception("Password is required.");
        }

        $regexPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$/";
        if (!preg_match($regexPattern, $password)) {
            throw new Exception("Password must be 8-20 characters and include at least one lowercase letter, one uppercase letter, one digit, and one special character.");
        }
    }

    public static function ValidateNumber(&$number, $bool = true)
    {
        $number = trim($number);
        if (empty($number) && $bool) {
            throw new Exception("Number is required.");
        }

        if (!is_numeric($number)) {
            throw new Exception("Invalid number.");
        }
    }

    public static function ValidateEmail(&$email)
    {
        $email = trim($email);
        if (empty($email)) {
            throw new Exception("Email is required.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }
    }

    public static function ValidatePhoneNumber(&$phoneNumber)
    {
        $phoneNumber = trim($phoneNumber);
        if (empty($phoneNumber)) {
            throw new Exception("Phone number is required.");
        }

        // Malaysian phone number regex (example)
        $malaysianRegex = '/^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/';
        if (!preg_match($malaysianRegex, $phoneNumber)) {
            throw new Exception("Invalid Malaysian phone number format.");
        }
    }

    public static function ValidatePrice(&$price)
    {
        $price = trim($price);
        if (empty($price)) {
            throw new Exception("Price is required.");
        }

        if (!preg_match('/^\d+(\.\d{1,2})?$/', $price)) {
            throw new Exception("Invalid price format. Please enter a valid numeric value with up to two decimal places.");
        }
    }

    public static function ValidateUrl(&$url)
    {
        if (empty(trim($url))) {
            throw new Exception("URL is required.");
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new Exception("Invalid URL.");
        }
    }

    public static function ValidateDate(&$date)
    {
        $date = trim($date);
        if (empty($date)) {
            throw new Exception("Date is required.");
        }

        $parsedDate = date_parse($date);
        if ($parsedDate['error_count'] > 0 || !checkdate($parsedDate['month'], $parsedDate['day'], $parsedDate['year'])) {
            throw new Exception("Invalid date format.");
        }
    }
}
