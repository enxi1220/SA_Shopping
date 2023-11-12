<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
session_start();
class EncryptionHelper
{
    const AES_KEY_SIZE = 32; // 256 bits
    const AES_IV_SIZE = 16;  // 128 bits

    private static function getAesKey()
    {
        // if (empty(self::$aesKey)) {
        //     self::$aesKey = random_bytes(self::AES_KEY_SIZE);
        // }

        // return hex2bin(self::$aesKey);

        if (empty($_SESSION['aesKey'])) {
            $_SESSION['aesKey'] = random_bytes(self::AES_KEY_SIZE);
        }

        return $_SESSION['aesKey'];
    }

    public static function Encrypt($data)
    {
        $aesKey = self::getAesKey();

        $iv = random_bytes(self::AES_IV_SIZE);
        $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $aesKey, OPENSSL_RAW_DATA, $iv);

        // echo "Encryption AES Key: " . bin2hex($aesKey) . PHP_EOL;
        // echo "Encryption IV: " . bin2hex($iv) . PHP_EOL;

        return base64_encode($iv . $encryptedData);
    }

    public static function Decrypt($encryptedData)
    {
        $aesKey = self::getAesKey();

        $data = base64_decode($encryptedData);
        $iv = substr($data, 0, self::AES_IV_SIZE);
        // echo "Encrypted Data: " . $encryptedData . PHP_EOL;
        $encryptedData = substr($data, self::AES_IV_SIZE);

        // echo "Decryption IV: " . bin2hex($iv) . PHP_EOL;
        // echo "Decryption AES Key: " . bin2hex($aesKey) . PHP_EOL;
        // echo "Encrypted Data: " . bin2hex($encryptedData) . PHP_EOL;
        // echo "Encrypted Data Length: " . strlen($encryptedData) . PHP_EOL;

        $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $aesKey, OPENSSL_RAW_DATA, $iv);

        // Display decrypted data, even if it failed
        // echo "Decrypted Data: " . ($decryptedData !== false ? bin2hex($decryptedData) : 'Failed') . PHP_EOL;

        if ($decryptedData === false) {
            throw new Exception("Decryption failed: " . openssl_error_string() . PHP_EOL);
            return false;
        }

        // Display decrypted data
        // echo "Decrypted Data: " . bin2hex($decryptedData) . PHP_EOL;
        // echo "Returned Data: " . rtrim($decryptedData, "\0");

        return rtrim($decryptedData, "\0"); // Remove null padding
    }

    public static function Verify($data, $encryptedData)
    {
        return self::Decrypt($encryptedData) == $data;
    }
}
