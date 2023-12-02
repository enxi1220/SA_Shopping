<?php

class FileHelper
{
    public static function ValidateImage()
    {
        $image = $_FILES['productImage'];
        $validExtensions = '/\.(jpg|jpeg|gif|png)$/i';
        $validMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
        $maxFileSize = 5242880; // 5 MB
        $maxWidth = 1200;
        $maxHeight = 1200;

        // Check file extension and MIME type
        if (!preg_match($validExtensions, $image['name']) || !in_array($image['type'], $validMimeTypes)) {
            throw new Exception("Image with jpg, gif, and png format only.");
        }

        // Check file size
        if ($image['size'] > $maxFileSize) {
            throw new Exception("File size exceeds the maximum allowed limit.");
        }

        // Check image dimensions
        // list($width, $height) = getimagesize($image['tmp_name']);
        // if ($width > $maxWidth || $height > $maxHeight) {
        //     throw new Exception("Image dimensions exceed the maximum allowed limit.");
        // }
    }

    public static function UploadImage($file, $directory)
    {
        $fileName = uniqid() . "_" . basename($file['name']); // generate new filename
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $directory . $fileName; // specify store location
        $imageTemp = $file['tmp_name'];

        $fileContents = file_get_contents($file['tmp_name']);
        move_uploaded_file($imageTemp, $targetPath); // move the uploaded file to the specified location
        file_put_contents($targetPath, $fileContents);

        if (!file_exists($targetPath)) {
            throw new Exception("Image failed to upload.");
        }

        return $fileName;
    }

    public static function DeleteImage($fileName)
    {
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $fileName;

        if (file_exists($targetPath)) {
            unlink($targetPath);

            if (file_exists($targetPath)) {
                throw new Exception("Failed to delete the image.");
            }
        }
    }

    public static function ProcessImage($file, $directory)
    {
        $fileName = self::UploadImage($file, $directory);

        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $directory . $fileName;

        // Blurryness detection
        $apiURL = "http://127.0.0.1:5000/blurry_image";
        $filePath = array('file_path' => $targetPath);

        $client = curl_init($apiURL);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($filePath));
        curl_setopt($client, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($client);

        if ($response === FALSE) {
            throw new Exception("Error in detecting blurryness");
        }

        $image = json_decode($response, true);
        curl_close($client);

        if ($image['result'] == 'Blurry') {
            self::DeleteImage($directory . $fileName);
            throw new Exception("Image is blurry. Please upload a clear product image.");
        }
        return $fileName;
    }
}
