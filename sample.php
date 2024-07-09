<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($username, $password, $to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                           // Send using SMTP
        $mail->Host = 'smtp.gmail.com';            // Set the SMTP server to send through
        $mail->SMTPAuth = true;                    // Enable SMTP authentication
        $mail->Username = $username;               // SMTP username
        $mail->Password = $password;               // SMTP password
        $mail->SMTPSecure = 'tls';                 // Enable TLS encryption
        $mail->Port = 587;                         // TCP port to connect to
    
        // Recipients
        $mail->setFrom('no-reply@gmail.com', $username);
        $mail->addAddress($to);                    // Add a recipient
    
        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

$username = "";
$password = "";
$to = "";

if (!empty($_POST["id"])) {
    $subject = 'Subject';
    $body = 'HTML message body in <b>bold</b>';
    $result = sendEmail($username, $password, $to, $subject, $body);
    if ($result) {
        echo 'mail sent';
    }else{
        echo 'failed to send';
    }
}
