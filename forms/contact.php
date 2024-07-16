<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';

    $name = $_POST['yourname'];
    $email = $_POST['your-email'];
    $contact = $_POST['your-contact'];
    $product = $_POST['product'];

    $mail = new PHPMailer(true);

    try {        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 2;
        $mail->Username = 'hashlineinfo@gmail.com'; 
        $mail->Password = 'myuvoiagfcamzskz'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('hashlineinfo@gmail.com', 'Hashline');
        $mail->addAddress('hashlineinfo@gmail.com', 'Hashline');

        $mail->isHTML(true);
        $mail->Subject = 'Requested for Quotation';
        $mail->Body = "
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Contact Number:</strong> $contact</p>
            <p><strong>Inquiry:</strong></p>
            <p>$product</p>
        ";

        $mail->send();
        echo "Email sent successfully for {$contact}!";
    } catch (Exception $e) {
        echo "Email sending failed: {$e}";
    }
} else {
    echo "Invalid request.";
}
?>