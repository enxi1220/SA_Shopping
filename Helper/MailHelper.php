<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Helper/ResponseHelper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/EmailTypeConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/PathConstant.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Library/PHPMailer-Master/src/PHPMailer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Library/PHPMailer-Master/src/Exception.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Library/PHPMailer-Master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define("MY_MAIL", "shopscribe24@gmail.com");
define("MY_NAME", "Shop Scribe");
define("APP_PASSWORD", "bzyx zobc utqn jzbs");

class MailHelper
{
    public static function SendMail($recipientEmail, $recipientName, $subject, $placeholders = [])
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = MY_MAIL; // SMTP username
            $mail->Password = APP_PASSWORD; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom(MY_MAIL, MY_NAME);
            $mail->addAddress($recipientEmail, $recipientName); // Add a recipient

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;

            // Determine template path based on the subject
            $templatePath = $_SERVER['DOCUMENT_ROOT'] . PathConstant::EMAIL_TEMPLATE_PATH_PREFIX . str_replace(' ', '', $subject) . 'Template.php';

            $templateContent = file_get_contents($templatePath);

            foreach ($placeholders as $placeholder => $value) {
                $templateContent = str_replace("[$placeholder]", $value, $templateContent);
            }

            $mail->msgHTML($templateContent);
            $mail->send();
            
            // return true;
        } catch (Exception $e) {
            // return false;
            throw new Exception($e);
        }
    }
}
