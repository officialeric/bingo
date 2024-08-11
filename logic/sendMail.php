<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

function sendEmail($toAddress, $toName, $subject, $body, $altBody) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'officialeric994@gmail.com';              // SMTP username
        $mail->Password   = 'plas fssa iuab nyst';                 // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('officialeric994@gmail.com', 'Eric');
        $mail->addAddress($toAddress, $toName); // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        $mail->send();
        return true; // Success
    } catch (Exception $e) {
        // Error handling
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return false; // Failure
    }
}
?>
