<?php 

class FileHelper{

    public static function ValidateImage(){
        $image = $_FILES['productImage'];
        $validExtensions = '/\.(jpg|jpeg|gif|png)$/i';
        $validMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];

        if (!preg_match($validExtensions, $image['name']) || !in_array($image['type'], $validMimeTypes)) {
            throw new Exception("Image with jpg, gif, and png format only.");
        }
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
}