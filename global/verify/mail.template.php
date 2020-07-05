<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../static/PHPMailer/PHPMailer.php'; // Only file you REALLY need
require '../../static/PHPMailer/Exception.php'; // If you want to debug
require '../../static/PHPMailer/SMTP.php';

// Form details
$email_to = $_GET['email'];

$fullname = "WE ARE SMD"; // required
$email_from = "wearesmd@gmail.com"; // required
$subject = "สวัสดี! " . $_GET['name']; // required
$message = "กรุณายืนยันตัวตนเพื่อปลดล็อกการใช้งานฟังก์ชั่นบางอย่างในเว็บไซต์"; // required

$email_message = file_get_contents('email.html');
$email_message = str_replace("{{name}}", $_GET['name'], $email_message);
$email_message = str_replace("{{key}}", $_GET['key'], $email_message);
$email_message = str_replace("{{email}}", $_GET['email'], $email_message);

// No need to set headers here

// Replace the mail() function with PHPMailer

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {
    //Server settings
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->isHTML(true);
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '<<EMAIL HERE>>';                     // SMTP username
    $mail->Password   = '<<PASSWORD HERE>>';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email_from, 'WE ARE SMD');
    $mail->addAddress($email_to, $fullname);     // Add the recipient

    //Content
    $mail->isHTML(true);                         // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $email_message;

    $mail->send();
    die("SEND");
} catch (Exception $e) {
    die("ERROR! Mailer Error: $mail->ErrorInfo");
}
?>